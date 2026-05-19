<x-app-layout>
<x-slot name="pageTitle">Statistik Akademik</x-slot>

{{-- Header --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-100">Statistik Akademik</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Analisis komprehensif performa akademik seluruh mahasiswa</p>
    </div>
    <div class="flex items-center gap-2">
        <select class="input-modern text-xs max-w-xs">
            <option>Semester Genap 2024/2025</option>
            <option>Semester Ganjil 2024/2025</option>
            <option>Semester Genap 2023/2024</option>
        </select>
    </div>
</div>

{{-- Top KPI Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
    @foreach([
        ['Total Mahasiswa','4.872','+8.2%','emerald','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','gradient-primary'],
        ['Rata-rata IPK','3.41','+0.12','emerald','M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z','gradient-success'],
        ['Tingkat Kelulusan','94.3%','+1.5%','emerald','M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z','gradient-info'],
        ['Grade A','42%','+3%','emerald','M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z','gradient-warning'],
    ] as [$label,$val,$delta,$deltaColor,$icon,$grad])
    <div class="stat-card">
        <div class="stat-icon {{ $grad }}"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg></div>
        <div>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">{{ $label }}</p>
            <p class="text-2xl font-bold text-slate-800 dark:text-slate-100 mt-0.5">{{ $val }}</p>
            <p class="text-xs text-{{ $deltaColor }}-600 dark:text-{{ $deltaColor }}-400 mt-1 flex items-center gap-0.5">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                {{ $delta }} semester lalu
            </p>
        </div>
    </div>
    @endforeach
</div>

{{-- Charts Row 1 --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

    {{-- IPK per Fakultas Bar --}}
    <div class="glass-card p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">IPK Rata-rata per Fakultas</h2>
        </div>
        <div class="chart-wrapper" style="height:220px"><canvas id="fakultasBarChart"></canvas></div>
    </div>

    {{-- Grade Distribution --}}
    <div class="glass-card p-5">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Distribusi Grade Mahasiswa</h2>
        </div>
        <div class="chart-wrapper" style="height:220px"><canvas id="gradeBarChart"></canvas></div>
    </div>
</div>

{{-- Charts Row 2 --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-5">

    {{-- Tren IPK 6 Semester --}}
    <div class="glass-card p-5 lg:col-span-2">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Tren IPK 6 Semester – Per Program Studi</h2>
        </div>
        <div class="chart-wrapper" style="height:220px"><canvas id="prodiTrendChart"></canvas></div>
    </div>

    {{-- Statistik Kelulusan Donut --}}
    <div class="glass-card p-5">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm mb-4">Status Akademik</h2>
        <div class="chart-wrapper flex items-center justify-center" style="height:180px">
            <canvas id="statusDonut"></canvas>
        </div>
        <div class="space-y-2 mt-4">
            @foreach([['Aktif','94.3%','emerald'],['Cuti','3.1%','amber'],['DO','1.4%','red'],['Lulus','1.2%','blue']] as [$s,$p,$c])
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-{{$c}}-500"></span><span class="text-xs text-slate-600 dark:text-slate-400">{{$s}}</span></div>
                <span class="text-xs font-bold text-{{$c}}-600 dark:text-{{$c}}-400">{{$p}}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Ranking + Heatmap --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">

    {{-- Ranking Mahasiswa Terbaik --}}
    <div class="glass-card overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-slate-200/60 dark:border-slate-700/60">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">🏆 Ranking Mahasiswa Terbaik</h2>
            <span class="text-xs text-indigo-600 dark:text-indigo-400 font-semibold">Top 8 IPK</span>
        </div>
        <div class="divide-y divide-slate-100 dark:divide-slate-800">
            @foreach([
                [1,'Muhammad Irfan','S1 Teknik Robotika & KA',4.00,'🥇','amber'],
                [2,'Ahmad Bagas Saputra','S1 Farmasi',3.95,'🥈','slate'],
                [3,'Rizal Fathur Rahman','S1 Informatika',3.82,'🥉','amber'],
                [4,'Dewi Anjani','S1 Kebidanan',3.78,'⭐','indigo'],
                [5,'Nurul Azizah','S1 Bisnis Digital',3.75,'⭐','indigo'],
                [6,'Siti Nurhaliza','S1 Hukum',3.72,'⭐','indigo'],
                [7,'Deden Maulana','S1 Informatika',3.70,'⭐','indigo'],
                [8,'Fitria Ramadhani','S1 Manajemen',3.68,'⭐','indigo'],
            ] as [$rank,$nama,$prodi,$ipk,$icon,$c])
            <div class="flex items-center gap-3 px-5 py-3 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                <span class="text-lg leading-none w-6 text-center">{{ $icon }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=6366f1&color=fff&size=36&bold=true" class="w-8 h-8 rounded-lg flex-shrink-0" alt="">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-slate-700 dark:text-slate-300 truncate">{{ $nama }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 truncate">{{ $prodi }}</p>
                </div>
                <span class="text-sm font-bold {{ $ipk >= 3.9 ? 'text-amber-600 dark:text-amber-400' : ($ipk >= 3.75 ? 'text-emerald-600 dark:text-emerald-400' : 'text-blue-600 dark:text-blue-400') }}">{{ number_format($ipk,2) }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Heatmap Performa Akademik --}}
    <div class="glass-card p-5">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm mb-4">Heatmap Performa – Rata-rata Nilai per Prodi & Semester</h2>
        @php
        $prodis = ['S1 Informatika','S1 Keperawatan','S1 Farmasi','S1 Manajemen','S1 Hukum'];
        $semesters = ['Sem 1','Sem 2','Sem 3','Sem 4','Sem 5','Sem 6'];
        $heatData = [
            [88,85,84,86,87,89],
            [80,82,81,83,82,84],
            [85,87,86,88,89,91],
            [75,76,74,77,78,79],
            [72,73,71,74,75,76],
        ];
        @endphp
        <div class="overflow-x-auto">
            <table class="w-full text-xs">
                <thead>
                    <tr>
                        <th class="text-left py-1 pr-3 text-slate-500 dark:text-slate-400 font-medium w-28">Prodi</th>
                        @foreach($semesters as $s)
                        <th class="text-center py-1 px-1 text-slate-500 dark:text-slate-400 font-medium">{{ $s }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($prodis as $pi => $prodi)
                    <tr>
                        <td class="py-1.5 pr-3 text-slate-600 dark:text-slate-400 font-medium leading-tight">{{ $prodi }}</td>
                        @foreach($heatData[$pi] as $val)
                        @php
                        $intensity = ($val - 70) / 25;
                        $r = round(99 + (16-99)*(1-$intensity));
                        $g = round(102 + (185-102)*$intensity);
                        $b = round(241 + (129-241)*$intensity);
                        $alpha = 0.15 + ($intensity * 0.70);
                        @endphp
                        <td class="py-1.5 px-1">
                            <div class="flex items-center justify-center w-10 h-7 rounded-lg text-xs font-bold transition-all hover:scale-110 cursor-default"
                                 style="background: rgba({{ $r }},{{ $g }},{{ $b }},{{ $alpha }}); color: {{ $intensity > 0.5 ? '#065f46' : '#1e3a8a' }};"
                                 title="{{ $prodi }} – {{ $semesters[array_search($val, $heatData[$pi])] }}: {{ $val }}">
                                {{ $val }}
                            </div>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center gap-2 mt-3">
            <span class="text-xs text-slate-500 dark:text-slate-400">Rendah</span>
            <div class="flex-1 h-2 rounded-full" style="background: linear-gradient(to right, rgba(99,102,241,0.2), rgba(16,185,129,0.85));"></div>
            <span class="text-xs text-slate-500 dark:text-slate-400">Tinggi</span>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDark = document.documentElement.classList.contains('dark');
    const gridColor = isDark ? 'rgba(148,163,184,0.08)' : 'rgba(0,0,0,0.06)';
    const textColor = isDark ? '#94a3b8' : '#64748b';

    // Fakultas Bar
    new Chart(document.getElementById('fakultasBarChart'), {
        type: 'bar',
        data: {
            labels: ['Fak. Kesehatan', 'Fak. Teknologi & Sains', 'Fak. Ilmu Sosial'],
            datasets: [
                { label: 'Sem Ganjil', data: [3.38, 3.52, 3.26], backgroundColor: 'rgba(99,102,241,0.7)', borderRadius: 6, borderSkipped: false },
                { label: 'Sem Genap', data: [3.44, 3.58, 3.31], backgroundColor: 'rgba(6,182,212,0.7)', borderRadius: 6, borderSkipped: false },
            ]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: textColor, boxWidth: 10, font: { family: 'Poppins', size: 11 } } } }, scales: { x: { grid: { display: false }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 } } }, y: { min: 3.0, max: 4.0, grid: { color: gridColor }, ticks: { color: textColor, stepSize: 0.2 } } } }
    });

    // Grade Bar
    new Chart(document.getElementById('gradeBarChart'), {
        type: 'bar',
        data: {
            labels: ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'D', 'E'],
            datasets: [{ label: 'Jumlah Mahasiswa', data: [1250, 810, 680, 540, 420, 380, 260, 185, 90], backgroundColor: ['#10b981','#34d399','#3b82f6','#60a5fa','#93c5fd','#f59e0b','#fbbf24','#f97316','#ef4444'], borderRadius: 6, borderSkipped: false }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { x: { grid: { display: false }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 } } }, y: { grid: { color: gridColor }, ticks: { color: textColor } } } }
    });

    // Prodi Trend
    new Chart(document.getElementById('prodiTrendChart'), {
        type: 'line',
        data: {
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
            datasets: [
                { label: 'S1 Informatika', data: [3.50, 3.55, 3.60, 3.55, 3.58, 3.62], borderColor: '#6366f1', backgroundColor: 'rgba(99,102,241,0.06)', tension: 0.4, fill: true, pointRadius: 3, borderWidth: 2 },
                { label: 'S1 Keperawatan', data: [3.40, 3.42, 3.45, 3.48, 3.50, 3.52], borderColor: '#10b981', backgroundColor: 'rgba(16,185,129,0.06)', tension: 0.4, fill: true, pointRadius: 3, borderWidth: 2 },
                { label: 'S1 Farmasi', data: [3.55, 3.60, 3.62, 3.65, 3.68, 3.72], borderColor: '#f59e0b', backgroundColor: 'rgba(245,158,11,0.06)', tension: 0.4, fill: true, pointRadius: 3, borderWidth: 2 },
                { label: 'S1 Manajemen', data: [3.15, 3.18, 3.20, 3.22, 3.25, 3.28], borderColor: '#a855f7', tension: 0.4, pointRadius: 3, borderWidth: 2 },
            ]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: textColor, boxWidth: 10, font: { family: 'Poppins', size: 11 } } } }, scales: { x: { grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 } } }, y: { min: 3.0, max: 4.0, grid: { color: gridColor }, ticks: { color: textColor, stepSize: 0.2 } } } }
    });

    // Status Donut
    new Chart(document.getElementById('statusDonut'), {
        type: 'doughnut',
        data: {
            labels: ['Aktif', 'Cuti', 'DO', 'Lulus'],
            datasets: [{ data: [94.3, 3.1, 1.4, 1.2], backgroundColor: ['#10b981','#f59e0b','#ef4444','#3b82f6'], borderWidth: 0, hoverOffset: 8 }]
        },
        options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: { display: false } } }
    });
});
</script>
@endpush

</x-app-layout>
