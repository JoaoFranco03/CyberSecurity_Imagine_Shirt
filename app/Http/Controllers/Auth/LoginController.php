<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        if ($attempts >= 5) {
            Log::channel('login')->warning('Too many login attempts', [
                'email' => $email,
                'ip' => $ip
            ]);
            return redirect()->back()->withErrors(['error' => 'Too many login attempts. Please try again later.']);
        }

        // Retrieve the user record
        $user = User::where('email', $email)->first();

        if ($user == null) {
            Log::channel('login')->info('Failed login attempt - User does not exist', [
                'email' => $email,
                'ip' => $ip
            ]);
            Cache::increment($cacheKey);
            Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
            return redirect()->back()->withErrors(['error' => 'User Does Not Exist.']);
        }

        // Check if the user exists and is not blocked
        if ($user->blocked != 0) {
            Log::channel('login')->warning('Blocked user attempted to login', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);
            return redirect()->back()->withErrors(['error' => 'User Blocked. Please contact the administrator']);
        }

        if (Auth::attempt($credentials)) {
            Log::channel('login')->info('Successful login', [
                'user_id' => $user->id,
                'email' => $user->email,
                'user_type' => $user->user_type,
                'ip' => $ip
            ]);
            Cache::forget($cacheKey);
            // Authentication passed
            //dd($user->user_type == 'A' ? "dashboard" : "home");
            if ($user->user_type == 'E') {
                return redirect()->route("orders.index");
            }
            $total = session('total', 0);
            if($total>0){
                return redirect()->route('cart.checkout');
            }
            return $user->user_type == 'A' ? redirect()->route("dashboard.index") : redirect()->route('home');
        } else {
            Log::channel('login')->warning('Failed login attempt - Invalid credentials', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $ip
            ]);
            Cache::increment($cacheKey);
            Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
            // Authentication failed
            return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
        }
    }
}
