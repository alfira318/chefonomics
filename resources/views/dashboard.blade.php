@extends('layout.app')

@section('content')

    <!-- BANNER WELCOME -->
    <div class="bg-white border border-gray-200 rounded-2xl p-5 md:p-6 shadow-xs flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="text-[10px] font-semibold px-2 py-0.5 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-md">
                    ● Semester Ganjil 2024/2025
                </span>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-slate-900 tracking-tight">
                Halo, Siswa Maya! Siap menghitung total biaya resep hari ini?
            </h2>
            <p class="text-xs text-gray-500 mt-1 max-w-2xl leading-relaxed">
                Pantau total pengeluaran belanja bahan, kelola resep aktif, dan hitung estimasi total biaya pembuatan hidangan secara praktis.
            </p>
        </div>

        <div class="flex items-center gap-2.5 w-full md:w-auto">
            <button class="px-3.5 py-2 bg-white border border-gray-200 hover:bg-gray-50 text-slate-700 text-xs font-semibold rounded-xl transition flex items-center gap-1.5 shadow-xs">
                <i class="fa-solid fa-file-csv text-gray-500"></i>
                Ekspor CSV
            </button>
            <button class="px-4 py-2 bg-[#1E372C] hover:bg-[#15271F] text-white text-xs font-semibold rounded-xl transition flex items-center gap-1.5 shadow-xs whitespace-nowrap">
                <i class="fa-solid fa-plus"></i>
                Buat Resep Baru
            </button>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        
        <!-- Card 1 -->
        <div class="bg-white border border-gray-200 p-4 rounded-2xl shadow-xs relative overflow-hidden">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 tracking-wider uppercase">TOTAL RESEP SAYA</span>
                    <div class="flex items-baseline gap-2 mt-1">
                        <span class="text-2xl font-bold text-slate-900">18</span>
                        <span class="text-xs text-gray-500 font-medium">Resep Aktif</span>
                    </div>
                </div>
                <div class="p-2 bg-gray-50 rounded-xl border border-gray-100 text-gray-500">
                    <i class="fa-regular fa-folder-open text-xs"></i>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white border border-gray-200 p-4 rounded-2xl shadow-xs relative overflow-hidden">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 tracking-wider uppercase">RATA-RATA BIAYA PER RESEP</span>
                    <div class="mt-1">
                        <span class="text-2xl font-bold text-slate-900">Rp 84.500</span>
                    </div>
                </div>
                <div class="p-2 bg-gray-50 rounded-xl border border-gray-100 text-gray-500">
                    <i class="fa-solid fa-receipt text-xs"></i>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white border border-gray-200 p-4 rounded-2xl shadow-xs relative overflow-hidden">
            <div class="flex justify-between items-start">
                <div>
                    <span class="text-[10px] font-bold text-gray-400 tracking-wider uppercase">BAHAN PALING SERING DIPAKAI</span>
                    <div class="mt-1">
                        <span class="text-base font-bold text-slate-900">Mentega & Susu Segar</span>
                    </div>
                </div>
                <div class="p-2 bg-gray-50 rounded-xl border border-gray-100 text-gray-500">
                    <i class="fa-solid fa-box-open text-xs"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- SEARCH & CATEGORY FILTERS -->
    <div class="space-y-3">
        <div class="relative w-full">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
            <input type="text" 
                placeholder="Cari berdasarkan kata bahan utama: Invest Sourdough, Sous-Vide..." 
                class="w-full pl-9 pr-8 py-2 bg-white border border-gray-200 rounded-xl text-xs text-slate-800 placeholder-gray-400 focus:outline-none focus:border-[#1E372C] shadow-xs">
        </div>

        <!-- Category Pills -->
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs">
            <button class="px-3 py-1.5 bg-[#1E372C] text-white font-semibold rounded-xl whitespace-nowrap shadow-xs">
                Semua Kategori (18)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Appetizer (3)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Main Course (6)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Dessert (4)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Pastry (2)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Bakery (2)
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl whitespace-nowrap transition shadow-xs">
                Beverage (1)
            </button>
        </div>
    </div>

    <!-- RECIPE CATALOG GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <!-- CARD 1 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
            <div>
                <div class="relative h-44 w-full">
                    <img src="https://images.unsplash.com/photo-1626777552726-4a6b54c97e46?q=80&w=800&auto=format&fit=crop" 
                         alt="Beef Rendang" class="w-full h-full object-cover">
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-white/90 backdrop-blur-sm text-slate-800 font-bold text-[10px] rounded-lg shadow-xs">
                        Main Course
                    </span>
                    <span class="absolute top-3 right-3 px-2.5 py-1 bg-slate-900/80 backdrop-blur-sm text-white font-semibold text-[10px] rounded-lg shadow-xs flex items-center gap-1">
                        <i class="fa-solid fa-boxes-packing text-[9px]"></i> 8 Bahan
                    </span>
                </div>

                <div class="p-4 space-y-2">
                    <div class="flex items-center gap-3 text-[11px] text-gray-400 font-medium">
                        <span><i class="fa-solid fa-utensils text-gray-400 mr-1"></i> Hasil: 6 Porsi</span>
                        <span>•</span>
                        <span><i class="fa-regular fa-clock text-gray-400 mr-1"></i> Prep: 20 Mnt</span>
                    </div>

                    <h3 class="text-base font-bold text-slate-900 tracking-tight leading-snug">
                        Beef Rendang Sous-Vide
                    </h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                        Shortplate cut 72 jam marinasi rempah-rempah Minang & santan kelapa cold-pressed murni.
                    </p>

                    <div class="mt-3 p-3 bg-gray-50 border border-gray-100 rounded-xl flex justify-between items-center">
                        <div>
                            <div class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">TOTAL BIAYA RESEP</div>
                            <div class="text-base font-extrabold text-slate-900 mt-0.5">Rp 195.000</div>
                            <div class="text-[9px] text-gray-400">Estimasi biaya membuat 1 resep</div>
                        </div>
                        <span class="px-2 py-1 bg-emerald-100/70 text-emerald-800 text-[10px] font-bold rounded-md">
                            Formula Baku
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-4 pt-0 flex gap-2">
                <button class="flex-1 py-2 bg-[#1E372C] hover:bg-[#15271F] text-white text-xs font-semibold rounded-xl transition flex items-center justify-center gap-1.5 shadow-xs">
                    <i class="fa-regular fa-eye"></i> Lihat Resep & Rincian Biaya
                </button>
                <button class="p-2 border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-xl transition">
                    <i class="fa-regular fa-pen-to-square text-xs"></i>
                </button>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition flex flex-col justify-between">
            <div>
                <div class="relative h-44 w-full">
                    <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?q=80&w=800&auto=format&fit=crop" 
                         alt="Salmon Dill" class="w-full h-full object-cover">
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-white/90 backdrop-blur-sm text-slate-800 font-bold text-[10px] rounded-lg shadow-xs">
                        Main Course
                    </span>
                    <span class="absolute top-3 right-3 px-2.5 py-1 bg-slate-900/80 backdrop-blur-sm text-white font-semibold text-[10px] rounded-lg shadow-xs flex items-center gap-1">
                        <i class="fa-solid fa-boxes-packing text-[9px]"></i> 4 Bahan
                    </span>
                </div>

                <div class="p-4 space-y-2">
                    <div class="flex items-center gap-3 text-[11px] text-gray-400 font-medium">
                        <span><i class="fa-solid fa-utensils text-gray-400 mr-1"></i> Hasil: 4 Porsi</span>
                        <span>•</span>
                        <span><i class="fa-regular fa-clock text-gray-400 mr-1"></i> Prep: 35 Mnt</span>
                    </div>

                    <h3 class="text-base font-bold text-slate-900 tracking-tight leading-snug">
                        Pan-Seared Salmon Dill
                    </h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                        Fresh Atlantic salmon 180g, celeriac puree, clarified herb butter, lemon emulsified...
                    </p>

                    <div class="mt-3 p-3 bg-gray-50 border border-gray-100 rounded-xl flex justify-between items-center">
                        <div>
                            <div class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">TOTAL BIAYA RESEP</div>
                            <div class="text-base font-extrabold text-slate-900 mt-0.5">Rp 174.000</div>
                            <div class="text-[9px] text-gray-400">Estimasi biaya membuat 1 resep</div>
                        </div>
                        <span class="px-2 py-1 bg-emerald-100/70 text-emerald-800 text-[10px] font-bold rounded-md">
                            Formula Baku
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-4 pt-0 flex gap-2">
                <button class="flex-1 py-2 bg-[#1E372C] hover:bg-[#15271F] text-white text-xs font-semibold rounded-xl transition flex items-center justify-center gap-1.5 shadow-xs">
                    <i class="fa-regular fa-eye"></i> Lihat Resep & Rincian Biaya
                </button>
                <button class="p-2 border border-gray-200 hover:bg-gray-50 text-gray-600 rounded-xl transition">
                    <i class="fa-regular fa-pen-to-square text-xs"></i>
                </button>
            </div>
        </div>

    </div>

    <!-- PAGINATION -->
    <div class="pt-4 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-3 border-t border-gray-200">
        <div>
            Menampilkan <strong>6 dari 18 resep</strong> tersimpan
        </div>

        <div class="flex items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg bg-white text-gray-400 hover:text-slate-800 text-xs">
                ‹
            </button>
            <button class="w-8 h-8 flex items-center justify-center border border-[#1E372C] rounded-lg bg-[#1E372C] text-white font-bold text-xs shadow-xs">
                1
            </button>
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg bg-white text-slate-700 hover:bg-gray-50 font-medium text-xs">
                2
            </button>
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg bg-white text-slate-700 hover:bg-gray-50 font-medium text-xs">
                3
            </button>
            <button class="w-8 h-8 flex items-center justify-center border border-gray-200 rounded-lg bg-white text-slate-700 hover:bg-gray-50 text-xs">
                ›
            </button>
        </div>
    </div>

@endsection