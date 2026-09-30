<aside class="lg:col-span-2 space-y-6">
    <!-- Group 1 -->
    <div>
        <div class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-2">
            NAVIGASi SISWA
        </div>
        <nav class="space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 px-3 py-2 bg-[#1E372C] text-white text-xs font-medium rounded-xl shadow-xs">
                <i class="fa-solid fa-chart-pie text-xs"></i>
                Dashboard & Resep Saya
            </a>
           <a href="{{ route('resep') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium rounded-xl transition {{ request()->routeIs('resep') ? 'bg-[#1E372C] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100 hover:text-slate-900' }}">
                <i class="fa-solid fa-circle-plus text-xs"></i>
                Buat Resep Baru
            </a>
              <a href="{{ route('master-harga') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium rounded-xl transition {{ request()->routeIs('master-harga') ? 'bg-[#1E372C] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100 hover:text-slate-900' }}">
                <i class="fa-solid fa-globe text-xs"></i>
                Master Harga Global
            </a>
        </nav>
    </div>

    <!-- Group 2 -->
    <!-- Group 2 -->
    @if(auth()->check() && in_array(strtolower(auth()->user()->role), ['admin', 'guru']))
    <div>
        <div class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-2">
            OTORITAS GURU
        </div>
        <nav class="space-y-1">
            <a href="{{ route('admin.moderasi') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium rounded-xl transition {{ request()->routeIs('admin.moderasi') ? 'bg-[#1E372C] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100 hover:text-slate-900' }}">
                <i class="fa-solid fa-shield-halved text-xs"></i>
                Moderasi Bahan Baku
            </a>
        </nav>
    </div>
    @endif

    <!-- Group 3 -->
    <div>
        <div class="text-[10px] font-bold text-gray-400 tracking-wider uppercase mb-2">
            REFERENSI BUKU
        </div>
        <nav class="space-y-1">
            <a href="{{ route('panduan-harga') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium rounded-xl transition {{ request()->routeIs('panduan-harga') ? 'bg-[#1E372C] text-white shadow-xs' : 'text-gray-600 hover:bg-gray-100 hover:text-slate-900' }}">
                <i class="fa-solid fa-book-bookmark text-xs"></i>
                Panduan Standar Biaya
            </a>
        </nav>
    </div>
</aside>