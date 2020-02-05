<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('adminDashboard');
        }
        if ($guard == "writer" && Auth::guard($guard)->check()) {
            return redirect()->route('writerDashboard');
        }
        if ($guard == "regular_user" && Auth::guard($guard)->check()) {
            return redirect()->route('regularUserDashboard');
        }
        
        return $next($request);
    }
    
}
