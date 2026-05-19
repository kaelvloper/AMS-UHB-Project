<aside
    x-data="{}"
    :class="sidebarOpen ? 'w-64' : 'w-0 md:w-16'"
    class="flex-shrink-0 flex flex-col h-screen bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-r border-slate-200/50 dark:border-slate-800/50 overflow-hidden transition-all duration-300 z-30 fixed md:relative">

    <!-- Logo Area -->
    <div class="flex items-center h-16 px-4 border-b border-slate-200/50 dark:border-slate-800/50 flex-shrink-0">
        <div class="w-9 h-9 gradient-primary rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/30 flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
        </div>
        <span x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="ml-3 text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 dark:from-indigo-400 dark:via-violet-400 dark:to-purple-400 whitespace-nowrap">
            SiNilai UHB
        </span>
    </div>

    <!-- Scrollable Nav Content -->
    <div class="flex flex-col flex-1 overflow-y-auto overflow-x-hidden py-4 px-2 space-y-1">

        <!-- Label -->
        <p x-show="sidebarOpen" class="px-3 mb-1 text-xs font-semibold text-slate-400 dark:text-slate-600 uppercase tracking-wider">Menu Utama</p>

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}" title="Dashboard">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard</span>
        </a>

        <!-- Nilai Mahasiswa -->
        <a href="{{ route('nilai.index') }}" class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }}" title="Nilai Mahasiswa">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Nilai Mahasiswa</span>
        </a>

        <!-- Data Mahasiswa -->
        <a href="{{ route('mahasiswa.index') }}" class="nav-item {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}" title="Data Mahasiswa">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Data Mahasiswa</span>
        </a>

        <!-- Statistik -->
        <a href="{{ route('statistik.index') }}" class="nav-item {{ request()->routeIs('statistik.*') ? 'active' : '' }}" title="Statistik">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Statistik</span>
        </a>

        <div class="pt-2 pb-1">
            <div class="h-px bg-slate-200/80 dark:bg-slate-700/60 mx-2"></div>
        </div>

        <p x-show="sidebarOpen" class="px-3 mb-1 text-xs font-semibold text-slate-400 dark:text-slate-600 uppercase tracking-wider">Akademik</p>

        <!-- Fakultas & Prodi -->
        <a href="#" class="nav-item" title="Fakultas & Prodi">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Fakultas & Prodi</span>
        </a>

        <!-- Mata Kuliah -->
        <a href="#" class="nav-item" title="Mata Kuliah">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Mata Kuliah</span>
        </a>

        <!-- Kalender Akademik -->
        <a href="#" class="nav-item" title="Kalender Akademik">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Kalender Akademik</span>
        </a>

        <div class="pt-2 pb-1">
            <div class="h-px bg-slate-200/80 dark:bg-slate-700/60 mx-2"></div>
        </div>

        <p x-show="sidebarOpen" class="px-3 mb-1 text-xs font-semibold text-slate-400 dark:text-slate-600 uppercase tracking-wider">Sistem</p>

        <!-- Pengaturan -->
        <a href="#" class="nav-item" title="Pengaturan">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span x-show="sidebarOpen" class="whitespace-nowrap">Pengaturan</span>
        </a>
    </div>

    <!-- Help Card (only when expanded) -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="p-3 flex-shrink-0">
        <div class="p-4 gradient-primary rounded-2xl text-white shadow-lg shadow-indigo-500/20 relative overflow-hidden">
            <div class="absolute -top-4 -right-4 w-16 h-16 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-2 -left-2 w-10 h-10 bg-white/10 rounded-full"></div>
            <h3 class="text-xs font-semibold mb-1 relative">Butuh Bantuan?</h3>
            <p class="text-xs text-indigo-100 mb-3 relative">Hubungi tim support IT Kampus UHB</p>
            <button class="w-full py-1.5 bg-white text-indigo-600 rounded-xl text-xs font-semibold hover:bg-slate-50 transition-colors shadow-sm relative">
                Contact Support
            </button>
        </div>
    </div>
</aside>
