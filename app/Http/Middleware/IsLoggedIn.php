<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        // Jika BELUM login, tendang ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Jika SUDAH login, silakan lewat
        return $next($request);
    }
}