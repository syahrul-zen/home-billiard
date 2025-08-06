<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use illuminate\Support\Facades\Auth;


class isMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::guard('member')->check() && !Auth::guard('admin')->check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (!Auth::guard('member')->check()) {
            return redirect('/login')->with('error', 'You must be logged in as a member to access this page.');
        }

        return $next($request);
    }
}
