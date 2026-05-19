<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiNilai UHB - Nilai Panjang Mahasiswa</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        },
                        accent: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(0,0,0,0.05)',
                        'glow': '0 0 20px rgba(139, 92, 246, 0.3)',
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #f8fafc; }
        .dark body { background-color: #0f172a; }
        
        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .dark .glass {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Nested Dropdown CSS */
        .nested-dropdown {
            visibility: hidden;
            opacity: 0;
            transform: translateX(5px);
            transition: all 0.2s ease;
        }
        .has-nested:hover > .nested-dropdown {
            visibility: visible;
            opacity: 1;
            transform: translateX(0);
            transition-delay: 0.1s;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; border: 2px solid transparent; background-clip: padding-box; }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .trans-all { transition: all 0.3s ease; }
    </style>
</head>
<body class="text-slate-800 dark:text-slate-200 antialiased" x-data="{ darkMode: false, sidebarOpen: true }" :class="{ 'dark': darkMode }">

<div class="flex h-screen overflow-hidden">

    <!-- ==================== SIDEBAR ==================== -->
    <aside class="fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transform transition-transform duration-300 lg:translate-x-0 lg:static flex flex-col"
           :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
        
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-slate-100 dark:border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-accent-500 flex items-center justify-center text-white shadow-glow">
                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
            </div>
            <span class="ml-3 font-bold text-xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-brand-600 to-accent-600 dark:from-brand-400 dark:to-accent-400">SiNilai UHB</span>
        </div>

        <!-- Menus -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-8">
            <!-- Menu Utama -->
            <div>
                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Menu Utama</p>
                <div class="space-y-1">
                    <a href="#" class="flex items-center px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-brand-50 dark:hover:bg-slate-800 hover:text-brand-600 rounded-xl trans-all group">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 mr-3 group-hover:scale-110 trans-all"></i>
                        <span class="font-medium text-sm">Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 bg-gradient-to-r from-brand-500 to-accent-500 text-white rounded-xl shadow-glow trans-all group">
                        <i data-lucide="file-spreadsheet" class="w-5 h-5 mr-3"></i>
                        <span class="font-medium text-sm">Nilai Mahasiswa</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-brand-50 dark:hover:bg-slate-800 hover:text-brand-600 rounded-xl trans-all group">
                        <i data-lucide="users" class="w-5 h-5 mr-3 group-hover:scale-110 trans-all"></i>
                        <span class="font-medium text-sm">Data Mahasiswa</span>
                    </a>
                </div>
            </div>

            <!-- Menu Akademik -->
            <div>
                <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Menu Akademik</p>
                <div class="space-y-1">
                    <a href="#" class="flex items-center px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-brand-50 dark:hover:bg-slate-800 hover:text-brand-600 rounded-xl trans-all group">
                        <i data-lucide="building-2" class="w-5 h-5 mr-3 group-hover:scale-110 trans-all"></i>
                        <span class="font-medium text-sm">Fakultas & Prodi</span>
                    </a>
                    <a href="#" class="flex items-center px-4 py-3 text-slate-600 dark:text-slate-400 hover:bg-brand-50 dark:hover:bg-slate-800 hover:text-brand-600 rounded-xl trans-all group">
                        <i data-lucide="book-open" class="w-5 h-5 mr-3 group-hover:scale-110 trans-all"></i>
                        <span class="font-medium text-sm">Mata Kuliah</span>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/50 z-40 lg:hidden" style="display: none;"></div>

    <!-- ==================== MAIN CONTENT ==================== -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50/50 dark:bg-slate-900/50">
        
        <!-- Header Atas -->
        <header class="h-20 glass border-b-0 px-6 sm:px-10 flex items-center justify-between z-30 shadow-sm sticky top-0">
            <div class="flex items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden mr-4 text-slate-500 hover:text-brand-600">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div class="hidden md:flex items-center text-sm">
                    <span class="text-slate-400">SiNilai</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 mx-2 text-slate-300"></i>
                    <span class="text-slate-400">Dashboard</span>
                    <i data-lucide="chevron-right" class="w-4 h-4 mx-2 text-slate-300"></i>
                    <span class="font-semibold text-slate-700 dark:text-slate-200">Nilai Mahasiswa</span>
                </div>
            </div>

            <div class="flex items-center space-x-4 sm:space-x-6">
                <!-- Search Bar Realtime -->
                <div class="hidden sm:block relative group">
                    <i data-lucide="search" class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400 group-focus-within:text-brand-500 trans-all"></i>
                    <input type="text" placeholder="Cari NIM, Nama..." 
                           class="w-64 pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-800 border-transparent focus:bg-white focus:border-brand-500 rounded-xl text-sm trans-all focus:ring-2 focus:ring-brand-500/20 outline-none transition-shadow">
                </div>
                <!-- Dark Mode -->
                <button @click="darkMode = !darkMode" class="p-2.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-brand-600 trans-all">
                    <i x-show="!darkMode" data-lucide="moon" class="w-5 h-5"></i>
                    <i x-show="darkMode" data-lucide="sun" class="w-5 h-5" style="display: none;"></i>
                </button>
                <!-- Profile -->
                <div class="flex items-center pl-2 border-l border-slate-200 dark:border-slate-700 cursor-pointer group">
                    <div class="text-right mr-3 hidden md:block">
                        <p class="text-sm font-bold text-slate-700 dark:text-slate-200">Admin Akademik</p>
                        <p class="text-xs text-brand-500">Superadmin</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin&background=8b5cf6&color=fff&rounded=true" alt="Admin" class="w-10 h-10 rounded-xl shadow-sm">
                </div>
            </div>
        </header>

        <!-- Scrollable Area -->
        <div class="flex-1 overflow-y-auto p-6 sm:p-10 scroll-smooth">
            <div class="max-w-[1500px] mx-auto space-y-6">
                
                <!-- Hero & Filter Compact -->
                <div class="glass rounded-2xl p-6 shadow-soft relative flex flex-col xl:flex-row justify-between gap-6">
                    <!-- Gradient Background confines overflow -->
                    <div class="absolute inset-0 overflow-hidden rounded-2xl pointer-events-none z-0">
                        <div class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-brand-500/5 to-transparent"></div>
                    </div>
                    
                    <div class="relative z-10 flex-shrink-0">
                        <h1 class="text-2xl font-bold text-slate-800 dark:text-white mb-1">Data Nilai Mahasiswa</h1>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Rekapitulasi akademik universitas modern</p>
                    </div>

                    <!-- Filter Dropdowns -->
                    <div class="relative z-10 flex flex-wrap gap-3 xl:justify-end items-center flex-1">
                        
                        <!-- Filter Fakultas nested -->
                        <div class="relative min-w-[170px] z-[60]" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="relative z-10 w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold hover:border-brand-400 trans-all">
                                <span class="text-slate-600 dark:text-slate-300">Semua Fakultas</span> <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 ml-2"></i>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 z-50 w-64 mt-2 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-2" style="display: none;">
                                <!-- Item 1 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">Teknologi & Sains</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-64 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Informatika</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Sistem Informasi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Teknik Robotika & Kecerdasan Buatan</a>
                                    </div>
                                </div>
                                <!-- Item 2 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">Ilmu Sosial</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-60 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Hukum</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Akuntansi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Manajemen</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Pendidikan Bahasa Inggris</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Bisnis Digital</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Pariwisata</a>
                                    </div>
                                </div>
                                <!-- Item 3 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">Kesehatan</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-60 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Keperawatan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Farmasi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">D3 Keperawatan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">S1 Kebidanan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">D4 Keperawatan Anestesiologi</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Tahun Angkatan -->
                        <div class="relative min-w-[160px] z-[55]" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="relative z-10 w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold hover:border-brand-400 trans-all">
                                <span class="text-slate-600 dark:text-slate-300">Semua Angkatan</span> <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 ml-2"></i>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 z-50 w-48 mt-2 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-2" style="display: none;">
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Semua Angkatan</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2025</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2024</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2023</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2022</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2021</a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">2020</a>
                            </div>
                        </div>

                        <!-- Filter Mata Kuliah nested -->
                        <div class="relative min-w-[190px] z-[50]" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="relative z-10 w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-sm font-semibold hover:border-brand-400 trans-all">
                                <span class="text-slate-600 dark:text-slate-300">Semua Mata Kuliah</span> <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 ml-2"></i>
                            </button>
                            <div x-show="open" x-transition class="absolute right-0 z-50 w-64 mt-2 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-2" style="display: none;">
                                <!-- Item 1 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">MK Informatika</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-60 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Algoritma & Pemrograman</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Struktur Data</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Basis Data</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Pemrograman Web</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Kecerdasan Buatan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Machine Learning</a>
                                    </div>
                                </div>
                                <!-- Item 2 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">MK Sistem Informasi</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-64 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Analisis Sistem</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">ERP</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Sistem Pendukung Keputusan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Audit Sistem Informasi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Manajemen Proyek TI</a>
                                    </div>
                                </div>
                                <!-- Item 3 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">MK Kesehatan</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-56 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Anatomi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Farmakologi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Keperawatan Dasar</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Gizi Klinik</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Kesehatan Masyarakat</a>
                                    </div>
                                </div>
                                <!-- Item 4 -->
                                <div class="relative has-nested group/item">
                                    <div class="px-4 py-2.5 flex items-center justify-between hover:bg-brand-50 dark:hover:bg-slate-700 cursor-pointer">
                                        <span class="text-sm font-semibold">MK Bisnis & Sosial</span> <i data-lucide="chevron-left" class="w-4 h-4 text-slate-400"></i>
                                    </div>
                                    <div class="nested-dropdown absolute top-[-8px] right-full w-60 bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 py-2 z-50">
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Pengantar Akuntansi</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Manajemen Keuangan</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Hukum Bisnis</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Digital Marketing</a>
                                        <a href="#" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Pariwisata Digital</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button Export -->
                        <button class="flex items-center px-4 py-2 bg-gradient-to-r from-brand-600 to-brand-500 text-white rounded-xl shadow-md hover:-translate-y-0.5 hover:shadow-lg trans-all z-10 relative">
                            <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                            <span class="text-sm font-bold">Export</span>
                        </button>
                    </div>
                </div>

                <!-- NEW TABLE SECTION -->
                <div class="glass rounded-2xl shadow-soft overflow-hidden border border-slate-200 dark:border-slate-700 bg-white/50 dark:bg-slate-900/50">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left border-collapse min-w-max">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest sticky left-0 z-20 bg-slate-50 dark:bg-slate-800 shadow-[1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[1px_0_0_0_rgba(30,41,59,1)]">NIM</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest">Nama Mahasiswa</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest">Fakultas</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest">Program Studi</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest">Mata Kuliah</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center">Angkatan</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center">Nilai</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center">Grade</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center">IPK</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center">Status</th>
                                    <th class="px-5 py-4 text-xs font-extrabold uppercase tracking-widest text-center sticky right-0 z-20 bg-slate-50 dark:bg-slate-800 shadow-[-1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[-1px_0_0_0_rgba(30,41,59,1)]">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/50">
                                
                                <!-- ROW 1: Grade A -->
                                <tr class="hover:bg-brand-50/50 dark:hover:bg-slate-800/50 even:bg-slate-50/50 dark:even:bg-slate-800/20 trans-all group bg-white dark:bg-slate-900">
                                    <td class="px-5 py-4 text-sm font-mono text-slate-500 sticky left-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[1px_0_0_0_rgba(30,41,59,1)]">2021001001</td>
                                    <td class="px-5 py-4 text-sm font-bold text-slate-800 dark:text-slate-200">Rizal Fathur Rahman</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">Teknologi & Sains</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">S1 Informatika</td>
                                    <td class="px-5 py-4 text-sm font-bold text-brand-600 dark:text-brand-400">Struktur Data</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400 text-center">2021</td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">88.5</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-extrabold bg-emerald-100 text-emerald-700 border border-emerald-200 shadow-sm">A</span>
                                    </td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">3.85</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100"><i data-lucide="check-circle-2" class="w-3.5 h-3.5 mr-1"></i> Lulus</span>
                                    </td>
                                    <td class="px-5 py-4 sticky right-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[-1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[-1px_0_0_0_rgba(30,41,59,1)]">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-brand-500 hover:bg-brand-100 dark:hover:bg-brand-900/50 rounded-lg trans-all hover:scale-110" title="Detail"><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-amber-500 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg trans-all hover:scale-110" title="Edit"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg trans-all hover:scale-110" title="Hapus"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ROW 2: Grade B -->
                                <tr class="hover:bg-brand-50/50 dark:hover:bg-slate-800/50 even:bg-slate-50/50 dark:even:bg-slate-800/20 trans-all group bg-white dark:bg-slate-900">
                                    <td class="px-5 py-4 text-sm font-mono text-slate-500 sticky left-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[1px_0_0_0_rgba(30,41,59,1)]">2022003002</td>
                                    <td class="px-5 py-4 text-sm font-bold text-slate-800 dark:text-slate-200">Siti Nurhaliza</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">Ilmu Sosial</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">S1 Manajemen</td>
                                    <td class="px-5 py-4 text-sm font-bold text-brand-600 dark:text-brand-400">Pengantar Akuntansi</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400 text-center">2022</td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">75.0</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-extrabold bg-blue-100 text-blue-700 border border-blue-200 shadow-sm">B</span>
                                    </td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">3.20</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-100"><i data-lucide="check-circle-2" class="w-3.5 h-3.5 mr-1"></i> Lulus</span>
                                    </td>
                                    <td class="px-5 py-4 sticky right-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[-1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[-1px_0_0_0_rgba(30,41,59,1)]">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-brand-500 hover:bg-brand-100 dark:hover:bg-brand-900/50 rounded-lg trans-all hover:scale-110" title="Detail"><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-amber-500 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg trans-all hover:scale-110" title="Edit"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg trans-all hover:scale-110" title="Hapus"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ROW 3: Grade C -->
                                <tr class="hover:bg-brand-50/50 dark:hover:bg-slate-800/50 even:bg-slate-50/50 dark:even:bg-slate-800/20 trans-all group bg-white dark:bg-slate-900">
                                    <td class="px-5 py-4 text-sm font-mono text-slate-500 sticky left-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[1px_0_0_0_rgba(30,41,59,1)]">2023004010</td>
                                    <td class="px-5 py-4 text-sm font-bold text-slate-800 dark:text-slate-200">Fauzan Akbar</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">Kesehatan</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">S1 Keperawatan</td>
                                    <td class="px-5 py-4 text-sm font-bold text-brand-600 dark:text-brand-400">Keperawatan Dasar</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400 text-center">2023</td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">65.5</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-extrabold bg-orange-100 text-orange-700 border border-orange-200 shadow-sm">C</span>
                                    </td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">2.75</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center text-xs font-bold text-orange-600 bg-orange-50 px-2.5 py-1 rounded-lg border border-orange-100"><i data-lucide="alert-circle" class="w-3.5 h-3.5 mr-1"></i> Perbaikan</span>
                                    </td>
                                    <td class="px-5 py-4 sticky right-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[-1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[-1px_0_0_0_rgba(30,41,59,1)]">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-brand-500 hover:bg-brand-100 dark:hover:bg-brand-900/50 rounded-lg trans-all hover:scale-110" title="Detail"><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-amber-500 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg trans-all hover:scale-110" title="Edit"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg trans-all hover:scale-110" title="Hapus"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- ROW 4: Grade D/E -->
                                <tr class="hover:bg-brand-50/50 dark:hover:bg-slate-800/50 even:bg-slate-50/50 dark:even:bg-slate-800/20 trans-all group bg-white dark:bg-slate-900">
                                    <td class="px-5 py-4 text-sm font-mono text-slate-500 sticky left-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[1px_0_0_0_rgba(30,41,59,1)]">2020005005</td>
                                    <td class="px-5 py-4 text-sm font-bold text-slate-800 dark:text-slate-200">Budi Santoso</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">Teknologi & Sains</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400">S1 Sistem Informasi</td>
                                    <td class="px-5 py-4 text-sm font-bold text-brand-600 dark:text-brand-400">Pemrograman Web</td>
                                    <td class="px-5 py-4 text-sm font-medium text-slate-600 dark:text-slate-400 text-center">2020</td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">50.0</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg text-xs font-extrabold bg-red-100 text-red-700 border border-red-200 shadow-sm">D</span>
                                    </td>
                                    <td class="px-5 py-4 text-sm font-extrabold text-slate-800 dark:text-slate-200 text-center">1.50</td>
                                    <td class="px-5 py-4 text-center">
                                        <span class="inline-flex items-center text-xs font-bold text-red-600 bg-red-50 px-2.5 py-1 rounded-lg border border-red-100"><i data-lucide="x-circle" class="w-3.5 h-3.5 mr-1"></i> Gagal</span>
                                    </td>
                                    <td class="px-5 py-4 sticky right-0 z-10 bg-inherit group-hover:bg-brand-50/50 dark:group-hover:bg-slate-800/50 trans-all shadow-[-1px_0_0_0_rgba(226,232,240,1)] dark:shadow-[-1px_0_0_0_rgba(30,41,59,1)]">
                                        <div class="flex items-center justify-center space-x-2">
                                            <button class="p-1.5 text-brand-500 hover:bg-brand-100 dark:hover:bg-brand-900/50 rounded-lg trans-all hover:scale-110" title="Detail"><i data-lucide="eye" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-amber-500 hover:bg-amber-100 dark:hover:bg-amber-900/50 rounded-lg trans-all hover:scale-110" title="Edit"><i data-lucide="edit-2" class="w-4 h-4"></i></button>
                                            <button class="p-1.5 text-red-500 hover:bg-red-100 dark:hover:bg-red-900/50 rounded-lg trans-all hover:scale-110" title="Hapus"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                    <div class="px-6 py-5 border-t border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-900/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center text-sm text-slate-500 dark:text-slate-400">
                            <span>Menampilkan <span class="font-bold text-slate-700 dark:text-slate-300">1</span> sampai <span class="font-bold text-slate-700 dark:text-slate-300">10</span> dari <span class="font-bold text-slate-700 dark:text-slate-300">45</span> data</span>
                            
                            <div class="ml-4 pl-4 border-l border-slate-300 dark:border-slate-600 hidden md:block">
                                <select class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 rounded-lg text-sm px-2 py-1 focus:ring-brand-500 focus:border-brand-500 outline-none trans-all cursor-pointer shadow-sm">
                                    <option>10 / halaman</option>
                                    <option>25 / halaman</option>
                                    <option>50 / halaman</option>
                                    <option>100 / halaman</option>
                                </select>
                            </div>
                        </div>

                        <!-- Pagination Buttons -->
                        <div class="flex items-center space-x-1">
                            <button class="px-3 py-1.5 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-700 trans-all flex items-center shadow-sm">
                                <i data-lucide="chevron-left" class="w-4 h-4 mr-1"></i> Prev
                            </button>
                            
                            <button class="px-3.5 py-1.5 border border-brand-500 bg-brand-50 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 rounded-lg font-bold shadow-sm trans-all">1</button>
                            <button class="px-3.5 py-1.5 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-700 trans-all shadow-sm">2</button>
                            <button class="px-3.5 py-1.5 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-700 trans-all shadow-sm hidden sm:block">3</button>
                            <span class="px-2 text-slate-400 hidden sm:block">...</span>
                            <button class="px-3.5 py-1.5 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-700 trans-all shadow-sm hidden sm:block">5</button>
                            
                            <button class="px-3 py-1.5 border border-slate-200 dark:border-slate-700 text-slate-500 dark:text-slate-400 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-slate-700 trans-all flex items-center shadow-sm">
                                Next <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Footer -->
            <footer class="mt-12 text-center text-sm font-medium text-slate-400 pb-6">
                &copy; 2026 SiNilai UHB - Universitas Harapan Bangsa. Hak Cipta Dilindungi.
            </footer>
        </div>
    </main>
</div>

<script>
    // Initialize Lucide Icons
    lucide.createIcons();
</script>

</body>
</html>
