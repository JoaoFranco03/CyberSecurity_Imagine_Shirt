<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // Authentication failed
            return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
        }
    }
}
