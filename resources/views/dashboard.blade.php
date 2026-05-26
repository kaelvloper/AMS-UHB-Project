<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-10 text-center md:text-left">
                <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                    Academic Management System (AMS) UHB
                    <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full mx-auto md:mx-0 left-1/2 md:translate-x-0 -translate-x-1/2"></div>
                </h3>
                <p class="text-gray-600 mt-3 text-lg">Selamat datang! Silakan pilih modul akademik yang ingin Anda kelola.</p>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <!-- Card 1: Data Dosen UHB -->
                <div class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-2xl p-8 shadow-md hover:shadow-lg hover:shadow-blue-500/20 transition-all duration-300 hover:-translate-y-1 group relative overflow-hidden text-white border border-blue-800">
                    <div class="relative z-10 flex flex-col justify-between h-full min-h-[220px]">
                        <div>
                            <div class="w-14 h-14 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                                <!-- Icon Users -->
                                <svg class="w-7 h-7 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-bold text-white mb-3">1. Data Dosen UHB</h4>
                            <p class="text-blue-100 text-sm mb-6 leading-relaxed">Kelola informasi lengkap, program studi, dan status (Tetap/LB) para pengajar Universitas Harapan Bangsa.</p>
                        </div>
                        <div>
                            <a href="{{ route('lecturers') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-6 py-3 rounded-lg transition-colors shadow-md font-sans">
                                Buka Modul Dosen
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Rekap Pengajaran & Honor Ujian -->
                <div class="bg-gradient-to-br from-blue-700 to-blue-900 rounded-2xl p-8 shadow-md hover:shadow-lg hover:shadow-blue-500/20 transition-all duration-300 hover:-translate-y-1 group relative overflow-hidden text-white border border-blue-800">
                    <div class="relative z-10 flex flex-col justify-between h-full min-h-[220px]">
                        <div>
                            <div class="w-14 h-14 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                                <!-- Icon Document -->
                                <svg class="w-7 h-7 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h4 class="text-2xl font-bold text-white mb-3">2. Rekap Pengajaran & Honor Ujian</h4>
                            <p class="text-blue-100 text-sm mb-6 leading-relaxed">Kelola rekap pengajaran, metode pelaksanaan ujian, jumlah peserta, dan hitung otomatis honorarium bagi dosen luar biasa (LB).</p>
                        </div>
                        <div>
                            <a href="{{ route('teaching-records') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-6 py-3 rounded-lg transition-colors shadow-md font-sans">
                                Buka Modul Rekap
                                <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
