<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->blocked != 0) {
            Auth::logout();
            return $request->expectsJson()
                ? abort(403, 'You are blocked')
                : redirect()->route('login')->withErrors(['error'=> 'User Blocked. Please contact the administrator']);
        }
        return $next($request);
    }
}
