<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Hanya izinkan jika role adalah admin atau guru
        if (Auth::check() && in_array(strtolower(Auth::user()->role ?? ''), ['admin', 'guru'])) {
            return $next($request);
        }

        // Jika siswa mencoba masuk ke halaman khusus guru, kembalikan ke dashboard
        return redirect()->route('dashboard')->with('error', 'Akses khusus Guru!');
    }
}