<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle1(Request $request, Closure $next)
    {
        return $next($request);
    }


//    public function handle($request, Closure $next)
//    {
//        if ($request->user() && $request->user()->isUser()) {
//            return $next($request);
//        }
//
//        return redirect('/')->with('error', 'You are not authorized to access this page.');
//    }

}
