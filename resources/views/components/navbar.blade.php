<header class="bg-white border-b border-gray-200 w-full sticky top-0 z-50">
    <div class="max-w-[1600px] mx-auto px-4 lg:px-6 py-3 flex items-center justify-between">
        
        <!-- Logo & Brand -->
        <a href="/" class="flex items-center gap-2.5 no-underline">
            <div class="w-8 h-8 bg-[#1E372C] rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-xs">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <span class="font-bold text-base text-slate-900 tracking-tight">Chefonomics</span>
        </a>
        <!-- Tombol Logout Merah -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-semibold rounded-xl transition flex items-center gap-1.5 border border-red-200">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</header>