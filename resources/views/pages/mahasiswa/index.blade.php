<x-app-layout>
<x-slot name="pageTitle">Data Mahasiswa</x-slot>

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Data Mahasiswa</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Daftar seluruh mahasiswa aktif dari semua fakultas</p>
    </div>
    <button class="btn-primary text-xs px-4 py-2 self-start sm:self-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Mahasiswa
    </button>
</div>

{{-- Filters --}}
<div class="glass-card p-4 mb-5">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
        <div class="relative sm:col-span-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0"/></svg>
            <input type="text" placeholder="Cari nama atau NIM..." class="input-modern pl-9">
        </div>
        <select class="select-modern">
            <option>Semua Fakultas</option>
            <option>Fak. Kesehatan</option>
            <option>Fak. Teknologi & Sains</option>
            <option>Fak. Ilmu Sosial</option>
        </select>
        <select class="select-modern">
            <option>Semua Angkatan</option>
            @for($y = 2025; $y >= 2018; $y--)<option>Angkatan {{ $y }}</option>@endfor
        </select>
    </div>
</div>

{{-- Card Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    @php
    $students = [
        ['Rizal Fathur Rahman','2021001001','S1 Informatika','Fak. Teknologi & Sains',3.75,'Aktif','emerald','2021'],
        ['Wulandari Putri','2021002001','D3 Keperawatan','Fak. Kesehatan',3.44,'Aktif','emerald','2021'],
        ['Ahmad Bagas Saputra','2022001015','S1 Farmasi','Fak. Kesehatan',3.85,'Aktif','emerald','2022'],
        ['Siti Nurhaliza','2021003002','S1 Hukum','Fak. Ilmu Sosial',3.28,'Aktif','emerald','2021'],
        ['Deden Maulana','2023001008','S1 Informatika','Fak. Teknologi & Sains',3.80,'Aktif','emerald','2023'],
        ['Fitria Ramadhani','2021004003','S1 Manajemen','Fak. Ilmu Sosial',3.18,'Cuti','amber','2021'],
        ['Muhammad Irfan','2022003010','S1 Teknik Robotika & KA','Fak. Teknologi & Sains',3.95,'Aktif','emerald','2022'],
        ['Dewi Anjani','2021002005','S1 Kebidanan','Fak. Kesehatan',3.55,'Aktif','emerald','2021'],
        ['Fauzan Akbar','2020001020','S1 Sistem Informasi','Fak. Teknologi & Sains',3.05,'Aktif','emerald','2020'],
        ['Nurul Azizah','2022004012','S1 Bisnis Digital','Fak. Ilmu Sosial',3.60,'Aktif','emerald','2022'],
        ['Rina Kartika','2023002003','S1 Pendidikan Bahasa Inggris','Fak. Ilmu Sosial',3.55,'Aktif','emerald','2023'],
        ['Bima Saputra','2021005004','D4 Keperawatan Anestesiologi','Fak. Kesehatan',3.42,'Aktif','emerald','2021'],
    ];
    $avatarColors = ['6366f1','8b5cf6','06b6d4','10b981','f59e0b','ef4444','a855f7','0891b2'];
    @endphp

    @foreach($students as $i => [$nama,$nim,$prodi,$fak,$ipk,$status,$statusColor,$angkatan])
    @php $bgColor = $avatarColors[$i % count($avatarColors)]; @endphp
    <a href="{{ route('mahasiswa.show', $nim) }}" class="glass-card-hover p-5 flex flex-col gap-4 group">
        {{-- Top: Avatar + Status --}}
        <div class="flex items-start justify-between">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background={{ $bgColor }}&color=fff&size=60&bold=true"
                 class="w-12 h-12 rounded-xl object-cover ring-2 ring-white dark:ring-slate-800 shadow-md group-hover:scale-105 transition-transform duration-200" alt="{{ $nama }}">
            <span class="text-xs px-2 py-1 rounded-full font-semibold bg-{{ $statusColor }}-100 dark:bg-{{ $statusColor }}-900/30 text-{{ $statusColor }}-700 dark:text-{{ $statusColor }}-400">{{ $status }}</span>
        </div>

        {{-- Info --}}
        <div class="flex-1">
            <h3 class="font-semibold text-slate-800 dark:text-slate-200 text-sm leading-tight">{{ $nama }}</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $nim }} · {{ $angkatan }}</p>
            <p class="text-xs text-slate-600 dark:text-slate-400 mt-2 leading-tight">{{ $prodi }}</p>
            <p class="text-xs text-slate-400 dark:text-slate-500">{{ $fak }}</p>
        </div>

        {{-- IPK --}}
        <div class="flex items-center justify-between pt-3 border-t border-slate-200/60 dark:border-slate-700/60">
            <span class="text-xs text-slate-500 dark:text-slate-400 font-medium">IPK</span>
            <span class="text-base font-bold {{ $ipk >= 3.5 ? 'text-emerald-600 dark:text-emerald-400' : ($ipk >= 3.0 ? 'text-blue-600 dark:text-blue-400' : 'text-amber-600 dark:text-amber-400') }}">{{ number_format($ipk,2) }}</span>
        </div>

        {{-- IPK Progress Bar --}}
        <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5 -mt-2">
            <div class="h-1.5 rounded-full transition-all duration-700 {{ $ipk >= 3.5 ? 'bg-emerald-500' : ($ipk >= 3.0 ? 'bg-blue-500' : 'bg-amber-500') }}" style="width: {{ ($ipk/4)*100 }}%"></div>
        </div>
    </a>
    @endforeach
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between mt-5">
    <p class="text-xs text-slate-500 dark:text-slate-400">Menampilkan 12 dari 4.872 mahasiswa</p>
    <div class="flex items-center gap-1">
        <button class="px-3 py-1.5 text-xs rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-500 hover:border-indigo-300 hover:text-indigo-600 transition-colors disabled:opacity-40" disabled>← Prev</button>
        @foreach([1,2,3,'...',406] as $p)
        <button class="px-3 py-1.5 text-xs rounded-lg {{ $p === 1 ? 'gradient-primary text-white shadow-sm' : 'bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-indigo-300 hover:text-indigo-600' }} transition-colors">{{ $p }}</button>
        @endforeach
        <button class="px-3 py-1.5 text-xs rounded-lg bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-400 hover:border-indigo-300 hover:text-indigo-600 transition-colors">Next →</button>
    </div>
</div>

</x-app-layout>
