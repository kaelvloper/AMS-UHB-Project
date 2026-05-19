<header class="sticky top-0 z-40 w-full bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200/50 dark:border-slate-800/50 transition-colors duration-300">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6">

        <!-- Left: Sidebar Toggle + Breadcrumb -->
        <div class="flex items-center gap-3">
            <!-- Sidebar Toggle -->
            <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-200"
                    title="Toggle Sidebar">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Breadcrumb (hidden on mobile) -->
            <nav class="hidden sm:flex items-center gap-2 text-sm">
                <span class="text-slate-400 dark:text-slate-500">SiNilai</span>
                <svg class="w-3.5 h-3.5 text-slate-300 dark:text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="font-semibold text-indigo-600 dark:text-indigo-400">{{ $pageTitle ?? 'Dashboard' }}</span>
            </nav>
        </div>

        <!-- Center: Search Bar (Desktop) -->
        <div class="hidden md:flex items-center flex-1 max-w-md mx-6">
            <div class="relative w-full">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                </svg>
                <input type="text"
                       placeholder="Cari mahasiswa, NIM, mata kuliah..."
                       class="w-full pl-10 pr-4 py-2 bg-slate-100/80 dark:bg-slate-800/80 border border-transparent hover:border-slate-300 dark:hover:border-slate-600 focus:border-indigo-400 dark:focus:border-indigo-500 rounded-xl text-sm text-slate-700 dark:text-slate-200 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 transition-all duration-200">
                <kbd class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-md px-1.5 py-0.5 font-mono">⌘K</kbd>
            </div>
        </div>

        <!-- Right: Action Buttons + Profile -->
        <div class="flex items-center gap-2">

            <!-- Mobile Search -->
            <button class="md:hidden p-2 text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/>
                </svg>
            </button>

            <!-- Dark Mode Toggle -->
            <button @click="darkMode = !darkMode"
                    class="p-2 text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-200"
                    title="Toggle Dark Mode">
                <!-- Sun (dark mode on) -->
                <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <!-- Moon (dark mode off) -->
                <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>

            <!-- Notifications -->
            <div class="relative">
                <button @click="notifOpen = !notifOpen"
                        class="relative p-2 text-slate-500 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-xl hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-200"
                        title="Notifikasi">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <!-- Badge -->
                    <span class="absolute top-1 right-1 flex w-2.5 h-2.5">
                        <span class="absolute inline-flex w-full h-full bg-red-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white dark:border-slate-900"></span>
                    </span>
                </button>
            </div>

            <div class="h-8 w-px bg-slate-200 dark:bg-slate-700 mx-1 hidden sm:block"></div>

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ profileOpen: false }" @click.outside="profileOpen = false">
                <button @click="profileOpen = !profileOpen"
                        class="flex items-center gap-2.5 cursor-pointer p-1.5 pr-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                    <img class="object-cover w-8 h-8 rounded-lg ring-2 ring-indigo-500/30"
                         src="https://ui-avatars.com/api/?name=Admin+UHB&background=6366f1&color=fff&bold=true"
                         alt="User avatar">
                    <div class="hidden md:flex flex-col text-left">
                        <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 leading-tight">Admin Akademik</span>
                        <span class="text-xs text-slate-500 dark:text-slate-400">Superadmin</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-400 hidden md:block transition-transform duration-200" :class="{'rotate-180': profileOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="profileOpen"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 top-12 w-52 glass-card shadow-xl border border-slate-200/70 dark:border-slate-700/70 overflow-hidden"
                     style="display: none;">

                    <div class="px-4 py-3 border-b border-slate-200/50 dark:border-slate-700/50">
                        <p class="text-sm font-semibold text-slate-800 dark:text-slate-200">Admin Akademik</p>
                        <p class="text-xs text-slate-500 truncate">admin@uhb.ac.id</p>
                    </div>

                    <div class="py-1">
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Profil Saya
                        </a>
                        <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-700 dark:hover:text-indigo-400 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Pengaturan
                        </a>
                    </div>

                    <div class="border-t border-slate-200/50 dark:border-slate-700/50 py-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors text-left">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
