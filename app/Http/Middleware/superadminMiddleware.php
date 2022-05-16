<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class superadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1 is super admin
     
        if(auth()->user()->role_id == 1) {
            return $next($request);
        }
        return back()->with('error','UnAuthorized Page');
       
    }
}
