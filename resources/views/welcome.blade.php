<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Event & Rekap Kegiatan UHB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-navy-50 text-navy-900 selection:bg-uhbamber-400 selection:text-navy-950">

    <!-- Navbar -->
    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="{'bg-white/80 backdrop-blur-md shadow-sm': scrolled, 'bg-transparent': !scrolled}"
         class="fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-uhbblue-600 to-uhbamber-400 flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:shadow-uhbblue-500/50 transition-all duration-300 transform group-hover:-translate-y-1">
                            UHB
                        </div>
                        <span class="font-bold text-xl bg-clip-text text-transparent bg-gradient-to-r from-navy-900 to-navy-600">Event<span class="text-uhbblue-600">Rekap</span></span>
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-navy-600 hover:text-uhbblue-600 font-medium transition">Beranda</a>
                    <a href="#event" class="text-navy-600 hover:text-uhbblue-600 font-medium transition">Event & Seminar</a>
                    <a href="#kalender" class="text-navy-600 hover:text-uhbblue-600 font-medium transition">Kalender</a>
                    <a href="#sertifikat" class="text-navy-600 hover:text-uhbblue-600 font-medium transition">Cek Sertifikat</a>
                    
                    <div class="flex items-center gap-4 ml-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 rounded-full bg-navy-900 text-white font-medium hover:bg-navy-800 transition shadow-lg hover:shadow-navy-900/30 transform hover:-translate-y-0.5">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full border-2 border-navy-200 text-navy-700 font-medium hover:border-navy-900 hover:text-navy-900 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-uhbblue-600 to-uhbblue-500 text-white font-medium hover:from-uhbblue-700 hover:to-uhbblue-600 transition shadow-lg hover:shadow-uhbblue-500/30 transform hover:-translate-y-0.5">Daftar</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button @click="open = !open" class="text-navy-600 hover:text-navy-900 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white border-t border-navy-100 absolute w-full shadow-xl">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#beranda" class="block px-3 py-3 text-base font-medium text-navy-700 hover:text-uhbblue-600 hover:bg-navy-50 rounded-lg">Beranda</a>
                <a href="#event" class="block px-3 py-3 text-base font-medium text-navy-700 hover:text-uhbblue-600 hover:bg-navy-50 rounded-lg">Event & Seminar</a>
                <a href="#kalender" class="block px-3 py-3 text-base font-medium text-navy-700 hover:text-uhbblue-600 hover:bg-navy-50 rounded-lg">Kalender</a>
                <a href="#sertifikat" class="block px-3 py-3 text-base font-medium text-navy-700 hover:text-uhbblue-600 hover:bg-navy-50 rounded-lg">Cek Sertifikat</a>
                
                <div class="mt-6 pt-6 border-t border-navy-100 flex flex-col gap-3 px-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full text-center px-6 py-3 rounded-xl bg-navy-900 text-white font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="w-full text-center px-6 py-3 rounded-xl border-2 border-navy-200 text-navy-700 font-medium">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-full text-center px-6 py-3 rounded-xl bg-gradient-to-r from-uhbblue-600 to-uhbblue-500 text-white font-medium">Daftar</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Decorative blobs -->
        <div class="absolute top-0 -left-4 w-72 h-72 bg-uhbblue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 -right-4 w-72 h-72 bg-uhbamber-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/60 backdrop-blur-sm border border-white/40 shadow-sm text-sm font-semibold text-uhbblue-600 mb-8">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-uhbamber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-uhbamber-500"></span>
                    </span>
                    Sistem Manajemen Event Modern UHB
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold text-navy-900 tracking-tight leading-tight mb-8">
                    Kelola & Ikuti Event <br class="hidden md:block" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-uhbblue-600 to-uhbamber-400">Kampus Lebih Mudah</span>
                </h1>
                
                <p class="text-lg md:text-xl text-navy-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Satu platform terintegrasi untuk menemukan seminar, workshop, mengelola rekap kegiatan mahasiswa, dan mengunduh sertifikat digital dengan aman.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#event" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-uhbblue-600 text-white font-semibold text-lg hover:bg-uhbblue-700 transition-all shadow-[0_8px_30px_rgba(37,99,235,0.3)] hover:shadow-[0_8px_30px_rgba(37,99,235,0.5)] transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        Cari Event
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#sertifikat" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-white text-navy-900 font-semibold text-lg hover:bg-uhbamber-50 transition-all shadow-sm border-2 border-uhbamber-400 hover:border-uhbamber-500 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-uhbamber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Cek Sertifikat
                    </a>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <!-- Stat Card 1 -->
                <div class="bg-white/60 backdrop-blur-lg border border-white/40 p-6 rounded-3xl shadow-xl shadow-navy-900/5 text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-12 h-12 mx-auto bg-blue-100 rounded-2xl flex items-center justify-center mb-4 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold text-navy-900 mb-1">150+</div>
                    <div class="text-sm font-medium text-navy-500">Event Diselenggarakan</div>
                </div>
                <!-- Stat Card 2 -->
                <div class="bg-white/60 backdrop-blur-lg border border-white/40 p-6 rounded-3xl shadow-xl shadow-navy-900/5 text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-12 h-12 mx-auto bg-uhbamber-100 rounded-2xl flex items-center justify-center mb-4 text-uhbamber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold text-navy-900 mb-1">5.4k</div>
                    <div class="text-sm font-medium text-navy-500">Peserta Aktif</div>
                </div>
                <!-- Stat Card 3 -->
                <div class="bg-white/60 backdrop-blur-lg border border-white/40 p-6 rounded-3xl shadow-xl shadow-navy-900/5 text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-12 h-12 mx-auto bg-purple-100 rounded-2xl flex items-center justify-center mb-4 text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <div class="text-3xl font-bold text-navy-900 mb-1">12k+</div>
                    <div class="text-sm font-medium text-navy-500">Sertifikat Terbit</div>
                </div>
                <!-- Stat Card 4 -->
                <div class="bg-white/60 backdrop-blur-lg border border-white/40 p-6 rounded-3xl shadow-xl shadow-navy-900/5 text-center transform hover:-translate-y-2 transition-all duration-300">
                    <div class="w-12 h-12 mx-auto bg-orange-100 rounded-2xl flex items-center justify-center mb-4 text-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="text-3xl font-bold text-navy-900 mb-1">20+</div>
                    <div class="text-sm font-medium text-navy-500">Organisasi Aktif</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Events Section -->
    <section id="event" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div class="max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-navy-900 mb-4">Event & Seminar Mendatang</h2>
                    <p class="text-lg text-navy-600">Jelajahi dan ikuti berbagai kegiatan akademik maupun non-akademik di lingkungan kampus UHB.</p>
                </div>
                <div class="flex-shrink-0">
                    <a href="/events" class="inline-flex items-center gap-2 text-uhbblue-600 font-semibold hover:text-uhbblue-700 transition">
                        Lihat Semua Event
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Categories -->
            <div class="flex overflow-x-auto pb-4 mb-8 gap-3 no-scrollbar">
                <button class="px-5 py-2.5 rounded-full bg-navy-900 text-white font-medium whitespace-nowrap">Semua</button>
                <button class="px-5 py-2.5 rounded-full bg-navy-50 text-navy-600 font-medium whitespace-nowrap hover:bg-navy-100 transition">Seminar Nasional</button>
                <button class="px-5 py-2.5 rounded-full bg-navy-50 text-navy-600 font-medium whitespace-nowrap hover:bg-navy-100 transition">Workshop IT</button>
                <button class="px-5 py-2.5 rounded-full bg-navy-50 text-navy-600 font-medium whitespace-nowrap hover:bg-navy-100 transition">BEM & Ormawa</button>
                <button class="px-5 py-2.5 rounded-full bg-navy-50 text-navy-600 font-medium whitespace-nowrap hover:bg-navy-100 transition">Pengabdian</button>
            </div>

            <!-- Event Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group bg-white rounded-3xl border border-navy-100 overflow-hidden hover:shadow-2xl hover:shadow-uhbblue-500/10 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden bg-navy-100">
                        <!-- Placeholder Image -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-indigo-600 opacity-90 group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-navy-900">Seminar Nasional</span>
                        </div>
                        <div class="absolute bottom-4 right-4 flex bg-white/90 backdrop-blur-sm rounded-xl p-2 shadow-sm">
                            <div class="text-center px-3">
                                <div class="text-xs font-bold text-uhbblue-600 uppercase">Okt</div>
                                <div class="text-xl font-black text-navy-900">24</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-sm text-navy-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            08:00 - 15:00 WIB
                        </div>
                        <h3 class="text-xl font-bold text-navy-900 mb-2 group-hover:text-uhbblue-600 transition line-clamp-2">Tech Conference 2026: Masa Depan AI & Sistem Informasi</h3>
                        <p class="text-navy-600 mb-6 line-clamp-2 text-sm">Seminar nasional membahas perkembangan terbaru Artificial Intelligence dan dampaknya pada industri IT.</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-navy-50">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-navy-200 flex items-center justify-center text-xs font-bold text-navy-600">IS</div>
                                <span class="text-sm font-medium text-navy-700">Prodi Sistem Informasi</span>
                            </div>
                            <span class="text-sm font-bold text-uhbamber-500 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-uhbamber-500"></span> Pendaftaran Buka
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group bg-white rounded-3xl border border-navy-100 overflow-hidden hover:shadow-2xl hover:shadow-uhbamber-500/10 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden bg-navy-100">
                        <div class="absolute inset-0 bg-gradient-to-br from-uhbamber-400 to-orange-500 opacity-90 group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-navy-900">Workshop IT</span>
                        </div>
                        <div class="absolute bottom-4 right-4 flex bg-white/90 backdrop-blur-sm rounded-xl p-2 shadow-sm">
                            <div class="text-center px-3">
                                <div class="text-xs font-bold text-uhbamber-600 uppercase">Nov</div>
                                <div class="text-xl font-black text-navy-900">02</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-sm text-navy-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            13:00 - 16:00 WIB
                        </div>
                        <h3 class="text-xl font-bold text-navy-900 mb-2 group-hover:text-uhbblue-600 transition line-clamp-2">Bootcamp Laravel & React: Build Modern Web Apps</h3>
                        <p class="text-navy-600 mb-6 line-clamp-2 text-sm">Pelatihan intensif membangun aplikasi web modern menggunakan stack TALL dan React JS.</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-navy-50">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-navy-200 flex items-center justify-center text-xs font-bold text-navy-600">HC</div>
                                <span class="text-sm font-medium text-navy-700">HIMA Computer</span>
                            </div>
                            <span class="text-sm font-bold text-orange-500 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-orange-500"></span> Kuota Terbatas
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="group bg-white rounded-3xl border border-navy-100 overflow-hidden hover:shadow-2xl hover:shadow-purple-500/10 transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden bg-navy-100">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-600 opacity-90 group-hover:scale-105 transition-transform duration-500"></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-navy-900">BEM & Ormawa</span>
                        </div>
                        <div class="absolute bottom-4 right-4 flex bg-white/90 backdrop-blur-sm rounded-xl p-2 shadow-sm">
                            <div class="text-center px-3">
                                <div class="text-xs font-bold text-purple-600 uppercase">Nov</div>
                                <div class="text-xl font-black text-navy-900">15</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-sm text-navy-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            07:00 - Selesai
                        </div>
                        <h3 class="text-xl font-bold text-navy-900 mb-2 group-hover:text-uhbblue-600 transition line-clamp-2">Latihan Dasar Kepemimpinan Mahasiswa (LDKM) 2026</h3>
                        <p class="text-navy-600 mb-6 line-clamp-2 text-sm">Membentuk karakter pemimpin masa depan yang berintegritas dan tangguh di era digital.</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-navy-50">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-navy-200 flex items-center justify-center text-xs font-bold text-navy-600">BM</div>
                                <span class="text-sm font-medium text-navy-700">BEM UHB</span>
                            </div>
                            <span class="text-sm font-bold text-navy-400 flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-navy-300"></span> Akan Datang
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calendar Section Preview -->
    <section id="kalender" class="py-24 bg-navy-900 text-white relative overflow-hidden">
        <!-- Abstract bg shapes -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-uhbblue-500/20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-uhbamber-500/20 blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                <div class="lg:w-1/2">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-sm font-semibold text-uhbblue-300 mb-6">
                        Kalender Terintegrasi
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold mb-6 leading-tight">Jangan Lewatkan Momen Penting Kampus</h2>
                    <p class="text-navy-200 text-lg mb-8 leading-relaxed">
                        Pantau seluruh jadwal kegiatan, seminar, dan acara ormawa dalam satu tampilan kalender yang interaktif dan mudah digunakan.
                    </p>
                    
                    <ul class="space-y-4 mb-10">
                        <li class="flex items-center gap-3 text-navy-100">
                            <div class="w-6 h-6 rounded-full bg-uhbamber-500/20 flex items-center justify-center text-uhbamber-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Sinkronisasi jadwal otomatis
                        </li>
                        <li class="flex items-center gap-3 text-navy-100">
                            <div class="w-6 h-6 rounded-full bg-uhbblue-500/20 flex items-center justify-center text-uhbblue-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Notifikasi event mendatang
                        </li>
                        <li class="flex items-center gap-3 text-navy-100">
                            <div class="w-6 h-6 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            Filter berdasarkan kategori & prodi
                        </li>
                    </ul>
                    
                    <a href="/calendar" class="inline-flex px-8 py-4 rounded-2xl bg-gradient-to-r from-uhbblue-600 to-uhbblue-500 text-white font-semibold text-lg hover:from-uhbblue-500 hover:to-uhbblue-400 transition-all shadow-lg hover:shadow-uhbblue-500/50 transform hover:-translate-y-1 items-center gap-2">
                        Buka Kalender Penuh
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                
                <div class="lg:w-1/2 w-full">
                    <!-- Fake Calendar UI for preview -->
                    <div class="bg-navy-800 rounded-3xl p-6 border border-navy-700 shadow-2xl relative">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold">Oktober 2026</h3>
                            <div class="flex gap-2">
                                <button class="w-8 h-8 rounded-lg bg-navy-700 flex items-center justify-center hover:bg-navy-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
                                <button class="w-8 h-8 rounded-lg bg-navy-700 flex items-center justify-center hover:bg-navy-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 mb-2 text-center text-xs font-bold text-navy-400">
                            <div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div><div>Min</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 text-center text-sm">
                            <!-- In a real app this would be dynamically generated -->
                            <div class="aspect-square flex items-center justify-center rounded-lg text-navy-500">28</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg text-navy-500">29</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg text-navy-500">30</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">1</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition relative">
                                2
                                <div class="absolute bottom-1 w-1 h-1 rounded-full bg-uhbblue-500"></div>
                            </div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">3</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">4</div>
                            
                            <!-- Week 2 -->
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">5</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition relative">
                                6
                                <div class="absolute bottom-1 w-1 h-1 rounded-full bg-uhbamber-500"></div>
                            </div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">7</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">8</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">9</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition relative">
                                10
                                <div class="absolute bottom-1 w-1 h-1 rounded-full bg-purple-500"></div>
                            </div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">11</div>
                            
                            <!-- Week 3 with active day -->
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">12</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">13</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg bg-uhbblue-600 text-white font-bold cursor-pointer shadow-lg shadow-uhbblue-500/30">14</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">15</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition relative">
                                16
                                <div class="absolute bottom-1 w-1 h-1 rounded-full bg-orange-500"></div>
                            </div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">17</div>
                            <div class="aspect-square flex items-center justify-center rounded-lg hover:bg-navy-700 cursor-pointer transition">18</div>
                        </div>
                        
                        <!-- Floating event card over calendar -->
                        <div class="absolute -right-6 -bottom-6 bg-white rounded-2xl p-4 shadow-2xl w-64 border border-navy-100 hidden md:block transform hover:scale-105 transition">
                            <div class="text-xs font-bold text-uhbblue-600 mb-1">HARI INI</div>
                            <h4 class="font-bold text-navy-900 text-sm mb-1 leading-tight">Webinar Nasional Keamanan Siber</h4>
                            <div class="flex items-center gap-1 text-xs text-navy-500">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                09:00 - 12:00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Certificate Verification Section -->
    <section id="sertifikat" class="py-24 bg-navy-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl p-8 md:p-16 shadow-xl border border-navy-100 relative overflow-hidden">
                <!-- Abstract BG -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-uhbblue-50 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-uhbamber-50 rounded-full blur-3xl -ml-20 -mb-20"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2 text-center lg:text-left">
                        <div class="w-16 h-16 bg-navy-900 rounded-2xl flex items-center justify-center text-white mb-6 mx-auto lg:mx-0 shadow-lg">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-navy-900 mb-4">Verifikasi Sertifikat Digital</h2>
                        <p class="text-lg text-navy-600 mb-8">
                            Pastikan keaslian sertifikat kegiatan Anda. Cukup masukkan ID Sertifikat atau scan QR Code yang tertera pada sertifikat fisik/digital.
                        </p>
                        
                        <div class="flex flex-col gap-4">
                            <form action="#" class="relative">
                                <input type="text" placeholder="Masukkan ID Sertifikat atau NIM..." class="w-full pl-5 pr-32 py-4 rounded-2xl border-2 border-navy-100 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition-all shadow-sm">
                                <button type="submit" class="absolute right-2 top-2 bottom-2 px-6 bg-navy-900 text-white font-medium rounded-xl hover:bg-navy-800 transition">
                                    Cek Data
                                </button>
                            </form>
                            <p class="text-sm text-navy-500 text-center lg:text-left">Semua sertifikat diamankan menggunakan enkripsi standar industri.</p>
                        </div>
                    </div>
                    
                    <div class="lg:w-1/2 w-full flex justify-center">
                        <div class="relative w-full max-w-sm">
                            <div class="absolute inset-0 bg-gradient-to-tr from-uhbblue-500 to-uhbamber-400 rounded-3xl transform rotate-3 scale-105 opacity-20 blur-lg"></div>
                            <div class="bg-white border-2 border-navy-100 p-6 rounded-3xl shadow-xl relative z-10 transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                                <div class="border-b border-navy-100 pb-4 mb-4 flex justify-between items-center">
                                    <div class="font-bold text-navy-900 text-lg">SERTIFIKAT</div>
                                    <div class="text-xs font-bold text-uhbamber-600 bg-uhbamber-50 px-2 py-1 rounded">TERVERIFIKASI</div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <div class="text-xs text-navy-500 font-medium mb-1">Diberikan kepada</div>
                                        <div class="font-bold text-navy-900">Ahmad Budi Santoso</div>
                                        <div class="text-sm text-navy-600">NIM: 2026100192</div>
                                    </div>
                                    <div>
                                        <div class="text-xs text-navy-500 font-medium mb-1">Atas partisipasinya sebagai</div>
                                        <div class="font-bold text-navy-900">Peserta</div>
                                        <div class="text-sm text-navy-600 leading-tight">Webinar Nasional Keamanan Siber Era Digital</div>
                                    </div>
                                </div>
                                <div class="mt-6 flex justify-between items-end">
                                    <div class="text-xs text-navy-400">ID: UHB-2026-981273</div>
                                    <!-- QR code mock -->
                                    <div class="w-16 h-16 bg-navy-100 rounded-lg p-1">
                                        <div class="w-full h-full border-2 border-navy-900 border-dashed rounded opacity-50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-navy-900 text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 lg:col-span-2">
                    <a href="/" class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-uhbblue-500 to-uhbamber-500 flex items-center justify-center text-white font-bold text-xl">
                            UHB
                        </div>
                        <span class="font-bold text-xl text-white">Event<span class="text-uhbblue-400">Rekap</span></span>
                    </a>
                    <p class="text-navy-300 mb-6 max-w-md">
                        Sistem Informasi Event & Rekap Kegiatan Universitas Harapan Bangsa. Platform terintegrasi untuk menemukan seminar, mengelola kegiatan, dan sertifikat digital.
                    </p>
                    <div class="flex gap-4">
                        <!-- Social links -->
                        <a href="#" class="w-10 h-10 rounded-full bg-navy-800 flex items-center justify-center hover:bg-uhbblue-600 transition text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-navy-800 flex items-center justify-center hover:bg-uhbblue-600 transition text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-6">Menu Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="text-navy-300 hover:text-white transition">Beranda</a></li>
                        <li><a href="#event" class="text-navy-300 hover:text-white transition">Semua Event</a></li>
                        <li><a href="#kalender" class="text-navy-300 hover:text-white transition">Kalender Kegiatan</a></li>
                        <li><a href="#sertifikat" class="text-navy-300 hover:text-white transition">Verifikasi Sertifikat</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-6">Bantuan</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-navy-300 hover:text-white transition">Panduan Mahasiswa</a></li>
                        <li><a href="#" class="text-navy-300 hover:text-white transition">Panduan Panitia</a></li>
                        <li><a href="#" class="text-navy-300 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-navy-300 hover:text-white transition">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-navy-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-navy-400 text-sm">
                    &copy; {{ date('Y') }} Universitas Harapan Bangsa. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="#" class="text-navy-400 hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="text-navy-400 hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom Blob Animation -->
    <style>
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        /* Hide scrollbar for category slider */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</body>
</html>
