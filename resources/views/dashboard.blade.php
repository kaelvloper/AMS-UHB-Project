<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard AMS') }}
        </h2>
    </x-slot>

    <!-- Wrapper Background Halaman: Slate-50 -->
    <div x-data="{ showHonorModal: false }" class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
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
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
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
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
                            Buka Modul 
                            <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- 3. Rekap Honor UTS & UAS -->
                <div onclick="window.location='{{ route('rekap-honor') }}'" class="cursor-pointer bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-6 shadow-md hover:shadow-lg hover:shadow-yellow-400/40 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group relative overflow-hidden border border-blue-500/30">
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
                        <a href="{{ route('rekap-honor') }}" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
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
                        <a href="#" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-5 py-2.5 rounded-lg transition-colors shadow-md">
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

    <!-- Modal Rekap Honor UTS & UAS -->
    <div x-show="showHonorModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
         
         <!-- Backdrop Blur & Overlay -->
         <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" @click="showHonorModal = false"></div>

         <!-- Modal Wrapper -->
         <div class="flex min-h-full items-center justify-center p-4 sm:p-6 lg:p-8 relative z-10">
             
             <!-- Modal Box -->
             <div x-show="showHonorModal"
                  x-transition:enter="transition ease-out duration-300 transform"
                  x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                  x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                  x-transition:leave="transition ease-in duration-200 transform"
                  x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                  x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                  class="relative bg-white rounded-2xl shadow-2xl border border-slate-200 max-w-6xl w-full overflow-hidden flex flex-col max-h-[90vh]">
                  
                  <!-- Modal Header: Navy-Gold Theme -->
                  <div class="bg-gradient-to-r from-blue-900 to-indigo-950 p-6 text-white relative">
                      <!-- Close button -->
                      <button @click="showHonorModal = false" class="absolute top-6 right-6 text-blue-200 hover:text-white hover:bg-white/10 p-2 rounded-full transition-colors focus:outline-none">
                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                      </button>
                      
                      <div class="flex items-center space-x-4">
                          <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center text-blue-900 font-bold shadow-md shadow-yellow-400/20">
                              <!-- Icon Clipboard List -->
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                          </div>
                          <div>
                              <h3 class="text-2xl font-extrabold tracking-tight">Rekap Honor UTS & UAS</h3>
                              <p class="text-blue-200 text-sm mt-0.5">Universitas Harapan Bangsa (UHB) — Semester Genap 2025/2026</p>
                          </div>
                      </div>
                  </div>

                  <!-- Modal Body -->
                  <div class="p-6 overflow-y-auto flex-1 bg-slate-50" x-data="{ currentTab: 'uts' }">
                      
                      <!-- Summary Cards (Quick Stats) -->
                      <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-6">
                          <!-- Total Card -->
                          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex items-center justify-between group hover:border-blue-400 transition-all duration-300">
                              <div>
                                  <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Total Honorarium</span>
                                  <span class="text-2xl font-black text-slate-900 mt-1 block" x-text="currentTab === 'uts' ? 'Rp 34.650.000' : 'Rp 38.900.000'"></span>
                              </div>
                              <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                              </div>
                          </div>
                          
                          <!-- Paid Card -->
                          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex items-center justify-between group hover:border-emerald-400 transition-all duration-300">
                              <div>
                                  <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Sudah Dibayarkan</span>
                                  <span class="text-2xl font-black text-emerald-600 mt-1 block" x-text="currentTab === 'uts' ? 'Rp 22.400.000' : 'Rp 28.500.000'"></span>
                              </div>
                              <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                              </div>
                          </div>

                          <!-- Pending Card -->
                          <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex items-center justify-between group hover:border-amber-400 transition-all duration-300">
                              <div>
                                  <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block">Menunggu Proses</span>
                                  <span class="text-2xl font-black text-amber-600 mt-1 block" x-text="currentTab === 'uts' ? 'Rp 12.250.000' : 'Rp 10.400.000'"></span>
                              </div>
                              <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                              </div>
                          </div>
                      </div>

                      <!-- Tabs and Filter Toolbar -->
                      <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-slate-200 pb-4 gap-4 mb-6">
                          <!-- Custom HSL-Navy-Gold Tabs -->
                          <div class="flex space-x-2 bg-slate-200/60 p-1 rounded-xl w-fit">
                              <button @click="currentTab = 'uts'" 
                                      :class="currentTab === 'uts' ? 'bg-gradient-to-r from-blue-900 to-indigo-950 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/40'"
                                      class="px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-200 flex items-center gap-2">
                                  <span class="w-2.5 h-2.5 rounded-full" :class="currentTab === 'uts' ? 'bg-yellow-400' : 'bg-slate-400'"></span>
                                  Ujian Tengah Semester (UTS)
                              </button>
                              <button @click="currentTab = 'uas'" 
                                      :class="currentTab === 'uas' ? 'bg-gradient-to-r from-blue-900 to-indigo-950 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/40'"
                                      class="px-5 py-2.5 rounded-lg text-sm font-bold transition-all duration-200 flex items-center gap-2">
                                  <span class="w-2.5 h-2.5 rounded-full" :class="currentTab === 'uas' ? 'bg-yellow-400' : 'bg-slate-400'"></span>
                                  Ujian Akhir Semester (UAS)
                              </button>
                          </div>

                          <!-- Actions buttons in Modal -->
                          <div class="flex items-center gap-3">
                              <!-- Export Excel -->
                              <button type="button" class="inline-flex items-center px-4 py-2 border border-slate-300 bg-white rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors shadow-sm">
                                  <svg class="w-4 h-4 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                  Export Excel
                              </button>
                              <!-- Export PDF -->
                              <button type="button" class="inline-flex items-center px-4 py-2 border border-slate-300 bg-white rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition-colors shadow-sm">
                                  <svg class="w-4 h-4 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                  Cetak PDF
                              </button>
                          </div>
                      </div>

                      <!-- Search & Interactive Info -->
                      <div class="mb-5 flex items-center justify-between bg-blue-50 border border-blue-100 rounded-xl p-4">
                          <div class="flex items-center gap-3">
                              <div class="p-2 bg-blue-100 text-blue-900 rounded-lg">
                                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                              </div>
                              <p class="text-sm font-semibold text-blue-900">
                                  Menampilkan daftar rekapitulasi honorarium dosen pengampu untuk UTS dan UAS semester ini.
                              </p>
                          </div>
                      </div>

                      <!-- Data Table -->
                      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
                          
                          <!-- UTS Table Content -->
                          <div x-show="currentTab === 'uts'" x-transition:enter="transition ease-out duration-200" class="overflow-x-auto">
                              <table class="w-full text-sm text-left text-slate-600">
                                  <thead class="text-xs text-slate-500 bg-slate-100 border-b border-slate-200">
                                      <tr>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider">Nama Dosen</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider">Mata Kuliah</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Mhs</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Tarif/Mhs</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Bruto</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Pajak (5%)</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Netto</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Status</th>
                                      </tr>
                                  </thead>
                                  <tbody class="divide-y divide-slate-100">
                                      <!-- Row 1 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">NK</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Nama Kamulian, M.SD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010132980001</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Pemrograman Web Lanjut</div>
                                              <div class="text-xs text-slate-500">Teknik Informatika</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">42</td>
                                          <td class="px-6 py-4 text-right">Rp 25.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.050.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 52.500</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 997.500</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                  Dibayarkan
                                              </span>
                                          </td>
                                      </tr>
                                      
                                      <!-- Row 2 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">JK</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Juan Khahamton, PLD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010008120007</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Desain Antarmuka Pengguna (UI/UX)</div>
                                              <div class="text-xs text-slate-500">Sistem Informasi</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">38</td>
                                          <td class="px-6 py-4 text-right">Rp 25.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 950.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 47.500</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 902.500</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                  Dibayarkan
                                              </span>
                                          </td>
                                      </tr>

                                      <!-- Row 3 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">NS</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Nama Sulan, SMD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010008190014</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Bahasa Inggris untuk IT</div>
                                              <div class="text-xs text-slate-500">Pendidikan Bahasa Inggris</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">55</td>
                                          <td class="px-6 py-4 text-right">Rp 25.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.375.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 68.750</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 1.306.250</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                                  Proses
                                              </span>
                                          </td>
                                      </tr>

                                      <!-- Row 4 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">AB</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Anaeli Bunyan, PMD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010132650009</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Jaringan Komputer Dasar</div>
                                              <div class="text-xs text-slate-500">Teknik Informatika</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">45</td>
                                          <td class="px-6 py-4 text-right">Rp 25.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.125.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 56.250</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 1.068.750</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                  Dibayarkan
                                              </span>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>

                          <!-- UAS Table Content -->
                          <div x-show="currentTab === 'uas'" x-transition:enter="transition ease-out duration-200" class="overflow-x-auto" style="display: none;">
                              <table class="w-full text-sm text-left text-slate-600">
                                  <thead class="text-xs text-slate-500 bg-slate-100 border-b border-slate-200">
                                      <tr>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider">Nama Dosen</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider">Mata Kuliah</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Mhs</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Tarif/Mhs</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Bruto</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Pajak (5%)</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-right">Netto</th>
                                          <th scope="col" class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Status</th>
                                      </tr>
                                  </thead>
                                  <tbody class="divide-y divide-slate-100">
                                      <!-- Row 1 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">NK</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Nama Kamulian, M.SD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010132980001</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Pemrograman Web Lanjut (UAS)</div>
                                              <div class="text-xs text-slate-500">Teknik Informatika</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">42</td>
                                          <td class="px-6 py-4 text-right">Rp 30.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.260.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 63.000</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 1.197.000</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                  Dibayarkan
                                              </span>
                                          </td>
                                      </tr>
                                      
                                      <!-- Row 2 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">JK</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Juan Khahamton, PLD</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010008120007</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Desain Antarmuka Pengguna (UI/UX) (UAS)</div>
                                              <div class="text-xs text-slate-500">Sistem Informasi</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">38</td>
                                          <td class="px-6 py-4 text-right">Rp 30.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.140.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 57.000</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 1.083.000</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                                  Dibayarkan
                                              </span>
                                          </td>
                                      </tr>

                                      <!-- Row 3 -->
                                      <tr class="hover:bg-slate-50 bg-white">
                                          <td class="px-6 py-4 whitespace-nowrap">
                                              <div class="flex items-center gap-3">
                                                  <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-indigo-900 border border-slate-200">NL</div>
                                                  <div>
                                                      <div class="font-bold text-slate-900">Nansel Lian, Ph.D</div>
                                                      <div class="text-xs text-slate-500">NIDN: 010008190018</div>
                                                  </div>
                                              </div>
                                          </td>
                                          <td class="px-6 py-4">
                                              <div class="font-medium text-slate-900">Metode Penelitian Sistem Informasi</div>
                                              <div class="text-xs text-slate-500">Sistem Informasi</div>
                                          </td>
                                          <td class="px-6 py-4 text-center font-semibold text-slate-800">48</td>
                                          <td class="px-6 py-4 text-right">Rp 30.000</td>
                                          <td class="px-6 py-4 text-right font-medium">Rp 1.440.000</td>
                                          <td class="px-6 py-4 text-right text-red-600">Rp 72.000</td>
                                          <td class="px-6 py-4 text-right font-bold text-slate-900">Rp 1.368.000</td>
                                          <td class="px-6 py-4 whitespace-nowrap text-center">
                                              <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">
                                                  Proses
                                              </span>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>

                      </div>

                  </div>

                  <!-- Modal Footer -->
                  <div class="bg-slate-100 p-4 px-6 border-t border-slate-200 flex items-center justify-between">
                      <div class="text-xs font-medium text-slate-500">
                          Data terakhir diperbarui pada: {{ now()->format('d M Y H:i') }}
                      </div>
                      <button @click="showHonorModal = false" class="px-5 py-2.5 bg-slate-800 text-white font-bold text-sm rounded-lg hover:bg-slate-700 transition-colors focus:outline-none">
                          Tutup
                      </button>
                  </div>

             </div>
         </div>
    </div>
</x-app-layout>
