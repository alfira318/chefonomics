<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Chefonomics')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        html, body {
            overflow-x: hidden;
            background-color: #F7F8F6;
        }
    </style>
    @stack('styles')
</head>

<body class="text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- 1. NAVBAR (Harus di luar div grid, biar melebar penuh di atas) -->
    <x-navbar />

    <!-- 2. WRAPPER UTAMA (Baru di sini dibuat Grid untuk Sidebar & Main Content) -->
    <div class="max-w-[1600px] mx-auto w-full px-4 lg:px-6 py-6 flex-1 grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Sidebar (Mengambil 2 Kolom Kiri) -->
        <x-sidebar />

        <!-- Main Content (Mengambil 10 Kolom Kanan) -->
        <main class="lg:col-span-10 space-y-6">

            <!--  ALERT ERROR SESSION -->
            @if(session('error'))
                <div id="alert-error" class="p-4 bg-red-50 border border-red-200 rounded-2xl flex items-center justify-between gap-3 text-red-800 shadow-xs transition duration-300">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center text-red-600 shrink-0">
                            <i class="fa-solid fa-circle-exclamation text-base"></i>
                        </div>
                        <div>
                            <p class="font-bold text-xs text-red-900 uppercase tracking-wider">Akses Ditolak</p>
                            <p class="text-xs text-red-700 font-medium mt-0.5">{{ session('error') }}</p>
                        </div>
                    </div>
                    <button type="button" onclick="this.closest('#alert-error').remove()" class="text-red-400 hover:text-red-700 p-1.5 rounded-lg hover:bg-red-100/50 transition leading-none" title="Tutup">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>
            @endif

            <!--  ALERT SUKSES SESSION -->
            @if(session('success'))
                <div id="alert-success" class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center justify-between gap-3 text-emerald-800 shadow-xs transition duration-300">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 shrink-0">
                            <i class="fa-solid fa-circle-check text-base"></i>
                        </div>
                        <div>
                            <p class="font-bold text-xs text-emerald-900 uppercase tracking-wider">Berhasil</p>
                            <p class="text-xs text-emerald-700 font-medium mt-0.5">{{ session('success') }}</p>
                        </div>
                    </div>
                    <button type="button" onclick="this.closest('#alert-success').remove()" class="text-emerald-400 hover:text-emerald-700 p-1.5 rounded-lg hover:bg-emerald-100/50 transition leading-none" title="Tutup">
                        <i class="fa-solid fa-xmark text-sm"></i>
                    </button>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>

</html>