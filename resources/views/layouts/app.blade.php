<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem Informasi Event & Rekap') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="font-sans antialiased text-navy-900 bg-navy-50" x-data="{ sidebarOpen: false }">
        <x-banner />

        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-72 bg-navy-900 text-white transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 shadow-2xl flex flex-col">
                <!-- Logo -->
                <div class="flex items-center justify-center h-20 border-b border-navy-800 px-6">
                    <a href="/" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-uhbblue-600 to-uhbamber-400 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            UHB
                        </div>
                        <span class="font-bold text-xl tracking-wide">Event<span class="text-uhbblue-400">Rekap</span></span>
                    </a>
                </div>

                <!-- Nav Links -->
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-uhbblue-600 text-white' : 'text-navy-300 hover:bg-navy-800 hover:text-white' }} transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="px-4 text-xs font-semibold text-navy-500 uppercase tracking-wider">Manajemen</p>
                    </div>

                    <!-- Events -->
                    <a href="{{ route('events') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('events') ? 'bg-uhbblue-600 text-white' : 'text-navy-300 hover:bg-navy-800 hover:text-white' }} transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="font-medium">Event & Seminar</span>
                    </a>

                    <!-- Calendar -->
                    <a href="{{ route('calendar') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('calendar') ? 'bg-uhbblue-600 text-white' : 'text-navy-300 hover:bg-navy-800 hover:text-white' }} transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="font-medium">Kalender Kegiatan</span>
                    </a>

                    <!-- Certificates -->
                    <a href="{{ route('certificates') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('certificates') ? 'bg-uhbblue-600 text-white' : 'text-navy-300 hover:bg-navy-800 hover:text-white' }} transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        <span class="font-medium">Sertifikat Digital</span>
                    </a>
                </nav>

                <!-- User Info -->
                <div class="border-t border-navy-800 p-4">
                    <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-navy-800/50 border border-navy-700/50 cursor-pointer hover:bg-navy-800 transition" x-data="{ openMenu: false }" @click="openMenu = !openMenu" @click.away="openMenu = false" relative>
                        <img class="h-10 w-10 rounded-full object-cover border-2 border-uhbblue-500" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-navy-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <svg class="w-5 h-5 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                        
                        <!-- Dropdown -->
                        <div x-show="openMenu" x-transition class="absolute bottom-full left-0 w-full mb-2 bg-white rounded-xl shadow-xl border border-navy-100 overflow-hidden text-navy-900 z-50">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-3 text-sm hover:bg-navy-50 font-medium">Profil & Pengaturan</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" @click.prevent="$root.submit();" class="block w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 font-medium border-t border-navy-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Top Navbar -->
                <header class="h-20 bg-white border-b border-navy-100 flex items-center justify-between px-6 z-40 relative">
                    <div class="flex items-center gap-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden p-2 rounded-lg text-navy-600 hover:bg-navy-50">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </button>
                        
                        @if (isset($header))
                            <h1 class="text-2xl font-bold text-navy-900">{{ $header }}</h1>
                        @endif
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <!-- Notifications -->
                        <button class="relative p-2 rounded-full text-navy-500 hover:bg-navy-50 hover:text-navy-900 transition">
                            <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </button>
                    </div>
                </header>

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto bg-navy-50/50 p-6">
                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
