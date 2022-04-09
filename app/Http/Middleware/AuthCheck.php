<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        // redirect back to dashboard
        if($request->path() == "/" && session()->has('userid')) {
            return back();
        }

        // redirect to login page
        if($request->path() == "admin/dashboard" && !session()->has('userid')) {
            return redirect('/')->with('failure','You must logged in first !');
        }

        return $next($request)->header("Cache-Control","no-cache, no-store, max-age=0, must-revalidate")
                              ->header("Pragma","no-cache")
                              ->header("Expires","Sat, 3 Jan 1998 00:00:00 GMT");
    }
}
