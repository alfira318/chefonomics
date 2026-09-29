@extends('layout.auth')

@section('title', 'Masuk - Chefonomic')

@section('content')
<div class="max-w-4xl w-full bg-white rounded-3xl shadow-sm border border-gray-200/80 p-4 sm:p-6 lg:p-7 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 my-auto">
    
    <!-- Kolom Kiri: Foto Dapur & Branding -->
    <div class="lg:col-span-5 relative rounded-2xl overflow-hidden min-h-[220px] lg:min-h-full flex flex-col justify-end p-5 lg:p-6 text-white bg-slate-900 shadow-inner">
        <img src="{{ asset('images/foto.jpeg') }}" 
             onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=1000&auto=format&fit=crop'"
             alt="Praktikum Siswa Kuliner" 
             class="absolute inset-0 w-full h-full object-cover">
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent"></div>

        <!-- Branding & Quote -->
        <div class="relative z-10 space-y-2">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white/20 backdrop-blur-md text-[11px] font-semibold text-white/95">
                <i class="fa-solid fa-mortar-pestle text-[10px]"></i>
                Chefonomics Studio
            </span>
            <h2 class="text-lg lg:text-xl font-bold leading-snug text-white tracking-tight">
                Standar Biaya & Formula HPP Resep Praktikum
            </h2>
            <p class="text-xs text-white/80 leading-relaxed hidden sm:block">
                Kalkulasi bahan baku akurat, kontrol porsi, dan efisiensi dapur dalam satu platform terpadu.
            </p>
        </div>
    </div>

    <!-- Kolom Kanan: Form Login -->
    <div class="lg:col-span-7 flex flex-col justify-center px-1 sm:px-2 md:px-3">
        
        <!-- Title & Subtitle -->
        <div class="mb-5">
            <div class="flex items-center gap-2 mb-2">
                <span class="text-[10px] font-semibold px-2 py-0.5 bg-emerald-50 text-emerald-800 border border-emerald-200/80 rounded-md">
                    ● Portal Masuk Siswa
                </span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Selamat Datang Kembali</h1>
            <p class="text-xs text-gray-500 mt-1">Masuk untuk mengelola resep & kalkulasi HPP Anda.</p>
        </div>

        <!-- TABLER UI ALERT (SUCCESS & ERROR) -->
        @if (Session::get('success'))
            <div class="alert alert-important alert-success alert-dismissible mb-4 text-xs" role="alert">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="20" height="20"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                    <div>{{ Session::get('success') }}</div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        @if (Session::get('error'))
            <div class="alert alert-important alert-danger alert-dismissible mb-4 text-xs" role="alert">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon alert-icon"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    <div>
                        {{ Session::get('error') }}
                    </div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></a>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Username -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Username</label>
                <div class="relative">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs font-semibold">@</span>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username Anda" required
                        class="w-full pl-8 pr-3.5 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#1E372C] transition">
                </div>
                @error('username') 
                    <span class="text-[11px] text-red-500 mt-1 flex items-center gap-1 font-medium">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i> {{ $message }}
                    </span> 
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="w-full pl-3.5 pr-8 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-[#1E372C] transition">
                    <button type="button" onclick="togglePassword('password', 'icon-pass')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none cursor-pointer">
                        <i id="icon-pass" class="fa-regular fa-eye text-xs"></i>
                    </button>
                </div>
                @error('password') 
                    <span class="text-[11px] text-red-500 mt-1 flex items-center gap-1 font-medium">
                        <i class="fa-solid fa-circle-exclamation text-[10px]"></i> {{ $message }}
                    </span> 
                @enderror
            </div>

            <!-- Button Submit -->
            <button type="submit" 
                class="w-full bg-[#1E372C] hover:bg-[#15271F] text-white font-semibold py-2.5 rounded-xl transition text-xs shadow-xs flex items-center justify-center gap-2 mt-2 cursor-pointer">
                <i class="fa-solid fa-right-to-bracket text-xs"></i>
                <span>Masuk Sekarang</span>
            </button>

            <!-- Link Register -->
            <div class="text-center pt-2">
                <span class="text-xs text-gray-500">
                    Belum memiliki akun? 
                    <a href="{{ route('register') }}" class="text-[#1E372C] font-semibold hover:underline">Daftar di sini</a>
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