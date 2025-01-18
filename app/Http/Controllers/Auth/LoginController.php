<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Mail\TwoFactorCode;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $email = $credentials['email'];
        $ip = $request->ip();
        $cacheKey = 'login_attempts_' . $email . '_' . $ip;
        $attempts = Cache::get($cacheKey, 0);


        // Retrieve the user record
        $user = User::where('email', $email)->first();
        // Check rate limiting
        if ($attempts >= 5) {
            //Log::channel('login')->warning('Too many login attempts', [
            Log::channel('login')->warning('Too many attempts', [
                'user_id' => $user->id,
                'email' => $email,
                'ip' => $ip
            ]);
            return redirect()->back()->withErrors(['error' => 'Too many login attempts. Please try again later.']);
        }


        if ($user == null) {
            //Log::channel('login')->info('Failed login attempt - User does not exist', [
            Log::channel('login')->info('User non existant', [
                'user_id' => $user->id ?? null,
                'email' => $email,
                'ip' => $ip
            ]);
            Cache::increment($cacheKey);
            Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
            return redirect()->back()->withErrors(['error' => 'User Does Not Exist.']);
        }

        // Check if user is blocked
        if ($user->blocked != 0) {
            //Log::channel('login')->warning('Blocked user attempted to login', [
            Log::channel('login')->warning('Blocked user attempted', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);
            return redirect()->back()->withErrors(['error' => 'User Blocked. Please contact the administrator']);
        }

        if (Auth::attempt($credentials)) {
            Auth::logout(); // Immediately logout after password verification for 2FA

            // Generate random 6-digit code
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

            $user->two_factor_code = $code;
            $user->two_factor_expires_at = now()->addMinutes(10);
            $user->save();

            Mail::to($user->email)->send(new TwoFactorCode($code));

            // Clear failed login attempts after successful password verification
            Cache::forget($cacheKey);

            //Log::channel('login')->info('Password verified, 2FA code sent', [
            Log::channel('login')->info('2FA code sent', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);

            $request->session()->put('2fa:user:id', $user->id);
            return redirect()->route('2fa.verify');
        }

        // Failed login attempt
        //Log::channel('login')->warning('Failed login attempt - Invalid credentials', [
        Log::channel('login')->warning('Failed Invalid credentials', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $ip
        ]);
        Cache::increment($cacheKey);
        Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    public function verify2FA(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $userId = $request->session()->get('2fa:user:id');
        $user = User::findOrFail($userId);
        $ip = $request->ip();

        // Add rate limiting for verification attempts
        $verifyAttemptKey = 'verify_attempts_' . $userId . '_' . $ip;
        $verifyAttempts = Cache::get($verifyAttemptKey, 0);

        if ($verifyAttempts >= 5) {
            //Log::channel('2fa')->warning('Too many verification attempts', [
            Log::channel('2fa')->warning('Exceeded verification attempts', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);
            return back()->withErrors(['error' => 'Too many attempts. Please try again later.']);
        }

        if ($user->two_factor_code === $request->code) {
            if ($user->two_factor_expires_at > now()) {
                $user->two_factor_code = null;
                $user->two_factor_expires_at = null;
                $user->save();

                Auth::login($user);
                $request->session()->forget('2fa:user:id');

                // Log successful 2FA verification
                //Log::channel('2fa')->info('Successful 2FA verification', [
                Log::channel('2fa')->info('Successful 2FA verification', [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'ip' => $request->ip()
                ]);

                // Handle different user types and cart redirect
                if ($user->user_type == 'E') {
                    return redirect()->route("orders.index");
                }
                $total = session('total', 0);
                if ($total > 0) {
                    return redirect()->route('cart.checkout');
                }
                return $user->user_type == 'A' ?
                    redirect()->route("dashboard.index") :
                    redirect()->route('home');
            }

            // Log expired code attempt
            //Log::channel('2fa')->warning('Expired 2FA code used', [
            Log::channel('2fa')->warning('Expired 2FA code', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $request->ip()
            ]);

            return back()->withErrors(['error' => 'Code has expired. Please login again.']);
        }

        // Log invalid code attempt
        //Log::channel('2fa')->warning('Invalid 2FA code attempt', [
        Log::channel('2fa')->warning('Invalid 2FA code', [
            'user_id' => $user->id,
            'email' => $user->email,
            //'attempted_code' => $request->code,
            'ip' => $request->ip()
        ]);

        Cache::increment($verifyAttemptKey);
        Cache::put($verifyAttemptKey, $verifyAttempts + 1, now()->addMinutes(15));

        return back()->withErrors(['error' => 'Invalid authentication code']);
    }

    public function resend2FA(Request $request)
    {
        $userId = $request->session()->get('2fa:user:id');
        if (!$userId) {
            return redirect()->route('login');
        }

        $user = User::findOrFail($userId);
        $ip = $request->ip();

        // Check cooldown
        $resendKey = 'resend_cooldown_' . $userId . '_' . $ip;
        if (Cache::has($resendKey)) {
            $remainingTime = Cache::ttl($resendKey);
            //Log::channel('2fa')->warning('Resend attempt during cooldown', [
            Log::channel('2fa')->warning('Attempted during cooldown', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);
            return response()->json([
                'error' => 'Please wait ' . ceil($remainingTime/60) . ' minutes before requesting another code.'
            ], 429);
        }

        // Generate new code
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->two_factor_code = $code;
        $user->two_factor_expires_at = now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new TwoFactorCode($code));

        // Set cooldown (5 minutes)
        Cache::put($resendKey, true, now()->addMinutes(5));

        Log::channel('2fa')->info('2FA code resent', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $ip
        ]);

        return response()->json(['message' => 'Verification code resent successfully']);
    }
}
