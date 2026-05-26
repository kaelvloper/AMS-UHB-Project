<div x-data="dataGridApp(@js($students))" class="flex flex-col h-[calc(100vh-140px)]">

    {{-- =====================================================================
         MODAL: Tambah Kolom Baru
         ===================================================================== --}}
    <div
        x-show="showAddColModal"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display:none"
        @keydown.escape.window="showAddColModal = false"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showAddColModal = false"></div>

        {{-- Modal Panel --}}
        <div
            x-show="showAddColModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative w-full max-w-md bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden"
            style="display:none"
        >
            {{-- Modal Header --}}
            <div class="flex items-center justify-between px-6 py-5 border-b border-slate-100 dark:border-slate-800 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-base">Tambah Kolom Nilai</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400">Kolom baru akan muncul di semua baris</p>
                    </div>
                </div>
                <button @click="showAddColModal = false" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="px-6 py-5 space-y-4">

                {{-- Nama Kolom --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Nama Kolom <span class="text-rose-500">*</span></label>
                    <input
                        type="text"
                        x-model="newCol.label"
                        @keydown.enter="addColumn()"
                        placeholder="Contoh: Kuis 1, Tugas Besar, Presentasi..."
                        maxlength="30"
                        class="w-full px-4 py-2.5 border border-slate-200 dark:border-slate-700 rounded-xl text-sm bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all placeholder:text-slate-400"
                        x-ref="colNameInput"
                    >
                    <p class="text-xs text-slate-400 mt-1" x-text="newCol.label.length + '/30 karakter'"></p>
                </div>

                {{-- Tipe Nilai --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Tipe Nilai</label>
                    <div class="grid grid-cols-3 gap-2">
                        <template x-for="t in colTypes" :key="t.value">
                            <button
                                @click="newCol.type = t.value"
                                :class="newCol.type === t.value
                                    ? 'border-emerald-500 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 shadow-sm'
                                    : 'border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-slate-300'"
                                class="flex flex-col items-center gap-1 p-3 border-2 rounded-xl text-xs font-semibold transition-all"
                            >
                                <span x-text="t.icon" class="text-lg leading-none"></span>
                                <span x-text="t.label"></span>
                            </button>
                        </template>
                    </div>
                </div>

                {{-- Rentang Nilai (for number types) --}}
                <div x-show="newCol.type !== 'text'" class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Nilai Min</label>
                        <input type="number" x-model.number="newCol.min" class="w-full px-3 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-sm bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-600 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Nilai Max</label>
                        <input type="number" x-model.number="newCol.max" class="w-full px-3 py-2 border border-slate-200 dark:border-slate-700 rounded-xl text-sm bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/40 focus:border-emerald-500 transition-all">
                    </div>
                </div>

                {{-- Warna Kolom --}}
                <div>
                    <label class="block text-xs font-bold text-slate-600 dark:text-slate-400 mb-1.5 uppercase tracking-wide">Warna Kolom</label>
                    <div class="flex gap-2 flex-wrap">
                        <template x-for="c in colColors" :key="c.value">
                            <button
                                @click="newCol.color = c.value"
                                :title="c.label"
                                :class="[c.bg, c.ring, newCol.color === c.value ? 'ring-2 ring-offset-2 scale-110' : 'opacity-70 hover:opacity-100 hover:scale-110']"
                                class="w-8 h-8 rounded-lg transition-all"
                            ></button>
                        </template>
                    </div>
                </div>

                {{-- Preview --}}
                <div class="rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
                    <div class="px-3 py-1.5 text-xs font-bold text-slate-500 dark:text-slate-400 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 uppercase tracking-wide">Preview Kolom</div>
                    <div class="flex">
                        <div
                            class="px-4 py-2 text-xs font-bold text-center border-r border-slate-200 dark:border-slate-700 min-w-[80px]"
                            :class="getColHeaderClass(newCol.color)"
                            x-text="newCol.label || 'Nama Kolom'"
                        ></div>
                        <div class="px-4 py-2 text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1">
                            <span x-show="newCol.type !== 'text'" class="font-mono font-bold text-slate-700 dark:text-slate-300">0</span>
                            <span x-show="newCol.type === 'text'" class="text-slate-400 italic">teks bebas</span>
                            <span x-show="newCol.type !== 'text'" class="text-slate-400" x-text="'/ ' + newCol.max"></span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Modal Footer --}}
            <div class="flex items-center justify-between px-6 py-4 border-t border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-900/50">
                <button @click="showAddColModal = false" class="px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-xl transition-colors">
                    Batal
                </button>
                <button
                    @click="addColumn()"
                    :disabled="!newCol.label.trim()"
                    :class="newCol.label.trim() ? 'bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 shadow-md hover:shadow-lg hover:-translate-y-0.5' : 'bg-slate-200 dark:bg-slate-700 cursor-not-allowed opacity-60'"
                    class="flex items-center gap-2 px-5 py-2 text-white text-sm font-bold rounded-xl transition-all"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Kolom
                </button>
            </div>
        </div>
    </div>

    {{-- =====================================================================
         HEADER CONTROLS
         ===================================================================== --}}
    <div class="px-6 py-4 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between gap-4 shrink-0">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-uhb-600 flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"/></svg>
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-800 dark:text-slate-100">Data Nilai Panjang Mahasiswa</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Klik pada sel tabel untuk mengedit data secara langsung (inline editing).</p>
            </div>
        </div>

        <div class="flex items-center gap-3 flex-wrap">
            <select x-model="kategori" class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-uhb-500 outline-none transition-shadow shadow-sm">
                <option value="Overview">Semua Data (Overview)</option>
                <option value="Presensi">Data Presensi</option>
                <option value="LKM">Data LKM (Tugas &amp; Kuis)</option>
                <option value="Praktikum">Data Praktikum</option>
            </select>

            {{-- Filter Angkatan --}}
            <select x-model="filterAngkatan" class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-uhb-500 outline-none transition-shadow shadow-sm">
                <option value="">Semua Angkatan</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>

            {{-- Filter Prodi --}}
            <select x-model="filterProdi" class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-lg px-3 py-2 text-sm font-semibold text-slate-700 dark:text-slate-200 focus:ring-2 focus:ring-uhb-500 outline-none transition-shadow shadow-sm">
                <option value="">Semua Prodi</option>
                <optgroup label="Teknologi &amp; Sains">
                    <option value="S1 Informatika">S1 Informatika</option>
                    <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
                    <option value="S1 Teknik Robotika &amp; KA">S1 Teknik Robotika &amp; KA</option>
                </optgroup>
                <optgroup label="Ilmu Sosial">
                    <option value="S1 Manajemen">S1 Manajemen</option>
                    <option value="S1 Hukum">S1 Hukum</option>
                    <option value="S1 Akuntansi">S1 Akuntansi</option>
                </optgroup>
                <optgroup label="Kesehatan">
                    <option value="S1 Keperawatan">S1 Keperawatan</option>
                    <option value="S1 Farmasi">S1 Farmasi</option>
                </optgroup>
            </select>

            {{-- Row counter --}}
            <span class="text-xs text-slate-500 dark:text-slate-400 px-2 py-1 bg-slate-100 dark:bg-slate-800 rounded-lg" x-text="visibleCount + ' mahasiswa'"></span>

            <!-- Flash Message Placeholder -->
            @if(session()->has('success'))
                <span class="text-sm font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 anim-fade">
                    {{ session('success') }}
                </span>
            @endif

            {{-- Tambah Kolom Button --}}
            <button
                @click="openAddColModal()"
                class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white text-sm font-bold rounded-lg shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Kolom
            </button>

            <button @click="saveToServer()" class="flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-lg shadow-sm transition-colors">
                <svg x-show="!isSaving" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                <svg x-show="isSaving" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                <span x-text="isSaving ? 'Menyimpan...' : 'Simpan Semua'"></span>
            </button>
        </div>
    </div>

    <!-- LKM Mode Banner -->
    <div
        x-show="kategori === 'LKM'"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="mx-6 mt-3 shrink-0 flex items-center gap-3 px-4 py-2.5 bg-gradient-to-r from-violet-50 to-indigo-50 dark:from-violet-900/20 dark:to-indigo-900/20 border border-violet-200 dark:border-violet-800 rounded-xl"
        style="display:none"
    >
        <svg class="w-4 h-4 text-violet-600 dark:text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        <span class="text-xs font-semibold text-violet-700 dark:text-violet-300">Mode LKM (Tugas &amp; Kuis) aktif — P1 hingga P15 menampilkan nilai per pertemuan. Warna <span class="text-emerald-600 font-bold">hijau</span> = nilai aman (≥75), warna <span class="text-rose-500 font-bold">merah</span> = belum mengerjakan (0 atau kosong).</span>
    </div>

    {{-- =====================================================================
         TABLE CONTAINER
         ===================================================================== --}}
    <div class="flex-1 overflow-auto bg-white dark:bg-slate-900 border-x border-b border-slate-200 dark:border-slate-800 rounded-b-xl relative custom-scrollbar mt-3">
        <table class="w-max min-w-full border-collapse text-sm">
            <thead class="sticky top-0 z-20 bg-slate-100 dark:bg-slate-800 shadow-[0_1px_0_0_#e2e8f0] dark:shadow-[0_1px_0_0_#1e293b]">
                <tr>
                    <!-- ==================== STICKY COLUMNS ==================== -->
                    <th class="sticky left-0 z-30 bg-slate-100 dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-28">NIM</th>
                    <th class="sticky left-28 z-30 bg-slate-100 dark:bg-slate-800 border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-left font-bold text-slate-700 dark:text-slate-200 w-64 shadow-[1px_0_0_0_#e2e8f0] dark:shadow-[1px_0_0_0_#1e293b]">NAMA LENGKAP</th>
                    <th class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-24">Angkatan</th>
                    <th class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-left font-bold text-slate-700 dark:text-slate-200 w-36">Prodi</th>
                    <th class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-left font-bold text-slate-700 dark:text-slate-200 w-44">Fakultas</th>

                    <!-- ==================== PRESENSI / OVERVIEW / PRAKTIKUM COLUMNS ==================== -->
                    @for($i=1; $i<=16; $i++)
                        <th x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-2 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-12 cursor-help" title="Pertemuan {{ $i }}">P{{ $i }}</th>
                    @endfor

                    <!-- Calculated columns: Alpa, Prosentase -->
                    <th x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-16">Alpa</th>
                    <th x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-24">Prosentase</th>

                    <!-- Editable Values (UTS, UAS, Kel) -->
                    <th x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-20">UTS</th>
                    <th x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-20">UAS</th>
                    <th x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-20">Nilai Kel</th>

                    <!-- ==================== LKM-SPECIFIC COLUMNS (P1–P15) ==================== -->
                    @for($p=1; $p<=15; $p++)
                        <th
                            x-show="kategori === 'LKM'"
                            class="border-r border-slate-200 dark:border-slate-700 px-2 py-2 text-center font-bold text-violet-700 dark:text-violet-300 w-14 cursor-help bg-violet-50/60 dark:bg-violet-900/20"
                            title="LKM Pertemuan {{ $p }}"
                        >P{{ $p }}</th>
                    @endfor

                    <!-- LKM Nilai Akhir column -->
                    <th
                        x-show="kategori === 'LKM'"
                        class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-violet-800 dark:text-violet-200 w-28 bg-violet-100/70 dark:bg-violet-900/30"
                    >Nilai Akhir</th>

                    <!-- ==================== FINAL / TOTAL COLUMNS ==================== -->
                    <th class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-20 bg-slate-50 dark:bg-slate-800/50">Total</th>
                    <th class="border-r border-slate-200 dark:border-slate-700 px-3 py-2 text-center font-bold text-slate-700 dark:text-slate-200 w-32">Nilai Partisipatif</th>

                    <!-- ==================== CUSTOM COLUMNS (dynamic) ==================== -->
                    <template x-for="(col, ci) in customColumns" :key="col.id">
                        <th
                            class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 text-center font-bold w-28 group/th relative"
                            :class="getColHeaderClass(col.color)"
                        >
                            <div class="flex items-center justify-center gap-1">
                                <span class="truncate max-w-[80px] text-xs" x-text="col.label"></span>
                                {{-- Delete button --}}
                                <button
                                    @click.stop="removeColumn(ci)"
                                    class="opacity-0 group-hover/th:opacity-100 transition-opacity ml-1 w-4 h-4 rounded-full bg-rose-500 hover:bg-rose-600 text-white flex items-center justify-center shrink-0"
                                    title="Hapus kolom ini"
                                >
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                            {{-- Type badge --}}
                            <div class="text-[9px] font-normal opacity-60 leading-none mt-0.5" x-text="col.type === 'text' ? 'Teks' : '0–' + col.max"></div>
                        </th>
                    </template>

                    <!-- "+" Add column shortcut in header -->
                    <th class="px-2 py-2 w-12">
                        <button
                            @click="openAddColModal()"
                            title="Tambah kolom baru"
                            class="w-7 h-7 rounded-lg bg-emerald-100 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-200 dark:hover:bg-emerald-900/60 flex items-center justify-center transition-colors mx-auto"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                <template x-for="(student, index) in localStudents" :key="student.nim">
                    <tr
                        x-show="(!filterAngkatan || student.angkatan === filterAngkatan) && (!filterProdi || student.prodi === filterProdi)"
                        class="hover:bg-blue-50/50 dark:hover:bg-blue-900/10 transition-colors group">

                        <!-- ==================== STICKY: NIM & NAMA ==================== -->
                        <td class="sticky left-0 z-10 bg-white dark:bg-slate-900 group-hover:bg-blue-50/50 dark:group-hover:bg-blue-900/10 border-r border-slate-200 dark:border-slate-700 px-3 py-1.5 text-center font-mono text-xs text-slate-600 dark:text-slate-400" x-text="student.nim"></td>
                        <td class="sticky left-28 z-10 bg-white dark:bg-slate-900 group-hover:bg-blue-50/50 dark:group-hover:bg-blue-900/10 border-r border-slate-200 dark:border-slate-700 px-3 py-1.5 text-left font-semibold text-slate-800 dark:text-slate-200 text-xs truncate shadow-[1px_0_0_0_#e2e8f0] dark:shadow-[1px_0_0_0_#1e293b]" x-text="student.nama"></td>
                        <td class="border-r border-slate-200 dark:border-slate-700 px-3 py-1.5 text-center text-xs font-bold text-indigo-600 dark:text-indigo-400" x-text="student.angkatan"></td>
                        <td class="border-r border-slate-200 dark:border-slate-700 px-3 py-1.5 text-center text-xs font-semibold text-slate-700 dark:text-slate-300" x-text="student.prodi"></td>
                        <td class="border-r border-slate-200 dark:border-slate-700 px-3 py-1.5 text-left text-xs text-slate-500 dark:text-slate-400" x-text="student.fakultas"></td>

                        <!-- ==================== PRESENSI CELLS P1-P16 ==================== -->
                        @for($pi=1; $pi<=16; $pi++)
                        <td x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 p-0 text-center relative select-none">
                            <select
                                x-model="student.presensi['P{{ $pi }}']"
                                @change="calculateRow(index)"
                                class="w-full h-full min-h-[32px] appearance-none bg-transparent text-center font-bold text-[11px] cursor-pointer focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                                :class="getColorClass(student.presensi['P{{ $pi }}'])">
                                <option value="H" class="text-slate-800 bg-white">H</option>
                                <option value="I" class="text-slate-800 bg-white">I</option>
                                <option value="S" class="text-slate-800 bg-white">S</option>
                                <option value="A" class="text-slate-800 bg-white">A</option>
                                <option value="" class="text-slate-800 bg-white">-</option>
                            </select>
                        </td>
                        @endfor

                        <!-- Calculated: Alpa & Prosentase -->
                        <td x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 text-center text-xs font-bold text-slate-600 dark:text-slate-400" x-text="calcAlpa(student)"></td>
                        <td x-show="['Overview', 'Presensi', 'Praktikum'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 text-center text-xs font-bold text-slate-800 dark:text-slate-200" x-text="calcProsentase(student) + '%'"></td>

                        <!-- Input Values: UTS, UAS, Kel -->
                        <td x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 p-0 relative">
                            <input type="number" min="0" max="100" x-model.number="student.uts" @input="calculateRow(index)" class="w-full h-full min-h-[32px] px-2 py-1 text-center bg-transparent text-xs font-semibold focus:bg-white dark:focus:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        </td>
                        <td x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 p-0 relative">
                            <input type="number" min="0" max="100" x-model.number="student.uas" @input="calculateRow(index)" class="w-full h-full min-h-[32px] px-2 py-1 text-center bg-transparent text-xs font-semibold focus:bg-white dark:focus:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        </td>
                        <td x-show="['Overview', 'LKM'].includes(kategori)" class="border-r border-slate-200 dark:border-slate-700 p-0 relative">
                            <input type="number" min="0" max="100" x-model.number="student.nilai_kel" @input="calculateRow(index)" class="w-full h-full min-h-[32px] px-2 py-1 text-center bg-transparent text-xs font-semibold focus:bg-white dark:focus:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        </td>

                        <!-- ==================== LKM CELLS: P1-P15 ==================== -->
                        @for($lp=1; $lp<=15; $lp++)
                        <td
                            x-show="kategori === 'LKM'"
                            class="border-r border-slate-200 dark:border-slate-700 p-0 text-center relative"
                        >
                            <input
                                type="number"
                                min="0"
                                max="100"
                                x-model.number="student.lkm['P{{ $lp }}']"
                                @input="recalcLkm(index)"
                                :class="getLkmColorClass(student.lkm['P{{ $lp }}'])"
                                class="w-full h-full min-h-[32px] px-1 py-1 text-center text-xs font-bold focus:outline-none focus:ring-2 focus:ring-inset focus:ring-violet-500 transition-colors duration-150"
                            >
                        </td>
                        @endfor

                        <!-- LKM Nilai Akhir -->
                        <td
                            x-show="kategori === 'LKM'"
                            class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 text-center font-black text-sm bg-violet-50 dark:bg-violet-900/20"
                            :class="student.nilai_akhir_lkm >= 75
                                ? 'text-emerald-700 dark:text-emerald-400'
                                : (student.nilai_akhir_lkm > 0 ? 'text-amber-700 dark:text-amber-400' : 'text-rose-600 dark:text-rose-400')"
                            x-text="student.nilai_akhir_lkm > 0 ? student.nilai_akhir_lkm.toFixed(1) : '0'"
                        ></td>

                        <!-- ==================== TOTAL & PARTISIPATIF ==================== -->
                        <td class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 text-center text-xs font-black text-slate-800 dark:text-white bg-slate-50 dark:bg-slate-800/50" x-text="calcTotal(student).toFixed(1)"></td>
                        <td class="border-r border-slate-200 dark:border-slate-700 px-2 py-1.5 p-0 relative">
                            <input type="number" min="0" max="100" x-model.number="student.partisipatif" class="w-full h-full min-h-[32px] px-2 py-1 text-center bg-transparent text-xs font-semibold focus:bg-white dark:focus:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                        </td>

                        <!-- ==================== CUSTOM COLUMN CELLS ==================== -->
                        <template x-for="col in customColumns" :key="col.id">
                            <td class="border-r border-slate-200 dark:border-slate-700 p-0 relative">
                                <template x-if="col.type !== 'text'">
                                    <input
                                        type="number"
                                        :min="col.min"
                                        :max="col.max"
                                        x-model.number="student.custom[col.id]"
                                        :class="getCustomColorClass(student.custom[col.id], col)"
                                        class="w-full h-full min-h-[32px] px-2 py-1 text-center text-xs font-bold focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500 transition-colors duration-150"
                                    >
                                </template>
                                <template x-if="col.type === 'text'">
                                    <input
                                        type="text"
                                        x-model="student.custom[col.id]"
                                        class="w-full h-full min-h-[32px] px-2 py-1 text-center bg-transparent text-xs font-semibold focus:bg-white dark:focus:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500"
                                    >
                                </template>
                            </td>
                        </template>

                        <!-- Empty cell under "+" header -->
                        <td class="w-12"></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <!-- Footer Legend -->
    <div class="mt-4 shrink-0 flex items-start gap-4 flex-wrap">

        <!-- Presensi / Overview / Praktikum Legend -->
        <table x-show="kategori !== 'LKM'" class="border-collapse border border-slate-300 dark:border-slate-600 text-[11px] bg-white dark:bg-slate-800">
            <thead>
                <tr><th colspan="2" class="border border-slate-300 dark:border-slate-600 px-3 py-1 bg-slate-100 dark:bg-slate-700 text-left font-bold text-slate-700 dark:text-slate-200">Keterangan</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-slate-300 dark:border-slate-600 px-2 py-0.5 text-center font-bold w-16 text-emerald-600 bg-emerald-50">H</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-0.5 text-slate-700 dark:text-slate-300">Hadir</td>
                </tr>
                <tr>
                    <td class="border border-slate-300 dark:border-slate-600 px-2 py-0.5 text-center font-bold w-16 text-amber-600 bg-amber-50">I</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-0.5 text-slate-700 dark:text-slate-300">Ijin</td>
                </tr>
                <tr>
                    <td class="border border-slate-300 dark:border-slate-600 px-2 py-0.5 text-center font-bold w-16 text-blue-600 bg-blue-50">S</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-0.5 text-slate-700 dark:text-slate-300">Sakit</td>
                </tr>
                <tr>
                    <td class="border border-slate-300 dark:border-slate-600 px-2 py-0.5 text-center font-bold w-16 text-rose-600 bg-rose-50">A / Blank</td>
                    <td class="border border-slate-300 dark:border-slate-600 px-3 py-0.5 text-slate-700 dark:text-slate-300">Alpha</td>
                </tr>
            </tbody>
        </table>

        <!-- LKM-specific Legend -->
        <table
            x-show="kategori === 'LKM'"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="border-collapse border border-violet-300 dark:border-violet-700 text-[11px] bg-white dark:bg-slate-800"
            style="display:none"
        >
            <thead>
                <tr><th colspan="2" class="border border-violet-300 dark:border-violet-700 px-3 py-1 bg-violet-100 dark:bg-violet-900/40 text-left font-bold text-violet-800 dark:text-violet-200">Keterangan Nilai LKM</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-center font-bold w-28 text-emerald-700 bg-emerald-50 dark:bg-emerald-900/30">75 – 100</td>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-slate-700 dark:text-slate-300">Nilai aman — tugas/kuis sudah dikerjakan</td>
                </tr>
                <tr>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-center font-bold w-28 text-rose-600 bg-rose-50 dark:bg-rose-900/30">0 / Kosong</td>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-slate-700 dark:text-slate-300">Belum mengerjakan tugas/kuis di pertemuan tersebut</td>
                </tr>
                <tr>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-center font-bold w-28 text-amber-700 bg-amber-50 dark:bg-amber-900/30">1 – 74</td>
                    <td class="border border-violet-300 dark:border-violet-700 px-3 py-0.5 text-slate-700 dark:text-slate-300">Nilai di bawah standar minimum</td>
                </tr>
            </tbody>
        </table>

        <!-- Custom columns summary -->
        <div x-show="customColumns.length > 0" class="flex items-center gap-2 flex-wrap">
            <span class="text-[11px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wide">Kolom Tambahan:</span>
            <template x-for="(col, ci) in customColumns" :key="col.id">
                <span
                    class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full text-[11px] font-semibold border"
                    :class="getColBadgeClass(col.color)"
                >
                    <span x-text="col.label"></span>
                    <button @click="removeColumn(ci)" class="hover:opacity-80 transition-opacity">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </span>
            </template>
        </div>

    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('dataGridApp', (wireStudents) => ({
    localStudents: wireStudents,
    kategori: 'Overview',
    isSaving: false,

    // ── Filter State ─────────────────────────────────────────────────────
    filterAngkatan: '',
    filterProdi: '',

    // ── Visible row counter (reactive) ───────────────────────────────────
    get visibleCount() {
        return this.localStudents.filter(s =>
            (!this.filterAngkatan || s.angkatan === this.filterAngkatan) &&
            (!this.filterProdi    || s.prodi    === this.filterProdi)
        ).length;
    },

    // ── Custom Columns State ──────────────────────────────────────────────
    customColumns: [],      // [{id, label, type, min, max, color}]
    showAddColModal: false,
    newCol: { label: '', type: 'number', min: 0, max: 100, color: 'emerald' },

    colTypes: [
        { value: 'number',  label: 'Angka',   icon: '🔢' },
        { value: 'percent', label: 'Persen',  icon: '💯' },
        { value: 'text',    label: 'Teks',    icon: '📝' },
    ],

    colColors: [
        { value: 'emerald', label: 'Hijau',  bg: 'bg-emerald-400', ring: 'ring-emerald-500' },
        { value: 'blue',    label: 'Biru',   bg: 'bg-blue-400',    ring: 'ring-blue-500'    },
        { value: 'violet',  label: 'Ungu',   bg: 'bg-violet-400',  ring: 'ring-violet-500'  },
        { value: 'amber',   label: 'Kuning', bg: 'bg-amber-400',   ring: 'ring-amber-500'   },
        { value: 'rose',    label: 'Merah',  bg: 'bg-rose-400',    ring: 'ring-rose-500'    },
        { value: 'cyan',    label: 'Cyan',   bg: 'bg-cyan-400',    ring: 'ring-cyan-500'    },
        { value: 'slate',   label: 'Abu',    bg: 'bg-slate-400',   ring: 'ring-slate-500'   },
    ],

    openAddColModal() {
        this.newCol = { label: '', type: 'number', min: 0, max: 100, color: 'emerald' };
        this.showAddColModal = true;
        this.$nextTick(() => this.$refs.colNameInput?.focus());
    },

    addColumn() {
        const label = this.newCol.label.trim();
        if (!label) return;

        const id = 'col_' + Date.now();
        const col = { ...this.newCol, id, label };
        this.customColumns.push(col);

        // Initialise value for every student
        this.localStudents = this.localStudents.map(s => {
            if (!s.custom) s.custom = {};
            s.custom[id] = col.type !== 'text' ? 0 : '';
            return s;
        });

        this.showAddColModal = false;
    },

    removeColumn(ci) {
        const col = this.customColumns[ci];
        if (!confirm(`Hapus kolom "${col.label}"? Data yang sudah diisi akan hilang.`)) return;
        this.customColumns.splice(ci, 1);
        // Remove property from all students
        this.localStudents = this.localStudents.map(s => {
            if (s.custom) delete s.custom[col.id];
            return s;
        });
    },

    // ── Column header / badge colour helpers ──────────────────────────────
    getColHeaderClass(color) {
        const map = {
            emerald: 'bg-emerald-50 dark:bg-emerald-900/20 text-emerald-800 dark:text-emerald-200',
            blue:    'bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-200',
            violet:  'bg-violet-50 dark:bg-violet-900/20 text-violet-800 dark:text-violet-200',
            amber:   'bg-amber-50 dark:bg-amber-900/20 text-amber-800 dark:text-amber-200',
            rose:    'bg-rose-50 dark:bg-rose-900/20 text-rose-800 dark:text-rose-200',
            cyan:    'bg-cyan-50 dark:bg-cyan-900/20 text-cyan-800 dark:text-cyan-200',
            slate:   'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300',
        };
        return map[color] || map.emerald;
    },

    getColBadgeClass(color) {
        const map = {
            emerald: 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-900/30 dark:text-emerald-300 dark:border-emerald-700',
            blue:    'bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-700',
            violet:  'bg-violet-50 text-violet-700 border-violet-200 dark:bg-violet-900/30 dark:text-violet-300 dark:border-violet-700',
            amber:   'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-900/30 dark:text-amber-300 dark:border-amber-700',
            rose:    'bg-rose-50 text-rose-700 border-rose-200 dark:bg-rose-900/30 dark:text-rose-300 dark:border-rose-700',
            cyan:    'bg-cyan-50 text-cyan-700 border-cyan-200 dark:bg-cyan-900/30 dark:text-cyan-300 dark:border-cyan-700',
            slate:   'bg-slate-100 text-slate-600 border-slate-300 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-600',
        };
        return map[color] || map.emerald;
    },

    // ── Custom cell colour coding (green=max, amber=mid, rose=zero) ───────
    getCustomColorClass(val, col) {
        if (col.type === 'text') return 'bg-transparent';
        const n = parseFloat(val);
        if (isNaN(n) || n === 0) return 'bg-transparent';
        const ratio = n / (col.max || 100);
        if (ratio >= 0.75) return 'bg-emerald-50 text-emerald-800 dark:bg-emerald-900/20 dark:text-emerald-300';
        if (ratio >= 0.5)  return 'bg-amber-50 text-amber-800 dark:bg-amber-900/20 dark:text-amber-300';
        return 'bg-rose-50 text-rose-700 dark:bg-rose-900/20 dark:text-rose-300';
    },

    init() {
        // Ensure every student has lkm, nilai_akhir_lkm, and custom objects
        this.localStudents = this.localStudents.map(s => {
            if (!s.lkm) {
                s.lkm = {};
                for (let p = 1; p <= 15; p++) s.lkm['P'+p] = 0;
            }
            if (s.nilai_akhir_lkm == null) s.nilai_akhir_lkm = 0;
            if (!s.custom) s.custom = {};
            return s;
        });
    },

    // ── Presensi colour coding ──────────────────────────────────────────────
    getColorClass(val) {
        if (val === 'H') return 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400';
        if (val === 'I') return 'bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400';
        if (val === 'S') return 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400';
        if (val === 'A' || val === '') return 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400';
        return '';
    },

    // ── LKM conditional cell colour coding ─────────────────────────────────
    getLkmColorClass(val) {
        const n = parseFloat(val);
        if (isNaN(n) || n === 0 || val === null || val === '') {
            return 'bg-rose-50 text-rose-700 dark:bg-rose-900/30 dark:text-rose-300';
        }
        if (n >= 75) {
            return 'bg-emerald-50 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300';
        }
        return 'bg-amber-50 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300';
    },

    // ── Presensi calculations ───────────────────────────────────────────────
    calcAlpa(student) {
        let count = 0;
        for (let i = 1; i <= 16; i++) {
            let v = student.presensi['P'+i];
            if (v === 'A' || v === '' || v == null) count++;
        }
        return count;
    },

    calcProsentase(student) {
        let alpa = this.calcAlpa(student);
        let pct = ((16 - alpa) / 16) * 100;
        return Math.round(pct);
    },

    // ── LKM recalculation ───────────────────────────────────────────────────
    recalcLkm(index) {
        const student = this.localStudents[index];
        let total = 0;
        for (let p = 1; p <= 15; p++) {
            total += parseFloat(student.lkm['P'+p]) || 0;
        }
        student.nilai_akhir_lkm = Math.round((total / 15) * 10) / 10;
    },

    // ── Grand total calculation ─────────────────────────────────────────────
    calcTotal(student) {
        let pros = this.calcProsentase(student);
        let uts  = parseFloat(student.uts)       || 0;
        let uas  = parseFloat(student.uas)       || 0;
        let kel  = parseFloat(student.nilai_kel) || 0;
        // Presensi 10%, UTS 30%, UAS 40%, Kelompok 20%
        return (pros * 0.1) + (uts * 0.3) + (uas * 0.4) + (kel * 0.2);
    },

    calculateRow(index) {
        // Alpine automatically reacts; placeholder for future row-level logic
    },

    async saveToServer() {
        this.isSaving = true;
        await $wire.saveData(this.localStudents);
        this.isSaving = false;
    }
}));
});
</script>
