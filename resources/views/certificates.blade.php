<x-app-layout>
    <x-slot name="header">
        Manajemen Sertifikat Digital
    </x-slot>

    <div x-data="{
        searchQuery: '',
        statusFilter: 'semua',
        selectedAwardeeName: 'Muhammad Rian',
        selectedAwardeeNim: 'IS-2023-042',
        selectedEventTitle: 'Tech Conference 2026: Masa Depan AI & Sistem Informasi',
        selectedEventDate: '24 Oktober 2026',
        selectedCertId: 'CERT-UHB-2026-9041',
        
        toastOpen: false,
        toastMessage: '',

        // Consistency certificates data
        certEvents: [
            {
                id: 1,
                title: 'Tech Conference 2026: Masa Depan AI & Sistem Informasi',
                category: 'Seminar Nasional',
                date: '24 Okt 2026',
                registrants: 520,
                status: 'Terbit',
                statusClass: 'bg-uhbamber-50 text-uhbamber-600',
                certCode: 'CERT-UHB-2026-90',
                awardees: [
                    { name: 'Muhammad Rian', nim: 'IS-2023-042', code: 'CERT-UHB-2026-9041' },
                    { name: 'Dina Lestari', nim: 'IS-2023-018', code: 'CERT-UHB-2026-9042' },
                    { name: 'Aditya Pratama', nim: 'IS-2023-112', code: 'CERT-UHB-2026-9043' }
                ]
            },
            {
                id: 2,
                title: 'Bootcamp Laravel & React: Build Modern Web Apps',
                category: 'Workshop IT',
                date: '02 Nov 2026',
                registrants: 180,
                status: 'Siap Diterbitkan',
                statusClass: 'bg-blue-50 text-blue-600',
                certCode: 'CERT-UHB-2026-88',
                awardees: [
                    { name: 'Bagas Saputra', nim: 'IS-2024-002', code: 'CERT-UHB-2026-8801' },
                    { name: 'Lia Anggraini', nim: 'IS-2024-055', code: 'CERT-UHB-2026-8802' },
                    { name: 'Fikri Haikal', nim: 'IS-2024-089', code: 'CERT-UHB-2026-8803' }
                ]
            },
            {
                id: 3,
                title: 'Webinar Keamanan Siber di Era Digital',
                category: 'Seminar Nasional',
                date: '10 Mei 2026',
                registrants: 450,
                status: 'Terbit',
                statusClass: 'bg-uhbamber-50 text-uhbamber-600',
                certCode: 'CERT-UHB-2026-34',
                awardees: [
                    { name: 'Rahmat Hidayat', nim: 'IS-2022-090', code: 'CERT-UHB-2026-3412' },
                    { name: 'Siti Aminah', nim: 'IS-2022-104', code: 'CERT-UHB-2026-3413' }
                ]
            },
            {
                id: 4,
                title: 'Latihan Dasar Kepemimpinan Mahasiswa (LDKM) 2026',
                category: 'BEM & Ormawa',
                date: '15 Nov 2026',
                registrants: 150,
                status: 'Belum Tersedia',
                statusClass: 'bg-navy-50 text-navy-400',
                certCode: '—',
                awardees: []
            }
        ],

        shouldShow(event) {
            // Status filter check
            if (this.statusFilter !== 'semua' && event.status !== this.statusFilter) {
                return false;
            }

            // Search query check
            if (this.searchQuery.trim() !== '') {
                const query = this.searchQuery.toLowerCase();
                return event.title.toLowerCase().includes(query) || event.category.toLowerCase().includes(query);
            }

            return true;
        },

        previewAwardee(awardee, eventTitle, eventDate) {
            this.selectedAwardeeName = awardee.name;
            this.selectedAwardeeNim = awardee.nim;
            this.selectedEventTitle = eventTitle;
            this.selectedEventDate = eventDate;
            this.selectedCertId = awardee.code;
        },

        publishCertificates(event) {
            event.status = 'Terbit';
            event.statusClass = 'bg-uhbamber-50 text-uhbamber-600';
            
            // Preview the first awardee of this published event
            if (event.awardees.length > 0) {
                this.previewAwardee(event.awardees[0], event.title, event.date);
            }

            // Trigger success toast
            this.toastMessage = `Berhasil menerbitkan ${event.registrants} sertifikat digital untuk ${event.title}!`;
            this.toastOpen = true;
            setTimeout(() => { this.toastOpen = false; }, 4000);
        }
    }" class="pb-12">

        <!-- Top Metrics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Stat 1 -->
            <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-uhbamber-50 text-uhbamber-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-uhbamber-500 bg-uhbamber-50 px-2.5 py-1 rounded-lg">Aktif</span>
                </div>
                <h3 class="text-navy-500 text-sm font-semibold mb-1">Total Terbit (Tahun Ini)</h3>
                <div class="text-3xl font-black text-navy-900">4,940</div>
            </div>

            <!-- Stat 2 -->
            <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-blue-500 bg-blue-50 px-2.5 py-1 rounded-lg">Antrean</span>
                </div>
                <h3 class="text-navy-500 text-sm font-semibold mb-1">Menunggu Penerbitan</h3>
                <div class="text-3xl font-black text-navy-900" x-text="certEvents.filter(e => e.status === 'Siap Diterbitkan').reduce((sum, e) => sum + e.registrants, 0)">180</div>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="text-xs font-bold text-purple-500 bg-purple-50 px-2.5 py-1 rounded-lg">Desain</span>
                </div>
                <h3 class="text-navy-500 text-sm font-semibold mb-1">Template Sertifikat Aktif</h3>
                <div class="text-3xl font-black text-navy-900">3</div>
            </div>
        </div>

        <!-- Main Workspace (Split Grid) -->
        <div class="grid grid-cols-1 xl:grid-cols-5 gap-8">
            
            <!-- Certificate Database (Left 3 cols) -->
            <div class="xl:col-span-3 bg-white rounded-3xl p-6 border border-navy-100 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold text-navy-900 mb-6">Database Penerbitan Sertifikat</h3>
                    
                    <!-- Internal Filter bar -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-6">
                        <div class="relative flex-1">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-navy-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input x-model="searchQuery" type="text" placeholder="Cari nama event..." class="w-full pl-11 pr-4 py-2.5 rounded-2xl border-2 border-navy-100 bg-navy-50/50 focus:border-uhbblue-500 focus:bg-white focus:ring-0 text-navy-900 font-medium transition text-sm shadow-sm">
                        </div>
                        <div class="flex items-center p-1 bg-navy-50 border border-navy-100/50 rounded-2xl">
                            <button @click="statusFilter = 'semua'" :class="statusFilter === 'semua' ? 'bg-white text-navy-900 shadow-sm font-bold' : 'text-navy-500 font-medium'" class="px-4 py-2 rounded-xl text-xs transition-all">Semua</button>
                            <button @click="statusFilter = 'Terbit'" :class="statusFilter === 'Terbit' ? 'bg-white text-navy-900 shadow-sm font-bold' : 'text-navy-500 font-medium'" class="px-4 py-2 rounded-xl text-xs transition-all">Terbit</button>
                            <button @click="statusFilter = 'Siap Diterbitkan'" :class="statusFilter === 'Siap Diterbitkan' ? 'bg-white text-navy-900 shadow-sm font-bold' : 'text-navy-500 font-medium'" class="px-4 py-2 rounded-xl text-xs transition-all whitespace-nowrap">Siap Terbit</button>
                        </div>
                    </div>

                    <!-- Issuance Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="text-navy-400 font-bold border-b border-navy-50">
                                    <th class="pb-3 text-xs uppercase tracking-wider pl-2">Event / Seminar</th>
                                    <th class="pb-3 text-xs uppercase tracking-wider">Kategori</th>
                                    <th class="pb-3 text-xs uppercase tracking-wider text-center">Penerima</th>
                                    <th class="pb-3 text-xs uppercase tracking-wider text-center">Status</th>
                                    <th class="pb-3 text-xs uppercase tracking-wider text-right pr-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-navy-50">
                                <template x-for="event in certEvents" :key="event.id">
                                    <tr x-show="shouldShow(event)" class="hover:bg-navy-50/50 transition duration-150">
                                        <td class="py-4 pl-2">
                                            <div class="font-bold text-navy-900 line-clamp-1" x-text="event.title"></div>
                                            <div class="text-xs text-navy-400 flex items-center gap-1.5 mt-0.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span x-text="event.date"></span>
                                                <span class="w-1 h-1 rounded-full bg-navy-300"></span>
                                                <span x-text="'Kode: ' + event.certCode"></span>
                                            </div>
                                        </td>
                                        <td class="py-4 text-xs font-semibold text-navy-600" x-text="event.category"></td>
                                        <td class="py-4 text-center font-bold text-navy-700" x-text="event.registrants"></td>
                                        <td class="py-4 text-center">
                                            <span :class="event.statusClass" class="px-3 py-1 rounded-full text-xs font-bold shadow-sm" x-text="event.status"></span>
                                        </td>
                                        <td class="py-4 text-right pr-2">
                                            <div class="flex items-center justify-end gap-2">
                                                <!-- If Ready to publish -->
                                                <template x-if="event.status === 'Siap Diterbitkan'">
                                                    <button @click="publishCertificates(event)" class="px-3.5 py-1.5 bg-uhbblue-600 text-white font-bold rounded-xl text-xs hover:bg-uhbblue-700 hover:shadow-md transition">
                                                        Terbitkan
                                                    </button>
                                                </template>

                                                <!-- If Already Published, list awardees for preview -->
                                                <template x-if="event.status === 'Terbit' && event.awardees.length > 0">
                                                    <div class="relative" x-data="{ open: false }">
                                                        <button @click="open = !open" class="px-3.5 py-1.5 bg-navy-900 text-white font-bold rounded-xl text-xs hover:bg-navy-800 hover:shadow-md transition flex items-center gap-1">
                                                            Lihat
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                                        </button>
                                                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-navy-100 rounded-2xl shadow-xl z-20 p-2 text-left" style="display: none;">
                                                            <span class="block text-[10px] font-bold uppercase tracking-wider text-navy-400 px-3 py-1 border-b border-navy-50">Sampel Peserta</span>
                                                            <template x-for="awardee in event.awardees">
                                                                <button @click="previewAwardee(awardee, event.title, event.date); open = false;" class="w-full text-left px-3 py-2 rounded-xl text-xs font-semibold text-navy-700 hover:bg-navy-50 transition" x-text="awardee.name"></button>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>

                                                <!-- If not available -->
                                                <template x-if="event.status === 'Belum Tersedia'">
                                                    <span class="text-xs text-navy-400 italic">Belum Selesai</span>
                                                </template>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Template Manager Guide -->
                <div class="mt-8 p-4 bg-navy-50 rounded-2xl border border-navy-100/50 text-xs text-navy-600 flex items-start gap-3">
                    <svg class="w-5 h-5 text-uhbblue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <p class="font-bold text-navy-950 mb-0.5">Sistem Tanda Tangan Digital & Validasi QR Code</p>
                        <p class="leading-relaxed">Setiap sertifikat yang terbit dilengkapi dengan kode unik kriptografi dan tanda tangan elektronik tersertifikasi. Mahasiswa dapat memverifikasi keaslian dokumen via pemindaian kode QR di halaman utama.</p>
                    </div>
                </div>
            </div>

            <!-- Premium Certificate Preview (Right 2 cols) -->
            <div class="xl:col-span-2 flex flex-col gap-6">
                <!-- Preview Header title -->
                <div class="bg-white rounded-3xl p-6 border border-navy-100 shadow-sm flex-1 flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-navy-400 block mb-3">Sertifikat Digital (Pratinjau Hasil)</span>
                        
                        <!-- High-End Certificate Design Markup -->
                        <div class="relative bg-gradient-to-br from-navy-900 to-navy-950 text-white rounded-2xl p-6 aspect-[1.414/1] shadow-2xl border border-navy-700/50 flex flex-col justify-between overflow-hidden">
                            <!-- Background elegant vector decorations -->
                            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-900/40 via-transparent to-transparent opacity-60"></div>
                            <div class="absolute top-0 right-0 w-32 h-32 border-r-4 border-t-4 border-uhbblue-500/20 rounded-tr-2xl"></div>
                            <div class="absolute bottom-0 left-0 w-32 h-32 border-l-4 border-b-4 border-uhbamber-500/20 rounded-bl-2xl"></div>
                            
                            <!-- Certificate Header logo -->
                            <div class="relative z-10 flex justify-between items-start">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-lg bg-uhbblue-600 flex items-center justify-center shadow-md">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="text-[9px] font-black tracking-widest text-uhbblue-400 block leading-none">UNIVERSITAS</span>
                                        <span class="text-xs font-black tracking-wider text-white leading-none">HARAPAN BANGSA</span>
                                    </div>
                                </div>
                                <span class="text-[7px] font-mono text-navy-400 bg-white/5 border border-white/10 px-2 py-0.5 rounded" x-text="selectedCertId">CERT-UHB-2026-9041</span>
                            </div>

                            <!-- Certificate Body Title -->
                            <div class="relative z-10 text-center my-3">
                                <h4 class="text-xs font-extrabold uppercase tracking-[0.25em] text-uhbblue-300 leading-none">Sertifikat Penghargaan</h4>
                                <div class="w-12 h-0.5 bg-gradient-to-r from-uhbblue-50 to-uhbamber-400 mx-auto mt-2"></div>
                                <span class="text-[8px] italic text-navy-300 block mt-2">Diberikan kepada:</span>
                                
                                <!-- Awardee Dynamic Name -->
                                <h2 class="text-lg font-black text-white mt-1 leading-tight tracking-wide drop-shadow-sm font-sans" x-text="selectedAwardeeName">Muhammad Rian</h2>
                                <span class="text-[8px] font-mono text-navy-400 block" x-text="'NIM / ID: ' + selectedAwardeeNim">NIM / ID: IS-2023-042</span>
                            </div>

                            <!-- Certificate Body Content -->
                            <div class="relative z-10 text-center px-4">
                                <p class="text-[8px] text-navy-200 leading-relaxed">
                                    Atas partisipasi aktif dan dedikasinya sebagai <strong class="text-uhbamber-300 font-extrabold">Peserta</strong> dalam kegiatan akademis:
                                </p>
                                <!-- Event dynamic title -->
                                <p class="text-[9px] font-extrabold text-white mt-1 leading-snug max-w-[90%] mx-auto" x-text="selectedEventTitle">
                                    Tech Conference 2026: Masa Depan AI & Sistem Informasi
                                </p>
                                <p class="text-[7px] text-navy-400 mt-1" x-text="'Diselenggarakan oleh Universitas Harapan Bangsa pada ' + selectedEventDate">
                                    Diselenggarakan oleh Universitas Harapan Bangsa pada 24 Oktober 2026
                                </p>
                            </div>

                            <!-- Certificate Signatures Footer -->
                            <div class="relative z-10 flex justify-between items-end border-t border-white/5 pt-3 mt-2 text-left">
                                <div class="text-[6px] text-navy-400">
                                    <span>Dekan Fakultas Ilmu Komputer</span>
                                    <div class="w-16 h-6 my-1 bg-[url('https://upload.wikimedia.org/wikipedia/commons/f/f8/Signature_of_Quentin_Anthurus.svg')] bg-contain bg-no-repeat opacity-40 filter invert"></div>
                                    <span class="font-bold text-white block">Dr. Roni Gunawan, M.T.</span>
                                    <span>NIDN. 0624097801</span>
                                </div>

                                <!-- QR Code Validation -->
                                <div class="text-center flex flex-col items-center">
                                    <!-- Decorative QR code representation -->
                                    <div class="w-10 h-10 bg-white p-1 rounded-lg shadow-md flex items-center justify-center">
                                        <svg class="w-8 h-8 text-navy-950" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 3h6v6H3V3zm2 2v2h2V5H5zm8-2h6v6h-6V3zm2 2v2h2V5h-2zM3 15h6v6H3v-6zm2 2v2h2v-2H5zm10-2h2v2h-2v-2zm2 2h2v2h-2v-2zm-2 2h2v2h-2v-2zm4-4h2v2h-2v-2zm0 4h2v2h-2v-2zM10 10h4v4h-4v-4zm2 2h2v-2h-2v2z"/>
                                        </svg>
                                    </div>
                                    <span class="text-[5px] text-navy-400 mt-1 block">Scan Validasi Keaslian</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Premium Alpine.js Success Toast Notification -->
        <div x-show="toastOpen" 
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="fixed bottom-6 right-6 z-50 p-4 rounded-2xl bg-navy-900 border border-navy-700 shadow-2xl flex items-center gap-4 text-white max-w-md"
             style="display: none;">
            <div class="w-10 h-10 rounded-xl bg-uhbamber-500/20 text-uhbamber-400 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
            </div>
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-uhbamber-400 block mb-0.5">Berhasil Diterbitkan</span>
                <p class="text-xs text-navy-200" x-text="toastMessage"></p>
            </div>
            <button @click="toastOpen = false" class="p-1 rounded hover:bg-white/10 text-navy-400 hover:text-white transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

    </div>
</x-app-layout>
