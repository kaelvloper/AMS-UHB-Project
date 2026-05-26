<x-app-layout>
    <x-slot name="header">
        Kalender Kegiatan Kampus
    </x-slot>

    <div x-data="{
        currentMonth: 'oktober', // 'oktober' or 'november'
        selectedDay: 24,
        selectedEvent: null,

        // Consistent Events Data
        events: {
            'oktober-24': {
                title: 'Tech Conference 2026: Masa Depan AI & Sistem Informasi',
                category: 'Seminar Nasional',
                categoryClass: 'bg-uhbblue-50 text-uhbblue-600',
                date: 'Sabtu, 24 Oktober 2026',
                time: '08:00 - 15:00 WIB',
                location: 'Auditorium Kampus Utama UHB',
                speaker: 'Dr. Ir. Budi Santoso (AI Specialist)',
                registrants: 520,
                quota: 600,
                status: 'Aktif',
                statusClass: 'bg-green-100 text-green-700',
                gradient: 'from-blue-500 to-indigo-600',
                description: 'Seminar nasional yang membahas perkembangan kecerdasan buatan (AI) di era modern dan bagaimana implementasinya dalam sistem informasi manajemen dan pendidikan tinggi.'
            },
            'november-02': {
                title: 'Bootcamp Laravel & React: Build Modern Web Apps',
                category: 'Workshop IT',
                categoryClass: 'bg-green-50 text-green-600',
                date: 'Senin, 02 November 2026',
                time: '13:00 - 16:00 WIB',
                location: 'Laboratorium Komputer 3 Gedung B',
                speaker: 'Kaelvloper (Fullstack Engineer)',
                registrants: 180,
                quota: 200,
                status: 'Aktif',
                statusClass: 'bg-green-100 text-green-700',
                gradient: 'from-emerald-500 to-teal-600',
                description: 'Hands-on workshop intensif memadukan kehebatan backend Laravel dengan keindahan reactive frontend React.js untuk membangun aplikasi web modern kelas industri.'
            },
            'november-15': {
                title: 'Latihan Dasar Kepemimpinan Mahasiswa (LDKM) 2026',
                category: 'BEM & Ormawa',
                categoryClass: 'bg-purple-50 text-purple-600',
                date: 'Minggu, 15 November 2026',
                time: '07:00 - Selesai',
                location: 'Gedung Serbaguna Kampus Pusat UHB',
                speaker: 'BEM UHB Team & Pembicara Kepemimpinan',
                registrants: 0,
                quota: 150,
                status: 'Draft',
                statusClass: 'bg-orange-100 text-orange-700',
                gradient: 'from-purple-500 to-pink-600',
                description: 'Pelatihan dasar kepemimpinan wajib bagi calon pengurus Ormawa dan perwakilan mahasiswa baru UHB guna menumbuhkan karakter pemimpin yang berintegritas.'
            }
        },

        init() {
            // Set initial selected event
            this.selectedEvent = this.events['oktober-24'];
        },

        selectDay(day, month) {
            this.selectedDay = day;
            const eventKey = `${month}-${day.toString().padStart(2, '0')}`;
            if (this.events[eventKey]) {
                this.selectedEvent = this.events[eventKey];
            } else {
                this.selectedEvent = null;
            }
        },

        hasEvent(day, month) {
            const eventKey = `${month}-${day.toString().padStart(2, '0')}`;
            return !!this.events[eventKey];
        },

        getEventCategory(day, month) {
            const eventKey = `${month}-${day.toString().padStart(2, '0')}`;
            return this.events[eventKey] ? this.events[eventKey].category : '';
        }
    }" class="pb-12" x-init="init()">

        <!-- Banner Header -->
        <div class="bg-gradient-to-r from-navy-900 via-navy-800 to-navy-900 rounded-3xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-uhbblue-500 rounded-full blur-3xl mix-blend-screen opacity-10 -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500 rounded-full blur-3xl mix-blend-screen opacity-10 -ml-20 -mb-20"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-extrabold mb-2">Kalender Kegiatan Kampus</h2>
                    <p class="text-navy-200 text-lg">Pantau jadwal seminar, workshop, dan seluruh aktivitas kemahasiswaan Universitas Harapan Bangsa secara terpadu.</p>
                </div>
            </div>
        </div>

        <!-- Main Content Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Calendar Grid (Left 2 cols) -->
            <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-navy-100 shadow-sm flex flex-col justify-between">
                
                <!-- Month Toggle Selector -->
                <div class="flex justify-between items-center mb-6 border-b border-navy-50 pb-4">
                    <div class="flex items-center gap-4">
                        <button @click="currentMonth = 'oktober'; selectDay(24, 'oktober');" :class="currentMonth === 'oktober' ? 'bg-navy-900 text-white shadow-md font-bold' : 'bg-navy-50 text-navy-600 hover:bg-navy-100 font-semibold'" class="px-5 py-2.5 rounded-xl text-sm transition-all flex items-center gap-2">
                            Oktober 2026
                            <span class="w-1.5 h-1.5 rounded-full bg-uhbblue-400" x-show="currentMonth !== 'oktober'"></span>
                        </button>
                        <button @click="currentMonth = 'november'; selectDay(2, 'november');" :class="currentMonth === 'november' ? 'bg-navy-900 text-white shadow-md font-bold' : 'bg-navy-50 text-navy-600 hover:bg-navy-100 font-semibold'" class="px-5 py-2.5 rounded-xl text-sm transition-all flex items-center gap-2">
                            November 2026
                            <span class="w-1.5 h-1.5 rounded-full bg-green-400" x-show="currentMonth !== 'november'"></span>
                        </button>
                    </div>

                    <!-- Category Indicators Legend -->
                    <div class="hidden sm:flex items-center gap-4 text-xs font-semibold">
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span> Seminar</span>
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Workshop</span>
                        <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span> Ormawa</span>
                    </div>
                </div>

                <!-- Calendar Content -->
                <div>
                    <!-- Days of Week Headers -->
                    <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold text-navy-400 uppercase mb-4 tracking-wider">
                        <div>Sen</div>
                        <div>Sel</div>
                        <div>Rab</div>
                        <div>Kam</div>
                        <div>Jum</div>
                        <div>Sab</div>
                        <div>Min</div>
                    </div>

                    <!-- Grid of Days (Oktober 2026: Starts on Thursday (Day 4)) -->
                    <div x-show="currentMonth === 'oktober'" class="grid grid-cols-7 gap-3 text-sm">
                        <!-- Empty cells before Thu Oct 1 -->
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>

                        <!-- Days 1 - 31 -->
                        <template x-for="day in 31">
                            <button @click="selectDay(day, 'oktober')" 
                                    :class="[
                                        selectedDay === day ? 'border-navy-900 bg-navy-950 text-white font-extrabold shadow-lg scale-105 transform' : 'border-navy-100 bg-white text-navy-800 hover:bg-navy-50 hover:border-navy-200 font-semibold',
                                        hasEvent(day, 'oktober') && selectedDay !== day ? 'ring-2 ring-uhbblue-500 ring-offset-2' : ''
                                    ]" 
                                    class="h-16 rounded-2xl border transition-all duration-200 relative flex flex-col justify-between p-2 cursor-pointer">
                                
                                <span x-text="day" class="text-xs"></span>
                                
                                <!-- Dot Indicators for events -->
                                <template x-if="hasEvent(day, 'oktober')">
                                    <span :class="[
                                        getEventCategory(day, 'oktober') === 'Seminar Nasional' ? 'bg-blue-500' : 'bg-emerald-500',
                                        selectedDay === day ? 'ring-2 ring-white' : ''
                                    ]" class="w-2.5 h-2.5 rounded-full absolute bottom-2.5 right-2.5 animate-pulse"></span>
                                </template>
                            </button>
                        </template>

                        <!-- Empty cells after Oct 31 -->
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                    </div>

                    <!-- Grid of Days (November 2026: Starts on Sunday (Day 7)) -->
                    <div x-show="currentMonth === 'november'" class="grid grid-cols-7 gap-3 text-sm" style="display: none;">
                        <!-- Empty cells before Sun Nov 1 -->
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>

                        <!-- Days 1 - 30 -->
                        <template x-for="day in 30">
                            <button @click="selectDay(day, 'november')" 
                                    :class="[
                                        selectedDay === day ? 'border-navy-900 bg-navy-950 text-white font-extrabold shadow-lg scale-105 transform' : 'border-navy-100 bg-white text-navy-800 hover:bg-navy-50 hover:border-navy-200 font-semibold',
                                        hasEvent(day, 'november') && selectedDay !== day ? 'ring-2 ring-emerald-500 ring-offset-2' : ''
                                    ]" 
                                    class="h-16 rounded-2xl border transition-all duration-200 relative flex flex-col justify-between p-2 cursor-pointer">
                                
                                <span x-text="day" class="text-xs"></span>
                                
                                <!-- Dot Indicators for events -->
                                <template x-if="hasEvent(day, 'november')">
                                    <span :class="[
                                        getEventCategory(day, 'november') === 'Workshop IT' ? 'bg-emerald-500' : 'bg-purple-500',
                                        selectedDay === day ? 'ring-2 ring-white' : ''
                                    ]" class="w-2.5 h-2.5 rounded-full absolute bottom-2.5 right-2.5 animate-pulse"></span>
                                </template>
                            </button>
                        </template>

                        <!-- Empty cells after Nov 30 -->
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                        <div class="h-16 bg-navy-50/20 rounded-2xl border border-dashed border-navy-100/50 opacity-20"></div>
                    </div>
                </div>

                <!-- Footer Legend -->
                <div class="flex sm:hidden justify-center items-center gap-4 text-[10px] font-bold border-t border-navy-50 pt-4 mt-6">
                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-blue-500"></span> Seminar</span>
                    <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Workshop</span>
                    <span class="flex items-center gap-1"><span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span> Ormawa</span>
                </div>

            </div>

            <!-- Event Details Panel (Right 1 col) -->
            <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm flex flex-col justify-between">
                
                <!-- If Event is Selected -->
                <template x-if="selectedEvent">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <!-- Header Banner inside Sidebar Panel -->
                            <div :class="'bg-gradient-to-br ' + selectedEvent.gradient" class="rounded-2xl p-5 text-white mb-6 relative overflow-hidden shadow-md">
                                <div class="absolute inset-0 bg-white/10 opacity-30 transform rotate-12 -mt-10"></div>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-white/20 text-white uppercase tracking-wider block w-max mb-3" x-text="selectedEvent.category"></span>
                                <h3 class="text-lg font-extrabold leading-snug" x-text="selectedEvent.title"></h3>
                            </div>

                            <!-- Details list -->
                            <div class="space-y-4 text-sm">
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-1">Tanggal Kegiatan</span>
                                    <p class="font-bold text-navy-900 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-navy-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span x-text="selectedEvent.date"></span>
                                    </p>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-1">Waktu</span>
                                    <p class="font-semibold text-navy-700 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span x-text="selectedEvent.time"></span>
                                    </p>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-1">Lokasi</span>
                                    <p class="font-semibold text-navy-700 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <span x-text="selectedEvent.location"></span>
                                    </p>
                                </div>
                                <div>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-1">Pembicara / Narasumber</span>
                                    <p class="font-semibold text-navy-700 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        <span x-text="selectedEvent.speaker"></span>
                                    </p>
                                </div>
                                <div class="pt-2 border-t border-navy-50">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-1.5">Deskripsi Kegiatan</span>
                                    <p class="text-navy-500 text-xs leading-relaxed" x-text="selectedEvent.description"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Footer quota and view details button -->
                        <div class="pt-6 border-t border-navy-100 mt-6 flex flex-col gap-3">
                            <div class="flex justify-between items-center text-xs">
                                <span class="font-bold text-navy-400 uppercase">Kuota Terisi</span>
                                <span class="font-extrabold text-navy-950" x-text="selectedEvent.registrants + ' / ' + selectedEvent.quota"></span>
                            </div>
                            <div class="w-full bg-navy-50 rounded-full h-1.5">
                                <div :class="selectedEvent.gradient" class="bg-gradient-to-r h-1.5 rounded-full transition-all duration-300" :style="'width: ' + ((selectedEvent.registrants/selectedEvent.quota)*100) + '%'"></div>
                            </div>

                            <a href="#" class="w-full mt-2 py-3 bg-navy-950 text-white font-bold rounded-xl text-xs hover:bg-navy-800 hover:shadow-lg transition flex items-center justify-center gap-2">
                                Lihat Detail Kegiatan
                            </a>
                        </div>
                    </div>
                </template>

                <!-- If NO Event is Selected -->
                <template x-if="!selectedEvent">
                    <div class="flex flex-col items-center justify-center text-center py-12 h-full">
                        <div class="w-16 h-16 bg-navy-50 rounded-2xl flex items-center justify-center text-navy-400 mb-4 border border-navy-100/50">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-navy-950 mb-1">Tidak Ada Kegiatan</h4>
                        <p class="text-navy-400 text-xs max-w-[200px] leading-relaxed">Pilih tanggal kalender yang memiliki penanda titik berwarna untuk melihat rincian kegiatan.</p>
                    </div>
                </template>

            </div>

        </div>

    </div>
</x-app-layout>
