<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsGuest;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\IsAdmin;

// Redirect halaman utama ke login
Route::get('/', fn() => redirect()->route('login'));

// ----------------------------------------------------
// 1. ROUTE TAMU (Hanya bisa diakses jika BELUM login)
// ----------------------------------------------------
Route::middleware(IsGuest::class)->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ----------------------------------------------------
// 2. ROUTE TERPROTEKSI (Sudah Login)
// ----------------------------------------------------
Route::middleware(IsLoggedIn::class)->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // HALAMAN UMUM (Siswa & Guru)
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/resep', fn() => view('resep'))->name('resep');
    Route::get('/master-harga', fn() => view('master-harga'))->name('master-harga');
    Route::get('/panduan-harga', fn() => view('panduan-harga'))->name('panduan-harga');

    // KHUSUS GURU / ADMIN
    Route::middleware(IsAdmin::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/moderasi', fn() => view('admin.moderasi'))->name('moderasi');
    });

    // Alias /moderasi agar siswa yang coba akses /moderasi langsung diproses oleh middleware IsAdmin
    Route::middleware(IsAdmin::class)->get('/moderasi', fn() => redirect()->route('admin.moderasi'));

});