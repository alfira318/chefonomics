@extends('layout.auth')

@section('title', 'Daftar - Chefonomic')

@section('content')
<div class="max-w-4xl w-full bg-white rounded-3xl shadow-sm border border-gray-200/80 p-4 md:p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 my-auto">
    
    <!-- Kolom Kiri: Foto Dapur -->
    <div class="lg:col-span-5 rounded-2xl overflow-hidden relative min-h-[250px] lg:min-h-full">
        <img src="{{ asset('images/foto.jpeg') }}" 
             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop'"
             alt="Praktikum Siswa Kuliner" 
             class="w-full h-full object-cover rounded-2xl">
    </div>

    <!-- Kolom Kanan: Form Register -->
    <div class="lg:col-span-7 flex flex-col justify-center px-2 py-2 md:px-4">
        
        <!-- Title & Subtitle -->
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Buat Akun Baru</h1>
            <p class="text-xs text-gray-500 mt-1">Daftarkan diri Anda untuk mulai menghitung HPP resep.</p>
        </div>

        <!-- 🟢 ALERT SUKSES SESSION -->
        @if (session()->has('success'))
            <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-start justify-between gap-3 text-emerald-800 text-xs">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5 text-sm"></i>
                    <span class="font-medium leading-relaxed">{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 font-bold text-sm leading-none">&times;</button>
            </div>
        @endif

        <!-- 🔴 ALERT ERROR SESSION -->
        @if (session()->has('error'))
            <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-2xl flex items-start justify-between gap-3 text-red-800 text-xs">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-exclamation text-red-600 mt-0.5 text-sm"></i>
                    <span class="font-medium leading-relaxed">{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700 font-bold text-sm leading-none">&times;</button>
            </div>
        @endif

        <!-- Form Register -->
       <form action="{{ route('register') }}" method="POST" class="space-y-3.5" novalidate>
    @csrf

    <!-- Nama Lengkap -->
    <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Maya Anindita"
            class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">
        @error('name') 
            <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Grid 2 Kolom: Username & Email -->
    <div class="flex gap-3">
        <div class="flex-1 min-w-0">
            <label class="block text-xs font-semibold text-slate-700 mb-1">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" placeholder="alfi"
                class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">
            @error('username')
                <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex-1 min-w-0">
            <label class="block text-xs font-semibold text-slate-700 mb-1">Email Siswa</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="siswa@sekolah.sch.id"
                class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">
            @error('email')
                <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Nomor WhatsApp / Telepon -->
    <div>
        <label class="block text-xs font-semibold text-slate-700 mb-1">Nomor WhatsApp / Telepon</label>
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="081234567890"
            class="w-full px-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">
        @error('phone') 
            <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span> 
        @enderror
    </div>

    <!-- Grid 2 Kolom: Password & Konfirmasi Password -->
    <div class="flex gap-3">
        <div class="flex-1 min-w-0">
            <label class="block text-xs font-semibold text-slate-700 mb-1">Kata Sandi</label>

            <div class="relative">
                <input type="password" id="password" name="password" placeholder="••••••••"
                    class="w-full pl-3.5 pr-8 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">

                <button type="button" onclick="togglePassword('password', 'icon-pass')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    <i id="icon-pass" class="fa-regular fa-eye text-xs"></i>
                </button>
            </div>

            @error('password')
                <span class="text-[10px] text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex-1 min-w-0">
            <label class="block text-xs font-semibold text-slate-700 mb-1">Konfirmasi Sandi</label>

            <div class="relative">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                    class="w-full pl-3.5 pr-8 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#2B4C3B] transition">

                <button type="button" onclick="togglePassword('password_confirmation', 'icon-pass-confirm')"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    <i id="icon-pass-confirm" class="fa-regular fa-eye text-xs"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Button Submit -->
    <button type="submit" 
        class="w-full bg-[#284A3B] hover:bg-[#1E372C] text-white font-semibold py-2.5 rounded-xl transition text-xs shadow-xs mt-3">
        Daftar Akun Sekarang
    </button>

    <!-- Link Login -->
    <div class="text-center pt-1">
        <span class="text-xs text-gray-500">
            Sudah memiliki akun? 
            <a href="{{ route('login') }}" class="text-[#284A3B] font-semibold hover:underline">Masuk di sini</a>
        </span>
    </div>

</form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush