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
use App\Mail\TwoFactorCode;

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

        // Retrieve the user record
        $user = User::where('email', $credentials['email'])->first();

        if ($user == null) {
            return redirect()->back()->withErrors(['error' => 'User Does Not Exist.']);
        }

        // Check if the user exists and is not blocked
        if ($user->blocked != 0) {
            return redirect()->back()->withErrors(['error' => 'User Blocked. Please contact the administrator']);
        }

        if (Auth::attempt($credentials)) {
            Auth::logout(); // Immediately logout after password verification
            
            // Generate random 6-digit code
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            
            $user->two_factor_code = $code;
            $user->two_factor_expires_at = now()->addMinutes(10);
            $user->save();
            
            Mail::to($user->email)->send(new TwoFactorCode($code));
            
            $request->session()->put('2fa:user:id', $user->id);
            return redirect()->route('2fa.verify');
        }

        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    public function verify2FA(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $userId = $request->session()->get('2fa:user:id');
        $user = User::findOrFail($userId);

        if ($user->two_factor_code === $request->code) {
            if ($user->two_factor_expires_at > now()) {
                $user->two_factor_code = null;
                $user->two_factor_expires_at = null;
                $user->save();
                
                Auth::login($user);
                $request->session()->forget('2fa:user:id');
                return redirect()->intended(RouteServiceProvider::HOME);
            }
            return back()->withErrors(['error' => 'Code has expired. Please login again.']);
        }

        return back()->withErrors(['error' => 'Invalid authentication code']);
    }
}
