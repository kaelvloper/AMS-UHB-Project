<x-app-layout>
    <!-- Palet UHB: Royal Blue (blue-600), Aksen Kuning (amber-400), Slate-50 Background -->
    <div x-data="{ 
        currentTab: 'uts', 
        searchQuery: '',
        showDetailModal: false,
        selectedDosen: {},
        dosenList: [
            {
                id: 1,
                nama: 'Nama Kamulian, M.SD',
                nidn: '010132980001',
                statusDosen: 'Tetap',
                avatar: 'NK',
                prodi: 'Teknik Informatika',
                matkul: 'Pemrograman Web Lanjut',
                mhs: 42,
                tarif: 25000,
                statusBayar: 'Dibayarkan',
                bank: 'Bank Mandiri',
                rekening: '1370012345678'
            },
            {
                id: 2,
                nama: 'Juan Khahamton, PLD',
                nidn: '010008120007',
                statusDosen: 'Tetap',
                avatar: 'JK',
                prodi: 'Sistem Informasi',
                matkul: 'Desain Antarmuka Pengguna (UI/UX)',
                mhs: 38,
                tarif: 25000,
                statusBayar: 'Dibayarkan',
                bank: 'Bank Mandiri',
                rekening: '1370098765432'
            },
            {
                id: 3,
                nama: 'Nama Sulan, SMD',
                nidn: '010008190014',
                statusDosen: 'LB',
                avatar: 'NS',
                prodi: 'Pendidikan Bahasa Inggris',
                matkul: 'Bahasa Inggris untuk IT',
                mhs: 55,
                tarif: 25000,
                statusBayar: 'Proses',
                bank: 'Bank BNI',
                rekening: '0987654321'
            },
            {
                id: 4,
                nama: 'Anaeli Bunyan, PMD',
                nidn: '010132650009',
                statusDosen: 'Tetap',
                avatar: 'AB',
                prodi: 'Teknik Informatika',
                matkul: 'Jaringan Komputer Dasar',
                mhs: 45,
                tarif: 25000,
                statusBayar: 'Dibayarkan',
                bank: 'Bank BRI',
                rekening: '0123456789123'
            },
            {
                id: 5,
                nama: 'Nansel Lian, Ph.D',
                nidn: '010008190018',
                statusDosen: 'LB',
                avatar: 'NL',
                prodi: 'Sistem Informasi',
                matkul: 'Metode Penelitian Sistem Informasi',
                mhs: 30,
                tarif: 25000,
                statusBayar: 'Pending',
                bank: 'Bank BCA',
                rekening: '8830123456'
            }
        ],
        uasList: [
            {
                id: 1,
                nama: 'Nama Kamulian, M.SD',
                nidn: '010132980001',
                statusDosen: 'Tetap',
                avatar: 'NK',
                prodi: 'Teknik Informatika',
                matkul: 'Pemrograman Web Lanjut (UAS)',
                mhs: 42,
                tarif: 30000,
                statusBayar: 'Dibayarkan',
                bank: 'Bank Mandiri',
                rekening: '1370012345678'
            },
            {
                id: 2,
                nama: 'Juan Khahamton, PLD',
                nidn: '010008120007',
                statusDosen: 'Tetap',
                avatar: 'JK',
                prodi: 'Sistem Informasi',
                matkul: 'Desain Antarmuka Pengguna (UI/UX) (UAS)',
                mhs: 38,
                tarif: 30000,
                statusBayar: 'Dibayarkan',
                bank: 'Bank Mandiri',
                rekening: '1370098765432'
            },
            {
                id: 3,
                nama: 'Nansel Lian, Ph.D',
                nidn: '010008190018',
                statusDosen: 'LB',
                avatar: 'NL',
                prodi: 'Sistem Informasi',
                matkul: 'Metode Penelitian Sistem Informasi (UAS)',
                mhs: 48,
                tarif: 30000,
                statusBayar: 'Proses',
                bank: 'Bank BCA',
                rekening: '8830123456'
            }
        ],
        get filteredDosen() {
            let list = this.currentTab === 'uts' ? this.dosenList : this.uasList;
            if (!this.searchQuery) return list;
            return list.filter(item => 
                item.nama.toLowerCase().includes(this.searchQuery.toLowerCase()) || 
                item.nidn.includes(this.searchQuery) ||
                item.matkul.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        },
        openDetail(item) {
            this.selectedDosen = item;
            this.showDetailModal = true;
        },
        formatRupiah(number) {
            if (isNaN(number) || number === undefined) return 'Rp 0';
            return 'Rp ' + number.toLocaleString('id-ID');
        },
        getStats() {
            let list = this.currentTab === 'uts' ? this.dosenList : this.uasList;
            let total = 0;
            let paid = 0;
            let pending = 0;
            list.forEach(item => {
                let bruto = item.mhs * item.tarif;
                let tax = item.statusDosen === 'Tetap' ? bruto * 0.05 : bruto * 0.15;
                let netto = bruto - tax;
                total += netto;
                if (item.statusBayar === 'Dibayarkan') {
                    paid += netto;
                } else {
                    pending += netto;
                }
            });
            return { total, paid, pending };
        }
    }" class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumbs & Header -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <nav class="flex text-sm text-slate-500 mb-2">
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition-colors">Dashboard</a>
                        <span class="mx-2">/</span>
                        <span class="text-slate-900 font-medium">Rekap Honor Ujian</span>
                    </nav>
                    <h2 class="text-3xl font-extrabold text-slate-950 flex items-center gap-3">
                        Rekap Honor UTS & UAS
                        <span class="bg-amber-400/20 text-amber-800 text-xs font-bold px-3 py-1 rounded-full border border-amber-400/40">
                            UHB Palette
                        </span>
                    </h2>
                    <p class="mt-2 text-sm text-slate-600">
                        Kelola data honorarium pengampu UTS dan UAS secara transparan dan terstruktur.
                    </p>
                </div>
                
                <!-- Print and Excel Actions -->
                <div class="flex items-center gap-3">
                    <button type="button" class="inline-flex items-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm transition-colors shadow-md hover:shadow-lg focus:outline-none">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Export Excel
                    </button>
                    <button type="button" class="inline-flex items-center px-4 py-2.5 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-lg font-semibold text-sm transition-colors shadow-sm focus:outline-none">
                        <svg class="w-4 h-4 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Cetak PDF
                    </button>
                </div>
            </div>

            <!-- Stats Card Section (Responsive & Clean) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card 1: Total Netto -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 text-blue-600 pointer-events-none group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H7c0-2.76 2.24-5 5-5s5 2.24 5 5c0 1.04-.42 1.99-1.07 2.75z"/></svg>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block">Total Honorarium (Netto)</span>
                            <span class="text-3xl font-black text-slate-900 mt-2 block" x-text="formatRupiah(getStats().total)"></span>
                        </div>
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs font-semibold text-slate-500 gap-1.5 border-t border-slate-100 pt-3">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        Berdasarkan modul yang aktif
                    </div>
                </div>

                <!-- Card 2: Paid Netto -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 text-emerald-600 pointer-events-none group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block">Sudah Dibayarkan</span>
                            <span class="text-3xl font-black text-emerald-600 mt-2 block" x-text="formatRupiah(getStats().paid)"></span>
                        </div>
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs font-semibold text-slate-500 gap-1.5 border-t border-slate-100 pt-3">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Telah ditransfer ke rekening dosen
                    </div>
                </div>

                <!-- Card 3: Pending/Proses Netto -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute -right-4 -bottom-4 opacity-5 text-amber-500 pointer-events-none group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm1 14h-2v-2h2v2zm0-4h-2V7h2v5z"/></svg>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest block">Menunggu Proses / Antrean</span>
                            <span class="text-3xl font-black text-amber-600 mt-2 block" x-text="formatRupiah(getStats().pending)"></span>
                        </div>
                        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs font-semibold text-slate-500 gap-1.5 border-t border-slate-100 pt-3">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                        Menunggu persetujuan / verifikasi KJM
                    </div>
                </div>
            </div>

            <!-- Toolbar & Filter Panel -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 mb-8 flex flex-col lg:flex-row lg:items-center justify-between gap-5">
                <!-- Custom HSL-Navy Tabs with Royal Blue and Amber Accent -->
                <div class="flex space-x-2 bg-slate-100 p-1.5 rounded-xl w-full lg:w-fit border border-slate-200/50">
                    <button @click="currentTab = 'uts'" 
                            :class="currentTab === 'uts' ? 'bg-blue-600 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/50'"
                            class="flex-1 lg:flex-none px-6 py-2.5 rounded-lg text-sm font-bold transition-all duration-200 flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full transition-colors" :class="currentTab === 'uts' ? 'bg-amber-400' : 'bg-slate-400'"></span>
                        UTS (Tengah Semester)
                    </button>
                    <button @click="currentTab = 'uas'" 
                            :class="currentTab === 'uas' ? 'bg-blue-600 text-white shadow-md' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-200/50'"
                            class="flex-1 lg:flex-none px-6 py-2.5 rounded-lg text-sm font-bold transition-all duration-200 flex items-center justify-center gap-2">
                        <span class="w-2 h-2 rounded-full transition-colors" :class="currentTab === 'uas' ? 'bg-amber-400' : 'bg-slate-400'"></span>
                        UAS (Akhir Semester)
                    </button>
                </div>

                <!-- Search and Filters -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full lg:w-fit">
                    <!-- Search Input -->
                    <div class="relative w-full sm:w-80">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input x-model="searchQuery" 
                               type="search" 
                               class="block w-full py-2.5 pl-10 pr-4 text-sm text-slate-900 bg-white rounded-xl border border-slate-300 focus:ring-blue-600 focus:border-blue-600 transition-colors" 
                               placeholder="Cari Dosen, Prodi, atau Mata Kuliah...">
                    </div>

                    <!-- Filter Button -->
                    <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-semibold text-sm border border-slate-300 transition-colors focus:outline-none">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Filter Lanjutan
                    </button>
                </div>
            </div>

            <!-- Table Card Container -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-600">
                        <thead class="text-xs text-slate-500 bg-slate-50 border-b border-slate-200 uppercase tracking-wider">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-bold">Nama Dosen & NIDN</th>
                                <th scope="col" class="px-6 py-4 font-bold">Mata Kuliah & Program Studi</th>
                                <th scope="col" class="px-6 py-4 font-bold text-center">Peserta</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right">Tarif</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right">Bruto</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right">Pajak</th>
                                <th scope="col" class="px-6 py-4 font-bold text-right">Netto</th>
                                <th scope="col" class="px-6 py-4 font-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Template loop utilizing Alpine.js for interactive search/tab -->
                            <template x-for="item in filteredDosen" :key="item.id">
                                <tr @click="openDetail(item)" class="hover:bg-slate-50/80 transition-colors cursor-pointer bg-white">
                                    <!-- Lecturer Cell -->
                                    <td class="px-6 py-4.5 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-blue-50 border border-blue-100 flex items-center justify-center font-bold text-sm text-blue-600 shadow-inner" x-text="item.avatar"></div>
                                            <div>
                                                <div class="font-extrabold text-slate-900 hover:text-blue-600 transition-colors" x-text="item.nama"></div>
                                                <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-2">
                                                    <span x-text="'NIDN: ' + item.nidn"></span>
                                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                                                    <span :class="item.statusDosen === 'Tetap' ? 'text-blue-600 font-semibold' : 'text-emerald-600 font-semibold'" x-text="'Dosen ' + item.statusDosen"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Course Cell -->
                                    <td class="px-6 py-4.5">
                                        <div class="font-semibold text-slate-900" x-text="item.matkul"></div>
                                        <div class="text-xs text-slate-500 mt-0.5" x-text="item.prodi"></div>
                                    </td>

                                    <!-- Student Count Cell -->
                                    <td class="px-6 py-4.5 text-center font-bold text-slate-800" x-text="item.mhs + ' Mhs'"></td>
                                    
                                    <!-- Rate Cell -->
                                    <td class="px-6 py-4.5 text-right font-medium text-slate-700" x-text="formatRupiah(item.tarif)"></td>
                                    
                                    <!-- Gross Cell -->
                                    <td class="px-6 py-4.5 text-right font-bold text-slate-900" x-text="formatRupiah(item.mhs * item.tarif)"></td>
                                    
                                    <!-- Tax Cell -->
                                    <td class="px-6 py-4.5 text-right text-red-600 font-medium">
                                        <span x-text="formatRupiah(item.statusDosen === 'Tetap' ? (item.mhs * item.tarif) * 0.05 : (item.mhs * item.tarif) * 0.15)"></span>
                                        <span class="text-[10px] text-slate-400 block" x-text="item.statusDosen === 'Tetap' ? '5% (PPH21)' : '15% (PPH21)'"></span>
                                    </td>
                                    
                                    <!-- Net Cell -->
                                    <td class="px-6 py-4.5 text-right font-black text-slate-950" x-text="formatRupiah((item.mhs * item.tarif) - (item.statusDosen === 'Tetap' ? (item.mhs * item.tarif) * 0.05 : (item.mhs * item.tarif) * 0.15))"></td>
                                    
                                    <!-- Status Badge Cell -->
                                    <td class="px-6 py-4.5 whitespace-nowrap text-center">
                                        <span :class="{
                                            'bg-emerald-100 text-emerald-800 border-emerald-200': item.statusBayar === 'Dibayarkan',
                                            'bg-amber-100 text-amber-800 border-amber-200': item.statusBayar === 'Proses',
                                            'bg-red-100 text-red-800 border-red-200': item.statusBayar === 'Pending'
                                        }" class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border" x-text="item.statusBayar"></span>
                                    </td>
                                </tr>
                            </template>
                            
                            <!-- Empty Search Results State -->
                            <tr x-show="filteredDosen.length === 0" style="display: none;">
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-base font-semibold text-slate-700">Hasil pencarian tidak ditemukan</p>
                                    <p class="text-xs text-slate-500 mt-1">Coba kata kunci lain atau bersihkan pencarian</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Info -->
                <div class="bg-slate-50 border-t border-slate-200 p-4 px-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs text-slate-500 font-semibold">
                    <div>
                        Menampilkan <span class="text-slate-900" x-text="filteredDosen.length"></span> dari total <span class="text-slate-900" x-text="currentTab === 'uts' ? dosenList.length : uasList.length"></span> dosen pengampu.
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span>Klik baris tabel untuk detail rekening & persetujuan pembayaran</span>
                    </div>
                </div>
            </div>

            <!-- Informational Banner -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6 flex flex-col sm:flex-row items-start gap-4 shadow-inner">
                <div class="p-3 bg-blue-600 text-white rounded-xl shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-blue-950">Aturan Pengenaan Pajak (PPH Pasal 21)</h4>
                    <p class="text-sm text-blue-900/80 mt-1 leading-relaxed">
                        Perhitungan pajak honorarium ujian Universitas Harapan Bangsa dilakukan secara otomatis sesuai status kepegawaian dosen. 
                        Dosen Tetap dikenakan potongan PPH21 sebesar <strong class="text-blue-950">5%</strong>, sedangkan Dosen Luar Biasa (LB) dikenakan potongan sebesar <strong class="text-blue-950">15%</strong>.
                    </p>
                </div>
            </div>

        </div>

        <!-- Detail Modal (Alpine.js driven) -->
        <div x-show="showDetailModal" 
             class="fixed inset-0 z-50 overflow-y-auto" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             style="display: none;">
             
             <!-- Backdrop blur overlay -->
             <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" @click="showDetailModal = false"></div>

             <!-- Modal Box Position -->
             <div class="flex min-h-full items-center justify-center p-4 sm:p-6 relative z-10">
                 
                 <div x-show="showDetailModal"
                      x-transition:enter="transition ease-out duration-300 transform"
                      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                      x-transition:leave="transition ease-in duration-200 transform"
                      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                      class="relative bg-white rounded-3xl shadow-2xl border border-slate-200 max-w-xl w-full overflow-hidden flex flex-col">
                      
                      <!-- Header: Blue theme -->
                      <div class="bg-gradient-to-r from-blue-900 to-indigo-950 p-6 text-white relative">
                          <button @click="showDetailModal = false" class="absolute top-6 right-6 text-blue-200 hover:text-white hover:bg-white/10 p-2 rounded-full transition-colors focus:outline-none">
                              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                          </button>
                          
                          <div class="flex items-center gap-3">
                              <div class="w-12 h-12 rounded-2xl bg-amber-400 text-blue-950 flex items-center justify-center font-bold text-lg shadow-md shadow-amber-400/25" x-text="selectedDosen.avatar"></div>
                              <div>
                                  <h3 class="text-xl font-extrabold tracking-tight" x-text="selectedDosen.nama"></h3>
                                  <p class="text-xs text-blue-200 mt-0.5" x-text="'NIDN: ' + selectedDosen.nidn + ' — Dosen ' + selectedDosen.statusDosen"></p>
                              </div>
                          </div>
                      </div>

                      <!-- Body content -->
                      <div class="p-6 bg-slate-50 flex-1">
                          
                          <!-- Section: Detail Matkul -->
                          <div class="bg-white rounded-2xl p-5 border border-slate-200/70 shadow-sm mb-5">
                              <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Informasi Pelaksanaan Ujian</h4>
                              
                              <div class="grid grid-cols-2 gap-4 text-sm">
                                  <div>
                                      <span class="text-slate-500 block text-xs font-semibold">Mata Kuliah</span>
                                      <span class="text-slate-900 font-bold mt-1 block" x-text="selectedDosen.matkul"></span>
                                  </div>
                                  <div>
                                      <span class="text-slate-500 block text-xs font-semibold">Program Studi</span>
                                      <span class="text-slate-900 font-bold mt-1 block" x-text="selectedDosen.prodi"></span>
                                  </div>
                                  <div>
                                      <span class="text-slate-500 block text-xs font-semibold">Jumlah Peserta Ujian</span>
                                      <span class="text-slate-900 font-extrabold mt-1 block" x-text="selectedDosen.mhs + ' Mahasiswa'"></span>
                                  </div>
                                  <div>
                                      <span class="text-slate-500 block text-xs font-semibold">Tarif Per Mahasiswa</span>
                                      <span class="text-slate-900 font-extrabold mt-1 block" x-text="formatRupiah(selectedDosen.tarif)"></span>
                                  </div>
                              </div>
                          </div>

                          <!-- Section: Perhitungan Keuangan -->
                          <div class="bg-white rounded-2xl p-5 border border-slate-200/70 shadow-sm mb-5">
                              <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Rincian Nominal Honorarium</h4>
                              
                              <div class="space-y-3.5 text-sm">
                                  <div class="flex items-center justify-between">
                                      <span class="text-slate-500 font-semibold">Honorarium Bruto</span>
                                      <span class="text-slate-900 font-bold" x-text="formatRupiah(selectedDosen.mhs * selectedDosen.tarif)"></span>
                                  </div>
                                  <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                      <span class="text-slate-500 font-semibold flex items-center gap-1.5">
                                          Pajak Penghasilan (PPH21)
                                          <span class="text-[10px] bg-red-50 text-red-700 px-2 py-0.5 rounded-full font-bold border border-red-100" x-text="selectedDosen.statusDosen === 'Tetap' ? '5%' : '15%'"></span>
                                      </span>
                                      <span class="text-red-600 font-bold" x-text="formatRupiah(selectedDosen.statusDosen === 'Tetap' ? (selectedDosen.mhs * selectedDosen.tarif) * 0.05 : (selectedDosen.mhs * selectedDosen.tarif) * 0.15)"></span>
                                  </div>
                                  <div class="flex items-center justify-between pt-1">
                                      <span class="text-slate-900 font-extrabold text-base">Total Netto diterima</span>
                                      <span class="text-blue-700 font-black text-lg" x-text="formatRupiah((selectedDosen.mhs * selectedDosen.tarif) - (selectedDosen.statusDosen === 'Tetap' ? (selectedDosen.mhs * selectedDosen.tarif) * 0.05 : (selectedDosen.mhs * selectedDosen.tarif) * 0.15))"></span>
                                  </div>
                              </div>
                          </div>

                          <!-- Section: Transfer / Bank Details -->
                          <div class="bg-white rounded-2xl p-5 border border-slate-200/70 shadow-sm">
                              <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Tujuan Transfer Pembayaran</h4>
                              
                              <div class="flex items-center gap-4 bg-slate-50 border border-slate-100 p-4 rounded-xl">
                                  <div class="w-12 h-12 bg-amber-100 text-amber-700 rounded-lg flex items-center justify-center font-extrabold text-xs shadow-inner uppercase" x-text="selectedDosen.bank ? selectedDosen.bank.split(' ')[1] || selectedDosen.bank : ''"></div>
                                  <div>
                                      <div class="font-extrabold text-slate-900" x-text="selectedDosen.bank"></div>
                                      <div class="text-sm font-black text-blue-900 tracking-wider mt-0.5" x-text="selectedDosen.rekening"></div>
                                      <div class="text-xs text-slate-500 mt-0.5" x-text="'a.n. ' + selectedDosen.nama"></div>
                                  </div>
                              </div>
                          </div>

                      </div>

                      <!-- Footer buttons -->
                      <div class="bg-slate-100 p-4 px-6 border-t border-slate-200 flex items-center justify-between gap-3">
                          <button @click="showDetailModal = false" class="px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-sm rounded-xl transition-colors focus:outline-none">
                              Tutup
                          </button>
                          <div class="flex items-center gap-2">
                              <template x-if="selectedDosen.statusBayar !== 'Dibayarkan'">
                                  <button @click="selectedDosen.statusBayar = 'Dibayarkan'; showDetailModal = false" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-sm rounded-xl transition-all shadow-md hover:shadow-lg focus:outline-none">
                                      Setujui Pembayaran
                                  </button>
                              </template>
                              <template x-if="selectedDosen.statusBayar === 'Dibayarkan'">
                                  <span class="text-emerald-700 font-bold text-sm bg-emerald-100 px-4 py-2 rounded-xl border border-emerald-200">
                                      Telah Disetujui
                                  </span>
                              </template>
                          </div>
                      </div>

                 </div>
             </div>
        </div>

    </div>
</x-app-layout>
