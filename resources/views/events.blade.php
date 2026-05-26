<x-app-layout>
    <x-slot name="header">
        Manajemen Event & Seminar
    </x-slot>

    <div x-data="{ 
        statusFilter: 'semua',
        categoryFilter: 'semua',
        searchQuery: '',
        modalOpen: false,
        
        // Add Event Form State
        newEvent: {
            title: '',
            category: 'Seminar Nasional',
            date: '',
            time: '',
            location: '',
            quota: '',
            speaker: '',
            status: 'Draft',
            description: ''
        },

        // Mock events list
        events: [
            {
                id: 1,
                title: 'Tech Conference 2026: Masa Depan AI & Sistem Informasi',
                category: 'Seminar Nasional',
                categoryClass: 'bg-uhbblue-50 text-uhbblue-600',
                date: '24 Okt 2026',
                month: 'Okt',
                day: '24',
                time: '08:00 - 15:00 WIB',
                location: 'Auditorium Kampus Utama',
                speaker: 'Dr. Ir. Budi Santoso',
                quota: 600,
                registrants: 520,
                status: 'Aktif',
                statusClass: 'bg-green-100 text-green-700',
                certificate: 'Terbit (520 sertifikat)',
                certificateClass: 'bg-uhbamber-50 text-uhbamber-600',
                gradient: 'from-blue-500 to-indigo-600'
            },
            {
                id: 2,
                title: 'Bootcamp Laravel & React: Build Modern Web Apps',
                category: 'Workshop IT',
                categoryClass: 'bg-uhbamber-50 text-uhbamber-600',
                date: '02 Nov 2026',
                month: 'Nov',
                day: '02',
                time: '13:00 - 16:00 WIB',
                location: 'Lab Komputer 3',
                speaker: 'Kaelvloper (Fullstack Engineer)',
                quota: 200,
                registrants: 180,
                status: 'Aktif',
                statusClass: 'bg-green-100 text-green-700',
                certificate: 'Siap Diterbitkan',
                certificateClass: 'bg-blue-50 text-blue-600',
                gradient: 'from-uhbamber-400 to-orange-500'
            },
            {
                id: 3,
                title: 'Latihan Dasar Kepemimpinan Mahasiswa (LDKM) 2026',
                category: 'BEM & Ormawa',
                categoryClass: 'bg-purple-50 text-purple-600',
                date: '15 Nov 2026',
                month: 'Nov',
                day: '15',
                time: '07:00 - Selesai',
                location: 'Gedung Serbaguna UHB',
                speaker: 'BEM UHB Team',
                quota: 150,
                registrants: 0,
                status: 'Draft',
                statusClass: 'bg-orange-100 text-orange-700',
                certificate: 'Belum Tersedia',
                certificateClass: 'bg-navy-50 text-navy-500',
                gradient: 'from-purple-500 to-pink-600'
            },
            {
                id: 4,
                title: 'Webinar Keamanan Siber di Era Digital',
                category: 'Seminar Nasional',
                categoryClass: 'bg-uhbblue-50 text-uhbblue-600',
                date: '10 Mei 2026',
                month: 'Mei',
                day: '10',
                time: '09:00 - 12:00 WIB',
                location: 'Zoom Meeting Online',
                speaker: 'Pratama Persadha (CISSReC)',
                quota: 500,
                registrants: 450,
                status: 'Selesai',
                statusClass: 'bg-gray-100 text-gray-700',
                certificate: 'Terbit (450 sertifikat)',
                certificateClass: 'bg-uhbamber-50 text-uhbamber-600',
                gradient: 'from-rose-500 to-red-600'
            }
        ],

        // Filter helper
        shouldShow(event) {
            // Status Filter Check
            if (this.statusFilter !== 'semua' && event.status.toLowerCase() !== this.statusFilter) {
                return false;
            }
            
            // Category Filter Check
            if (this.categoryFilter !== 'semua' && event.category !== this.categoryFilter) {
                return false;
            }

            // Search Query Check
            if (this.searchQuery.trim() !== '') {
                const query = this.searchQuery.toLowerCase();
                return event.title.toLowerCase().includes(query) || 
                       event.speaker.toLowerCase().includes(query) || 
                       event.location.toLowerCase().includes(query);
            }

            return true;
        },

        // Submit mock new event
        addEvent() {
            if (!this.newEvent.title || !this.newEvent.date || !this.newEvent.location) {
                alert('Mohon lengkapi judul, tanggal, dan lokasi event!');
                return;
            }

            // Get month abbreviation and day
            const dateObj = new Date(this.newEvent.date);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
            const monthAbbr = !isNaN(dateObj.getTime()) ? months[dateObj.getMonth()] : 'Okt';
            const dayNum = !isNaN(dateObj.getTime()) ? dateObj.getDate().toString().padStart(2, '0') : '20';
            const formattedDate = !isNaN(dateObj.getTime()) ? `${dayNum} ${months[dateObj.getMonth()]} ${dateObj.getFullYear()}` : this.newEvent.date;

            let categoryClass = 'bg-uhbblue-50 text-uhbblue-600';
            let gradient = 'from-blue-500 to-indigo-600';
            if (this.newEvent.category === 'Workshop IT') {
                categoryClass = 'bg-uhbamber-50 text-uhbamber-600';
                gradient = 'from-uhbamber-400 to-orange-500';
            } else if (this.newEvent.category === 'BEM & Ormawa') {
                categoryClass = 'bg-purple-50 text-purple-600';
                gradient = 'from-purple-500 to-pink-600';
            }

            let statusClass = 'bg-orange-100 text-orange-700';
            if (this.newEvent.status === 'Aktif') {
                statusClass = 'bg-green-100 text-green-700';
            }

            const event = {
                id: this.events.length + 1,
                title: this.newEvent.title,
                category: this.newEvent.category,
                categoryClass: categoryClass,
                date: formattedDate,
                month: monthAbbr,
                day: dayNum,
                time: this.newEvent.time || '08:00 WIB',
                location: this.newEvent.location,
                speaker: this.newEvent.speaker || 'Umum',
                quota: parseInt(this.newEvent.quota) || 100,
                registrants: 0,
                status: this.newEvent.status,
                statusClass: statusClass,
                certificate: 'Belum Tersedia',
                certificateClass: 'bg-navy-50 text-navy-500',
                gradient: gradient
            };

            this.events.unshift(event);
            this.modalOpen = false;

            // Reset form
            this.newEvent = {
                title: '',
                category: 'Seminar Nasional',
                date: '',
                time: '',
                location: '',
                quota: '',
                speaker: '',
                status: 'Draft',
                description: ''
            };
        }
    }" class="pb-12">

        <!-- Top Overview Banner -->
        <div class="bg-gradient-to-r from-navy-900 via-navy-800 to-navy-900 rounded-3xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-uhbblue-500 rounded-full blur-3xl mix-blend-screen opacity-20 -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-uhbamber-500 rounded-full blur-3xl mix-blend-screen opacity-20 transform -translate-x-1/2 -mb-20"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-extrabold mb-2">Manajemen Event & Seminar</h2>
                    <p class="text-navy-200 text-lg">Buat, kelola, dan publikasikan berbagai kegiatan akademik maupun non-akademik di lingkungan UHB.</p>
                </div>
                <button @click="modalOpen = true" class="px-6 py-3 bg-white text-navy-900 font-bold rounded-xl hover:bg-navy-50 hover:scale-105 transform active:scale-95 transition shadow-lg shrink-0 flex items-center gap-2">
                    <svg class="w-5 h-5 text-uhbblue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Event Baru
                </button>
            </div>
        </div>

        <!-- Filter & Search Panel -->
        <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm mb-8">
            <div class="flex flex-col lg:flex-row justify-between items-stretch lg:items-center gap-4">
                
                <!-- Search & Category (Left) -->
                <div class="flex flex-col sm:flex-row gap-4 flex-1">
                    <!-- Search Input -->
                    <div class="relative flex-1">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-navy-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input x-model="searchQuery" type="text" placeholder="Cari nama event, pembicara, lokasi..." class="w-full pl-11 pr-4 py-3 rounded-2xl border-2 border-navy-100 bg-navy-50/50 focus:border-uhbblue-500 focus:bg-white focus:ring-0 text-navy-900 font-medium transition shadow-sm">
                    </div>

                    <!-- Category Select -->
                    <div class="relative w-full sm:w-56">
                        <select x-model="categoryFilter" class="w-full pl-5 pr-10 py-3 rounded-2xl border-2 border-navy-100 bg-navy-50/50 focus:border-uhbblue-500 focus:bg-white focus:ring-0 text-navy-700 font-semibold transition cursor-pointer appearance-none">
                            <option value="semua">Semua Kategori</option>
                            <option value="Seminar Nasional">Seminar Nasional</option>
                            <option value="Workshop IT">Workshop IT</option>
                            <option value="BEM & Ormawa">BEM & Ormawa</option>
                        </select>
                    </div>
                </div>

                <!-- Status Filter Tabs (Right) -->
                <div class="flex items-center p-1.5 bg-navy-50 border border-navy-100/50 rounded-2xl self-start lg:self-center overflow-x-auto no-scrollbar">
                    <button @click="statusFilter = 'semua'" :class="statusFilter === 'semua' ? 'bg-white text-navy-900 shadow-md font-bold' : 'text-navy-500 hover:text-navy-800 font-medium'" class="px-5 py-2.5 rounded-xl text-sm transition-all whitespace-nowrap">Semua</button>
                    <button @click="statusFilter = 'aktif'" :class="statusFilter === 'aktif' ? 'bg-white text-navy-900 shadow-md font-bold' : 'text-navy-500 hover:text-navy-800 font-medium'" class="px-5 py-2.5 rounded-xl text-sm transition-all whitespace-nowrap flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span> Aktif
                    </button>
                    <button @click="statusFilter = 'draft'" :class="statusFilter === 'draft' ? 'bg-white text-navy-900 shadow-md font-bold' : 'text-navy-500 hover:text-navy-800 font-medium'" class="px-5 py-2.5 rounded-xl text-sm transition-all whitespace-nowrap flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-orange-400"></span> Draft
                    </button>
                    <button @click="statusFilter = 'selesai'" :class="statusFilter === 'selesai' ? 'bg-white text-navy-900 shadow-md font-bold' : 'text-navy-500 hover:text-navy-800 font-medium'" class="px-5 py-2.5 rounded-xl text-sm transition-all whitespace-nowrap flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span> Selesai
                    </button>
                </div>
            </div>
        </div>

        <!-- Event Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="event in events" :key="event.id">
                <div x-show="shouldShow(event)" 
                     x-transition:enter="transition ease-out duration-300 transform"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-white rounded-3xl border border-navy-100 overflow-hidden hover:shadow-2xl hover:shadow-uhbblue-500/10 transition-all duration-300 transform hover:-translate-y-2 flex flex-col justify-between">
                    
                    <div>
                        <!-- Header Banner -->
                        <div class="relative h-48 overflow-hidden bg-navy-100">
                            <!-- Premium dynamic gradient -->
                            <div :class="'absolute inset-0 bg-gradient-to-br ' + event.gradient + ' opacity-90 group-hover:scale-105 transition-transform duration-500'"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span :class="event.categoryClass" class="px-3.5 py-1 rounded-full text-xs font-bold shadow-sm" x-text="event.category"></span>
                            </div>

                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <span :class="event.statusClass" class="px-3.5 py-1 rounded-full text-xs font-bold shadow-sm" x-text="event.status"></span>
                            </div>

                            <!-- Calendar Icon Stack -->
                            <div class="absolute bottom-4 right-4 flex bg-white/95 backdrop-blur-sm rounded-2xl p-2.5 shadow-md">
                                <div class="text-center px-2.5">
                                    <div class="text-xs font-black text-uhbblue-600 uppercase" x-text="event.month"></div>
                                    <div class="text-xl font-extrabold text-navy-900" x-text="event.day"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            <!-- Time & Speaker -->
                            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-navy-500 mb-3">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                                    <span x-text="event.time"></span>
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-navy-300"></span>
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span x-text="event.speaker"></span>
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-navy-900 mb-2 group-hover:text-uhbblue-600 transition line-clamp-2" x-text="event.title"></h3>

                            <!-- Location Info -->
                            <p class="text-navy-500 text-sm mb-6 flex items-center gap-2">
                                <svg class="w-4 h-4 text-uhbblue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span x-text="event.location"></span>
                            </p>

                            <!-- Progress / Stats -->
                            <div class="space-y-3 pt-4 border-t border-navy-50">
                                <!-- Quota Progress Bar -->
                                <div>
                                    <div class="flex justify-between text-xs font-semibold mb-1">
                                        <span class="text-navy-500">Pendaftar</span>
                                        <span class="text-navy-900" x-text="event.registrants + ' / ' + event.quota + ' (' + Math.round((event.registrants/event.quota)*100) + '%)'"></span>
                                    </div>
                                    <div class="w-full bg-navy-100 rounded-full h-2">
                                        <div :class="event.gradient" class="bg-gradient-to-r h-2 rounded-full transition-all duration-500" :style="'width: ' + ((event.registrants/event.quota)*100) + '%'"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="px-6 pb-6 pt-2 border-t border-navy-50 flex items-center justify-between gap-4 bg-navy-50/20">
                        <div class="flex flex-col">
                            <span class="text-[10px] uppercase font-bold text-navy-400">Sertifikat</span>
                            <span :class="event.certificateClass" class="px-2 py-0.5 rounded text-[11px] font-bold block" x-text="event.certificate"></span>
                        </div>

                        <div class="flex items-center gap-2">
                            <button class="p-2 text-navy-500 hover:text-uhbblue-600 hover:bg-navy-50 rounded-xl transition border border-transparent hover:border-navy-100 shadow-sm" title="Edit Event">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <button class="px-4 py-2 bg-navy-900 text-white font-bold rounded-xl text-xs hover:bg-navy-800 hover:shadow-lg transition">
                                Kelola
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Empty State -->
        <div x-show="events.filter(e => shouldShow(e)).length === 0" 
             class="bg-white rounded-3xl p-16 border border-navy-100 text-center shadow-sm max-w-lg mx-auto mt-12"
             x-transition>
            <div class="w-20 h-20 bg-navy-50 text-navy-400 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-navy-900 mb-2">Event Tidak Ditemukan</h3>
            <p class="text-navy-500">Kami tidak menemukan event yang cocok dengan kata kunci pencarian atau filter yang Anda pilih.</p>
        </div>

        <!-- Premium Create Event Modal (Alpine.js) -->
        <div x-show="modalOpen" 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-navy-950/70 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
            
            <div class="bg-white rounded-3xl border border-navy-100 w-full max-w-4xl max-h-[90vh] overflow-y-auto shadow-2xl relative"
                 @click.away="modalOpen = false"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                <!-- Close Button -->
                <button @click="modalOpen = false" class="absolute top-6 right-6 p-2 rounded-full hover:bg-navy-50 text-navy-400 hover:text-navy-800 transition z-10 bg-white shadow-sm border border-navy-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="grid grid-cols-1 lg:grid-cols-5">
                    <!-- Form inputs (Left) -->
                    <div class="lg:col-span-3 p-8 border-r border-navy-100">
                        <h3 class="text-2xl font-extrabold text-navy-900 mb-2">Buat Event Baru</h3>
                        <p class="text-navy-500 text-sm mb-6">Isi formulir secara lengkap untuk memublikasikan seminar atau workshop baru.</p>
                        
                        <form @submit.prevent="addEvent()" class="space-y-5">
                            <!-- Event Title -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Judul Event <span class="text-red-500">*</span></label>
                                <input x-model="newEvent.title" type="text" required placeholder="Contoh: Tech Conference 2026..." class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition shadow-sm text-sm">
                            </div>

                            <!-- Category & Status -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Kategori</label>
                                    <select x-model="newEvent.category" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-700 font-semibold transition cursor-pointer text-sm">
                                        <option value="Seminar Nasional">Seminar Nasional</option>
                                        <option value="Workshop IT">Workshop IT</option>
                                        <option value="BEM & Ormawa">BEM & Ormawa</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Status Awal</label>
                                    <select x-model="newEvent.status" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-700 font-semibold transition cursor-pointer text-sm">
                                        <option value="Draft">Draft (Simpan Internal)</option>
                                        <option value="Aktif">Aktif (Buka Registrasi)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Tanggal Event <span class="text-red-500">*</span></label>
                                    <input x-model="newEvent.date" type="date" required class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-700 font-medium transition shadow-sm text-sm cursor-pointer">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Waktu / Jam</label>
                                    <input x-model="newEvent.time" type="text" placeholder="Contoh: 08:00 - 12:00 WIB" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition shadow-sm text-sm">
                                </div>
                            </div>

                            <!-- Location & Speaker -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Lokasi / Tempat <span class="text-red-500">*</span></label>
                                    <input x-model="newEvent.location" type="text" required placeholder="Contoh: Auditorium Utama" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition shadow-sm text-sm">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Narasumber / Pembicara</label>
                                    <input x-model="newEvent.speaker" type="text" placeholder="Contoh: Pratama Persadha" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition shadow-sm text-sm">
                                </div>
                            </div>

                            <!-- Quota -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-navy-500 mb-2">Kuota Maksimal Peserta</label>
                                <input x-model="newEvent.quota" type="number" placeholder="Contoh: 200" class="w-full px-4 py-3 rounded-xl border border-navy-200 bg-white focus:border-uhbblue-500 focus:ring-0 text-navy-900 font-medium transition shadow-sm text-sm">
                            </div>

                            <!-- Action Buttons -->
                            <div class="pt-4 border-t border-navy-100 flex items-center justify-end gap-3">
                                <button type="button" @click="modalOpen = false" class="px-5 py-3 rounded-xl border-2 border-navy-100 hover:border-navy-300 text-navy-700 font-bold text-sm transition">Batal</button>
                                <button type="submit" class="px-6 py-3 bg-navy-900 text-white font-bold rounded-xl text-sm hover:bg-navy-800 hover:shadow-lg transition">Simpan Event</button>
                            </div>
                        </form>
                    </div>

                    <!-- Premium Live Preview (Right) -->
                    <div class="lg:col-span-2 p-8 bg-navy-50/50 flex flex-col justify-center items-center">
                        <span class="text-xs font-bold uppercase tracking-wider text-navy-400 mb-4 block">Pratinjau Kartu (Live Preview)</span>
                        
                        <!-- Preview Card -->
                        <div class="bg-white rounded-3xl border border-navy-100 overflow-hidden shadow-xl max-w-sm w-full transition duration-300">
                            <!-- Card Header Banner -->
                            <div class="relative h-40 overflow-hidden bg-navy-200">
                                <!-- Gradient dynamic color selection -->
                                <div :class="'absolute inset-0 bg-gradient-to-br ' + (newEvent.category === 'Workshop IT' ? 'from-uhbamber-400 to-orange-500' : (newEvent.category === 'BEM & Ormawa' ? 'from-purple-500 to-pink-600' : 'from-blue-500 to-indigo-600')) + ' opacity-90'"></div>
                                
                                <div class="absolute top-4 left-4">
                                    <span :class="newEvent.category === 'Workshop IT' ? 'bg-uhbamber-50 text-uhbamber-600' : (newEvent.category === 'BEM & Ormawa' ? 'bg-purple-50 text-purple-600' : 'bg-uhbblue-50 text-uhbblue-600')" class="px-3 py-0.5 rounded-full text-[10px] font-bold shadow-sm" x-text="newEvent.category"></span>
                                </div>
                                <div class="absolute top-4 right-4">
                                    <span :class="newEvent.status === 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700'" class="px-3 py-0.5 rounded-full text-[10px] font-bold shadow-sm" x-text="newEvent.status"></span>
                                </div>
                                
                                <div class="absolute bottom-4 right-4 flex bg-white/95 rounded-xl p-2 shadow-sm">
                                    <div class="text-center px-2">
                                        <div class="text-[10px] font-bold text-uhbblue-600 uppercase">Okt</div>
                                        <div class="text-sm font-black text-navy-900">20</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="p-5">
                                <div class="flex items-center gap-3 text-[10px] text-navy-400 mb-2">
                                    <span x-text="newEvent.time || '08:00 WIB'"></span>
                                    <span class="w-1 h-1 rounded-full bg-navy-300"></span>
                                    <span x-text="newEvent.speaker || 'Pembicara'"></span>
                                </div>
                                <h4 class="font-bold text-navy-900 text-base mb-2 line-clamp-2" x-text="newEvent.title || 'Judul Seminar/Workshop Baru'"></h4>
                                <p class="text-navy-500 text-xs flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-uhbblue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="line-clamp-1" x-text="newEvent.location || 'Lokasi Kegiatan'"></span>
                                </p>
                            </div>

                            <!-- Card Footer -->
                            <div class="px-5 py-4 border-t border-navy-50 flex items-center justify-between gap-4 bg-navy-50/20 text-xs">
                                <div class="flex flex-col">
                                    <span class="text-[9px] uppercase font-bold text-navy-400">Sertifikat</span>
                                    <span class="bg-navy-50 text-navy-500 px-1.5 py-0.5 rounded text-[10px] font-bold block">Belum Tersedia</span>
                                </div>
                                <span class="text-navy-500 font-semibold" x-text="'Kuota: ' + (newEvent.quota || '100')"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
