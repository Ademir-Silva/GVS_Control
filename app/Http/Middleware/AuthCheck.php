<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck{
    public function handle(Request $request, Closure $next){
        if (!session()->has('LoggedUser') && ($request->path() != 'auth/login' && $request->path() != 'auth/register')) {
            return redirect()->route('auth.login')->with('fail', 'Acesso restrito! Faça login para acessar!');
        }

        if (session()->has('LoggedUser') && ($request->path() == 'auth/login' || $request->path() == 'auth/register')) {
            return back();
        }

        return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires', 'Sat 01 jan 1990 00:00:00 GMT');
    }
}
