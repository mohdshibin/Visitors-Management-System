<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('webadmin')->check() && $request->is('visitor/*')){
            echo "admin";
            return redirect('/forbidden');
        }
        if(Auth::guard('webvisitor')->check() && $request->is('admin/*')){
            echo "visitor";
            return redirect('/forbidden');
        }
        return $next($request);
    }
}
