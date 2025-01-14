<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsClient
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->user_type != 'C') {
            return $request->expectsJson()
                ? abort(403, 'You are not an client')
                : redirect()->route('home')->withErrors(['error' => 'Unauthorized action. You are not an client']);
        }
        return $next($request);
    }
}
