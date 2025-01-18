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
use Illuminate\Support\Facades\Mail;
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

        if ($attempts >= 5) {
            Log::channel('login')->warning('Too many login attempts', ['email' => $email, 'ip' => $ip]);
            return redirect()->back()->withErrors(['error' => 'Too many login attempts. Please try again later.']);
        }

        $user = User::where('email', $email)->first();

        if ($user === null) {
            Log::channel('login')->info('Failed login attempt - User does not exist', ['email' => $email, 'ip' => $ip]);
            Cache::increment($cacheKey);
            Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
            return redirect()->back()->withErrors(['error' => 'User does not exist.']);
        }

        if ($user->blocked != 0) {
            Log::channel('login')->warning('Blocked user attempted to login', ['user_id' => $user->id, 'email' => $user->email, 'ip' => $ip]);
            return redirect()->back()->withErrors(['error' => 'User Blocked. Please contact the administrator']);
        }

        if (Auth::attempt($credentials)) {
            Log::channel('login')->info('Successful login', ['user_id' => $user->id, 'email' => $user->email, 'ip' => $ip]);
            Cache::forget($cacheKey);

            if ($user->user_type == 'E') {
                return redirect()->route("orders.index");
            }

            // Generate and send 2FA code
            $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $user->two_factor_code = $code;
            $user->two_factor_expires_at = now()->addMinutes(10);
            $user->save();

            Mail::to($user->email)->send(new TwoFactorCode($code));
            $request->session()->put('2fa:user:id', $user->id);
            return redirect()->route('2fa.verify');
        }

        Cache::increment($cacheKey);
        Cache::put($cacheKey, $attempts + 1, now()->addMinutes(15));
        return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
    }

    public function verify2FA(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $userId = $request->session()->get('2fa:user:id');
        $user = User::findOrFail($userId);

        if ($user->two_factor_code === $request->code) {
            if ($user->two_factor_expires_at > now()) {
                // Successful 2FA verification
                $user->two_factor_code = null;
                $user->two_factor_expires_at = null;
                $user->save();

                Auth::login($user);
                $request->session()->forget('2fa:user:id');
                Log::channel('2fa')->info('Successful 2FA verification', ['user_id' => $user->id, 'email' => $user->email, 'ip' => $request->ip()]);

                // Redirect based on user type
                if ($user->user_type == 'A') {
                    return redirect()->route("dashboard.index");
                } elseif (session('total', 0) > 0) {
                    return redirect()->route('cart.checkout');
                }
                return redirect()->intended(RouteServiceProvider::HOME);
            }

            Log::channel('2fa')->warning('Expired 2FA code used', ['user_id' => $user->id, 'email' => $user->email, 'ip' => $request->ip()]);
            return back()->withErrors(['error' => 'Code has expired. Please login again.']);
        }

        Log::channel('2fa')->warning('Invalid 2FA code attempt', ['user_id' => $user->id, 'email' => $user->email, 'attempted_code' => $request->code, 'ip' => $request->ip()]);
        return back()->withErrors(['error' => 'Invalid authentication code']);
    }
}