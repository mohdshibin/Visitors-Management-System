<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MultiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('webadmin')->check()){
            return redirect('/admin/dashboard');
        }
        if(Auth::guard('webvisitor')->check()){
            return redirect('/visitor/dashboard');
        }

        return $next($request);
    }
}
