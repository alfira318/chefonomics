<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSiswa
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user login DAN rolenya adalah siswa
        if (Auth::check() && Auth::user()->role === 'siswa') {
            return $next($request);
        }

        // Jika guru nekat masuk, tendang ke dashboard admin
        return redirect()->route('admin.dashboard')->with('error', 'Akses khusus Siswa!');
    }
}