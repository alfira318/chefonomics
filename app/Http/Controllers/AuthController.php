<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan Halaman Login
    public function showLogin()
    {
        return view('login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Kata sandi wajib diisi!',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau kata sandi salah.',
        ])->with('error', 'Username atau kata sandi salah! Silakan periksa kembali akun Anda.')->onlyInput('username');
    }

    // Tampilkan Halaman Register
    public function showRegister()
    {
        return view('register');
    }

    // Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|min:4|max:15|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'nullable|numeric',
            'password' => 'required|string|min:8|max:15|confirmed',
        ], [
            'name.required'      => 'Nama lengkap wajib diisi!',
            'username.required'  => 'Username wajib diisi!',
            'username.min'       => 'Username minimal 4 karakter!',
            'username.max'       => 'Username maksimal 15 karakter!',
            'username.unique'    => 'Username ini sudah digunakan!',
            'email.required'     => 'Alamat email wajib diisi!',
            'email.email'        => 'Format email tidak valid!',
            'email.unique'       => 'Email ini sudah terdaftar!',
            'phone.numeric'      => 'Nomor telepon harus berupa angka!',
            'password.required'  => 'Kata sandi wajib diisi!',
            'password.min'       => 'Kata sandi minimal 8 karakter!',
            'password.max'       => 'Kata sandi maksimal 15 karakter!',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok!',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'siswa', // Disesuaikan dengan role siswa
        ]);

        // Redirect ke halaman login setelah daftar
        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil! Silakan masuk.');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}