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
            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>

</html>