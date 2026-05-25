<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard AMS') }}
        </h2>
    </x-slot>

    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Header Section -->
            <div class="mb-10 text-center md:text-left">
                <h3 class="text-3xl sm:text-4xl font-extrabold text-blue-900 inline-block relative pb-2">
                    Panel Utama Academic Management System (AMS) UHB
                    <!-- Aksen garis Kuning Emas di bawah judul -->
                    <div class="absolute bottom-0 left-0 md:left-0 w-24 md:w-1/3 h-2 bg-yellow-400 rounded-full mx-auto md:mx-0 left-1/2 md:translate-x-0 -translate-x-1/2"></div>
                </h3>
                <p class="text-gray-600 mt-4 text-lg">Pilih modul akademik yang ingin Anda kelola hari ini.</p>
            </div>

            <!-- Bento Grid Layout: 7 Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-fr">
                
                <!-- 1. Distribusi Perkuliahan (Bento Large: span 2) -->
                <div class="md:col-span-2 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <!-- UHB Logo Watermark -->
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Calendar -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">1. Distribusi Perkuliahan</h4>
                        <p class="text-blue-200 text-base mb-8 max-w-lg">Kelola jadwal distribusi mata kuliah dan beban perkuliahan secara terstruktur.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ route('distribusiku.index') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 2. Manajemen KJM -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Clock -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">2. Manajemen KJM</h4>
                        <p class="text-blue-200 text-sm mb-8">Monitoring Kontrak Jaminan Mutu dan perhitungan kelebihan jam mengajar.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ route('manajemen-kjm.index') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 3. Rekap Honor UTS & UAS -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Credit-Card -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">3. Rekap Honor Ujian</h4>
                        <p class="text-blue-200 text-sm mb-8">Kelola data honorarium pelaksanaan ujian tengah dan akhir semester.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 4. Data Dosen UHB -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Users -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">4. Data Dosen UHB</h4>
                        <p class="text-blue-200 text-sm mb-8">Database informasi lengkap dan profil pengajar Universitas Harapan Bangsa.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ url('/dosen') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 5. Rekap Pengajaran Dosen LB -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Briefcase -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">5. Rekap Dosen LB</h4>
                        <p class="text-blue-200 text-sm mb-8">Laporan aktivitas mengajar khusus untuk Dosen Luar Biasa.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="{{ route('rekap-lb.index') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 6. Rekap Nilai Panjang Mahasiswa (Bento Medium: span 2) -->
                <div class="md:col-span-2 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Academic-Cap -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                        </div>
                        <h4 class="text-2xl font-bold text-white mb-2">6. Rekap Nilai Mahasiswa</h4>
                        <p class="text-blue-200 text-base mb-8 max-w-lg">Rekapitulasi nilai akademik mahasiswa secara komprehensif untuk periode panjang.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 7. Rekap Kegiatan UHB -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
                    <div class="absolute top-4 right-4 opacity-10 group-hover:opacity-20 transition-opacity duration-300 pointer-events-none">
                        <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm0 2.18l7 3.12v4.7c0 4.67-3.13 8.89-7 10.02-3.87-1.13-7-5.35-7-10.02v-4.7l7-3.12z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-md border border-white/30 rounded-xl flex items-center justify-center text-white mb-5 group-hover:scale-110 transition-transform duration-300">
                            <!-- Icon Presentation-Chart -->
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-2">7. Rekap Kegiatan UHB</h4>
                        <p class="text-blue-200 text-sm mb-8">Dokumentasi dan pelaporan seluruh kegiatan akademik universitas.</p>
                    </div>
                    <div class="relative z-10">
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
