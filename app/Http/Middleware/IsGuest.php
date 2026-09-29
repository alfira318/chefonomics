<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGuest
{
    public function handle(Request $request, Closure $next)
    {
        // Jika user SUDAH login, lempar ke dashboard rolenya
        if (Auth::check()) {
            if (Auth::user()->role === 'siswa') {
                return redirect()->route('siswa.dashboard');
            }
            return redirect()->route('admin.dashboard');
        }

        // Jika BELUM login, silakan lewat
        return $next($request);
    }
}