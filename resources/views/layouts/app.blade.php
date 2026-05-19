<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', v => { localStorage.setItem('darkMode', v); document.documentElement.classList.toggle('dark', v) })" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="SiNilai UHB – Sistem Informasi Akademik Mahasiswa Universitas Harapan Bangsa">

    <title>{{ config('app.name', 'SiNilai UHB') }} – {{ $title ?? 'Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles

    <style>
        body { font-family: 'Poppins', 'Inter', sans-serif; }
    </style>
</head>
<body class="antialiased bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 transition-colors duration-300" x-data="sinilaApp()" x-init="init()">

    <x-banner />

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay"
         x-show="sidebarOpen && isMobile"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-slate-900/60"
         style="display:none;">
    </div>

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden transition-all duration-300">

            <!-- Navbar Component -->
            <x-navbar />

            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 page-enter">
                {{ $slot }}
            </main>

        </div>
    </div>

    <!-- Notification Panel (Global) -->
    <div x-show="notifOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-x-4"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-x-0"
         x-transition:leave-end="opacity-0 translate-x-4"
         @click.outside="notifOpen = false"
         class="fixed top-16 right-4 z-50 w-80 glass-card shadow-2xl overflow-hidden"
         style="display:none;">
        <div class="p-4 border-b border-slate-200/60 dark:border-slate-700/60 flex items-center justify-between">
            <h3 class="font-semibold text-sm text-slate-800 dark:text-slate-200">Notifikasi</h3>
            <button @click="notifOpen = false" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 p-1 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="divide-y divide-slate-100 dark:divide-slate-800 max-h-80 overflow-y-auto">
            <template x-for="notif in notifications" :key="notif.id">
                <div class="flex items-start gap-3 p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer" :class="{'opacity-60': notif.read}">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5"
                         :class="notif.color">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="notif.icon"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 dark:text-slate-200" x-text="notif.title"></p>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5" x-text="notif.message"></p>
                        <p class="text-xs text-indigo-500 mt-1" x-text="notif.time"></p>
                    </div>
                    <div x-show="!notif.read" class="w-2 h-2 rounded-full bg-indigo-500 flex-shrink-0 mt-2"></div>
                </div>
            </template>
        </div>
        <div class="p-3 text-center border-t border-slate-200/60 dark:border-slate-700/60">
            <button class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">Lihat semua notifikasi</button>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
    @stack('scripts')

    <script>
        function sinilaApp() {
            return {
                sidebarOpen: true,
                notifOpen: false,
                isMobile: window.innerWidth < 768,
                notifications: [
                    { id: 1, title: 'Input Nilai Dibuka', message: 'Periode input nilai UAS Genap 2024/2025 telah dibuka', time: '5 menit lalu', read: false, color: 'bg-indigo-500', icon: 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9' },
                    { id: 2, title: 'Mahasiswa Baru Terdaftar', message: '24 mahasiswa baru S1 Informatika berhasil terdaftar', time: '1 jam lalu', read: false, color: 'bg-emerald-500', icon: 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z' },
                    { id: 3, title: 'Laporan Siap Diunduh', message: 'Laporan transkrip nilai semester genap sudah tersedia', time: '3 jam lalu', read: true, color: 'bg-amber-500', icon: 'M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' },
                    { id: 4, title: 'Semester Baru Dimulai', message: 'Semester Ganjil 2025/2026 telah resmi dimulai', time: '1 hari lalu', read: true, color: 'bg-cyan-500', icon: 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z' },
                ],
                init() {
                    // Init dark mode from localStorage
                    if (localStorage.getItem('darkMode') === 'true') {
                        document.documentElement.classList.add('dark');
                        this.darkMode = true;
                    }

                    // Responsive sidebar
                    window.addEventListener('resize', () => {
                        this.isMobile = window.innerWidth < 768;
                        if (!this.isMobile) this.sidebarOpen = true;
                    });
                    if (this.isMobile) this.sidebarOpen = false;
                }
            }
        }
    </script>
</body>
</html>
