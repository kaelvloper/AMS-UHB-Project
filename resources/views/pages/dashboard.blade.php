<x-app-layout>
@php $pageTitle = 'Dashboard'; @endphp
<x-slot name="pageTitle">Dashboard</x-slot>

{{-- ===== HEADER ===== --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Dashboard Akademik</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Selamat datang! Berikut ringkasan data akademik terkini.</p>
    </div>
    <div class="flex items-center gap-2">
        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-semibold">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Semester Genap 2024/2025
        </span>
        <button class="btn-primary text-xs px-3 py-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Export Laporan
        </button>
    </div>
</div>

{{-- ===== STAT CARDS ===== --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    {{-- Total Mahasiswa --}}
    <div class="stat-card col-span-1">
        <div class="stat-icon gradient-primary shadow-indigo-500/30">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Total Mahasiswa</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-0.5">4.872</p>
            <p class="text-xs text-emerald-600 dark:text-emerald-400 mt-1 flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                +8.2% dari semester lalu
            </p>
        </div>
    </div>

    {{-- Rata-rata IPK --}}
    <div class="stat-card col-span-1">
        <div class="stat-icon gradient-success shadow-emerald-500/30">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Rata-rata IPK</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-0.5">3.41</p>
            <p class="text-xs text-emerald-600 dark:text-emerald-400 mt-1 flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                +0.12 dari semester lalu
            </p>
        </div>
    </div>

    {{-- Mata Kuliah Aktif --}}
    <div class="stat-card col-span-1">
        <div class="stat-icon gradient-info shadow-cyan-500/30">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Mata Kuliah Aktif</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-0.5">148</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">3 Fakultas • 14 Prodi</p>
        </div>
    </div>

    {{-- Nilai Tertinggi --}}
    <div class="stat-card col-span-1">
        <div class="stat-icon gradient-warning shadow-amber-500/30">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
        </div>
        <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Mahasiswa IPK 4.00</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-0.5">37</p>
            <p class="text-xs text-amber-600 dark:text-amber-400 mt-1">Cumlaude terbaik semester ini</p>
        </div>
    </div>
</div>

{{-- ===== CHARTS ROW ===== --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">

    {{-- IPK Trend Chart --}}
    <div class="glass-card p-5 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Tren Rata-rata IPK per Semester</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Semua fakultas – 6 semester terakhir</p>
            </div>
            <select class="text-xs px-2 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 border-0 text-slate-600 dark:text-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                <option>Semua Fakultas</option>
                <option>Fak. Kesehatan</option>
                <option>Fak. Teknologi & Sains</option>
                <option>Fak. Ilmu Sosial</option>
            </select>
        </div>
        <div class="chart-wrapper" style="height:220px">
            <canvas id="ipkTrendChart"></canvas>
        </div>
    </div>

    {{-- Distribusi Grade Donut --}}
    <div class="glass-card p-5">
        <div class="mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Distribusi Grade</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Semester aktif 2024/2025</p>
        </div>
        <div class="chart-wrapper flex items-center justify-center" style="height:180px">
            <canvas id="gradeDonutChart"></canvas>
        </div>
        <div class="grid grid-cols-3 gap-2 mt-4">
            @foreach([['A','emerald','42%'],['B','blue','31%'],['C','amber','16%'],['D','orange','8%'],['E','red','3%']] as [$g,$c,$pct])
            <div class="flex items-center gap-1.5">
                <span class="w-2.5 h-2.5 rounded-sm bg-{{$c}}-400 flex-shrink-0"></span>
                <span class="text-xs text-slate-600 dark:text-slate-400 font-medium">{{$g}}: {{$pct}}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ===== FAKULTAS + AKTIVITAS ===== --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">

    {{-- Ranking Fakultas --}}
    <div class="glass-card p-5 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Rata-rata IPK per Fakultas</h2>
            <a href="{{ route('statistik.index') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline font-medium">Lihat detail →</a>
        </div>
        <div class="space-y-3">
            @foreach([
                ['Fak. Teknologi & Sains', 3.58, 'gradient-info', '1.203', '#06b6d4'],
                ['Fak. Kesehatan', 3.44, 'gradient-success', '2.104', '#10b981'],
                ['Fak. Ilmu Sosial', 3.31, 'gradient-primary', '1.565', '#6366f1'],
            ] as $i => [$fak, $ipk, $grad, $mhs, $color])
            <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors group">
                <span class="w-7 h-7 rounded-lg {{ $grad }} flex items-center justify-center text-white text-xs font-bold shadow-md flex-shrink-0">{{ $i+1 }}</span>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">{{ $fak }}</span>
                        <span class="text-sm font-bold text-slate-800 dark:text-slate-100 ml-2">{{ $ipk }}</span>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5">
                        <div class="h-1.5 rounded-full transition-all duration-700" style="width: {{ ($ipk/4)*100 }}%; background: {{ $color }};"></div>
                    </div>
                    <span class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $mhs }} mahasiswa</span>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Bar Chart Prodi --}}
        <div class="mt-4 pt-4 border-t border-slate-200/60 dark:border-slate-700/60">
            <p class="text-xs font-semibold text-slate-500 dark:text-slate-400 mb-3">Top 5 Program Studi berdasarkan IPK</p>
            <div class="chart-wrapper" style="height:150px">
                <canvas id="prodiBarChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="glass-card p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Aktivitas Terbaru</h2>
            <span class="text-xs px-2 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg font-medium">Live</span>
        </div>
        <div class="space-y-3 max-h-80 overflow-y-auto pr-1">
            @foreach([
                ['Nilai UTS Pemrograman Web diinput', 'Dosen: Andi Rahman, S.Kom', '2 menit lalu', 'bg-blue-500', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['Mahasiswa Baru Ditambahkan', 'Rafi Alfarizi – S1 Informatika', '15 menit lalu', 'bg-emerald-500', 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
                ['Transkrip Nilai Dicetak', 'NIM 2021001024 – S1 Farmasi', '32 menit lalu', 'bg-violet-500', 'M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['KRS Disetujui', 'Wulandari – D3 Keperawatan', '1 jam lalu', 'bg-amber-500', 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['Nilai Akhir Direkap', 'Algoritma & Pemrograman – S1 Informatika', '2 jam lalu', 'bg-cyan-500', 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['User Admin Login', 'admin@uhb.ac.id dari 192.168.1.10', '3 jam lalu', 'bg-slate-500', 'M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1'],
            ] as [$title, $sub, $time, $color, $icon])
            <div class="flex items-start gap-3">
                <div class="w-7 h-7 rounded-lg {{ $color }} flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-slate-700 dark:text-slate-300 leading-snug">{{ $title }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-500 mt-0.5 truncate">{{ $sub }}</p>
                    <p class="text-xs text-indigo-500 mt-0.5">{{ $time }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ===== QUICK LINKS ===== --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
    @foreach([
        ['Nilai Mahasiswa', 'Kelola & lihat nilai', route('nilai.index'), 'gradient-primary', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['Data Mahasiswa', 'Profil & biodata', route('mahasiswa.index'), 'gradient-info', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ['Statistik', 'Analisis & grafik', route('statistik.index'), 'gradient-success', 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
        ['Export Laporan', 'PDF & Excel', '#', 'gradient-warning', 'M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
    ] as [$label, $desc, $link, $grad, $icon])
    <a href="{{ $link }}" class="glass-card-hover p-4 flex flex-col gap-3 group">
        <div class="w-10 h-10 {{ $grad }} rounded-xl flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-200">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $label }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400">{{ $desc }}</p>
        </div>
    </a>
    @endforeach
</div>

{{-- ===== CHARTS SCRIPT ===== --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const isDark = document.documentElement.classList.contains('dark');
    const gridColor = isDark ? 'rgba(148,163,184,0.08)' : 'rgba(0,0,0,0.06)';
    const textColor = isDark ? '#94a3b8' : '#64748b';

    // --- IPK Trend Chart ---
    new Chart(document.getElementById('ipkTrendChart'), {
        type: 'line',
        data: {
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
            datasets: [
                { label: 'Fak. Kesehatan', data: [3.21, 3.28, 3.35, 3.38, 3.42, 3.44], borderColor: '#10b981', backgroundColor: 'rgba(16,185,129,0.08)', tension: 0.4, fill: true, pointBackgroundColor: '#10b981', pointRadius: 4, pointHoverRadius: 7 },
                { label: 'Fak. Teknologi & Sains', data: [3.30, 3.38, 3.45, 3.50, 3.54, 3.58], borderColor: '#06b6d4', backgroundColor: 'rgba(6,182,212,0.08)', tension: 0.4, fill: true, pointBackgroundColor: '#06b6d4', pointRadius: 4, pointHoverRadius: 7 },
                { label: 'Fak. Ilmu Sosial', data: [3.10, 3.18, 3.22, 3.26, 3.28, 3.31], borderColor: '#6366f1', backgroundColor: 'rgba(99,102,241,0.08)', tension: 0.4, fill: true, pointBackgroundColor: '#6366f1', pointRadius: 4, pointHoverRadius: 7 },
            ]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: textColor, boxWidth: 10, font: { family: 'Poppins', size: 11 } } } }, scales: { x: { grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 } } }, y: { min: 2.8, max: 4.0, grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 }, stepSize: 0.2 } } } }
    });

    // --- Grade Donut Chart ---
    new Chart(document.getElementById('gradeDonutChart'), {
        type: 'doughnut',
        data: {
            labels: ['A', 'B', 'C', 'D', 'E'],
            datasets: [{ data: [42, 31, 16, 8, 3], backgroundColor: ['#10b981','#3b82f6','#f59e0b','#f97316','#ef4444'], borderWidth: 0, hoverOffset: 8 }]
        },
        options: { responsive: true, maintainAspectRatio: false, cutout: '72%', plugins: { legend: { display: false }, tooltip: { callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed}%` } } } }
    });

    // --- Prodi Bar Chart ---
    new Chart(document.getElementById('prodiBarChart'), {
        type: 'bar',
        data: {
            labels: ['S1 Informatika', 'S1 Keperawatan', 'S1 Farmasi', 'S1 Manajemen', 'S1 Hukum'],
            datasets: [{ label: 'Rata-rata IPK', data: [3.58, 3.52, 3.48, 3.40, 3.35], backgroundColor: ['#6366f1','#06b6d4','#10b981','#f59e0b','#a855f7'], borderRadius: 6, borderSkipped: false }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { x: { grid: { display: false }, ticks: { color: textColor, font: { family: 'Poppins', size: 10 }, maxRotation: 30 } }, y: { min: 3.0, max: 4.0, grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 10 }, stepSize: 0.2 } } } }
    });
});
</script>
@endpush

</x-app-layout>
