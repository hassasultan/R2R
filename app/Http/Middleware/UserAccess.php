<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        // dd(auth()->user()->role);
        if(auth()->user()->role == "seller" || auth()->user()->role == "buyer"){

            return $next($request);
        }
        elseif(auth()->user()->role == "admin")
        {
            return redirect()->route('admin.home');

        }
        else
        {
            return redirect()->route('seller.home');

        }
        // dd(auth()->user()->role);
        // return response()->json(['You do not have permission to access for this page.']);
        // return $next($request);
    }
}
