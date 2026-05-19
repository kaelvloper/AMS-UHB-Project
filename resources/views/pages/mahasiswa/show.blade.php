<x-app-layout>
<x-slot name="pageTitle">Detail Mahasiswa</x-slot>

@php
$nama    = 'Rizal Fathur Rahman';
$nim     = '2021001001';
$prodi   = 'S1 Informatika';
$fak     = 'Fakultas Teknologi & Sains';
$angkatan= '2021';
$ipk     = 3.75;
$totalSks= 96;
$semAktif= 6;
$email   = 'rizal.fathur@mhs.uhb.ac.id';
$phone   = '0812-3456-7890';
$alamat  = 'Purwokerto, Jawa Tengah';
$status  = 'Aktif';
@endphp

{{-- Back Button --}}
<div class="mb-4">
    <a href="{{ route('nilai.index') }}" class="inline-flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Kembali ke Nilai Mahasiswa
    </a>
</div>

{{-- Profile Hero Card --}}
<div class="glass-card p-6 mb-5 relative overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute -top-8 -right-8 w-40 h-40 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-full blur-2xl"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-tr from-cyan-500/10 to-blue-500/10 rounded-full blur-2xl"></div>

    <div class="relative flex flex-col sm:flex-row items-start sm:items-center gap-5">
        {{-- Avatar --}}
        <div class="relative flex-shrink-0">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=6366f1&color=fff&size=100&bold=true"
                 class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover ring-4 ring-indigo-500/20 shadow-xl"
                 alt="{{ $nama }}">
            <span class="absolute -bottom-1.5 -right-1.5 w-5 h-5 bg-emerald-500 rounded-full border-2 border-white dark:border-slate-800 shadow-sm"></span>
        </div>

        {{-- Info --}}
        <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-2 mb-1">
                <h1 class="text-xl font-bold text-slate-800 dark:text-slate-100">{{ $nama }}</h1>
                <span class="text-xs px-2 py-0.5 bg-emerald-100 dark:bg-emerald-900/40 text-emerald-700 dark:text-emerald-400 rounded-full font-semibold">{{ $status }}</span>
            </div>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-3">{{ $nim }} · {{ $prodi }} · Angkatan {{ $angkatan }}</p>
            <div class="flex flex-wrap gap-4 text-xs text-slate-500 dark:text-slate-400">
                <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>{{ $fak }}</span>
                <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>{{ $email }}</span>
                <span class="flex items-center gap-1.5"><svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>{{ $alamat }}</span>
            </div>
        </div>

        {{-- IPK Badge --}}
        <div class="flex-shrink-0 text-center">
            <div class="w-20 h-20 rounded-2xl gradient-primary flex flex-col items-center justify-center shadow-xl shadow-indigo-500/30">
                <span class="text-2xl font-black text-white">{{ $ipk }}</span>
                <span class="text-xs text-indigo-200 font-medium">IPK</span>
            </div>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-3 sm:grid-cols-6 gap-3 mt-5 pt-5 border-t border-slate-200/60 dark:border-slate-700/60">
        @foreach([
            ['IPK','3.75','text-indigo-600 dark:text-indigo-400'],
            ['IP Sem 6','3.82','text-emerald-600 dark:text-emerald-400'],
            ['Total SKS',$totalSks,'text-blue-600 dark:text-blue-400'],
            ['Semester',$semAktif,'text-violet-600 dark:text-violet-400'],
            ['MK Lulus','28','text-cyan-600 dark:text-cyan-400'],
            ['Prestasi','3','text-amber-600 dark:text-amber-400'],
        ] as [$label, $val, $color])
        <div class="text-center p-2 rounded-xl bg-slate-50/80 dark:bg-slate-800/50">
            <p class="text-lg font-bold {{ $color }}">{{ $val }}</p>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $label }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Content Grid --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- Left: Charts --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- IP Per Semester Chart --}}
        <div class="glass-card p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Perkembangan IP per Semester</h2>
                <span class="text-xs px-2 py-1 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg">Semester 1–6</span>
            </div>
            <div class="chart-wrapper" style="height:200px">
                <canvas id="ipSemesterChart"></canvas>
            </div>
        </div>

        {{-- Riwayat Mata Kuliah --}}
        <div class="glass-card overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-200/60 dark:border-slate-700/60">
                <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm">Riwayat Mata Kuliah</h2>
                <div class="flex gap-2">
                    @foreach(['Semua','Sem 6','Sem 5','Sem 4'] as $tab)
                    <button class="text-xs px-3 py-1 rounded-lg {{ $loop->first ? 'gradient-primary text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600' }} transition-colors">{{ $tab }}</button>
                    @endforeach
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-modern">
                    <thead><tr>
                        <th class="pl-5">Mata Kuliah</th><th>Semester</th><th class="text-center">SKS</th>
                        <th class="text-center">Tugas</th><th class="text-center">UTS</th><th class="text-center">UAS</th>
                        <th class="text-center">Akhir</th><th class="text-center pr-5">Grade</th>
                    </tr></thead>
                    <tbody>
                        @foreach([
                            ['Pemrograman Web',6,3,85,82,88,86,'A'],
                            ['Basis Data Lanjut',6,3,80,78,84,81,'A-'],
                            ['Rekayasa Perangkat Lunak',5,3,75,78,72,75,'B+'],
                            ['Algoritma & Pemrograman',5,3,88,90,86,88,'A'],
                            ['Jaringan Komputer',4,3,70,72,68,70,'B'],
                            ['Sistem Operasi',4,3,78,76,80,78,'B+'],
                            ['Matematika Diskrit',3,3,82,80,85,83,'A-'],
                            ['Pengantar Informatika',1,2,90,88,92,91,'A'],
                        ] as [$mk,$sem,$sks,$tugas,$uts,$uas,$akhir,$grade])
                        @php $gClass = str_starts_with($grade,'A') ? 'grade-A' : (str_starts_with($grade,'B') ? 'grade-B' : 'grade-C'); @endphp
                        <tr>
                            <td class="pl-5 text-sm font-medium text-slate-700 dark:text-slate-300">{{ $mk }}</td>
                            <td><span class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-400 text-xs font-bold">{{ $sem }}</span></td>
                            <td class="text-center text-xs font-semibold text-slate-500">{{ $sks }}</td>
                            <td class="text-center text-sm font-semibold {{ $tugas>=80?'text-emerald-600 dark:text-emerald-400':'text-blue-600 dark:text-blue-400' }}">{{ $tugas }}</td>
                            <td class="text-center text-sm font-semibold {{ $uts>=80?'text-emerald-600 dark:text-emerald-400':'text-blue-600 dark:text-blue-400' }}">{{ $uts }}</td>
                            <td class="text-center text-sm font-semibold {{ $uas>=80?'text-emerald-600 dark:text-emerald-400':'text-blue-600 dark:text-blue-400' }}">{{ $uas }}</td>
                            <td class="text-center text-sm font-bold text-slate-800 dark:text-slate-100">{{ $akhir }}</td>
                            <td class="text-center pr-5"><span class="{{ $gClass }}">{{ $grade }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Right: Sidebar Info --}}
    <div class="space-y-5">

        {{-- IP Semester Timeline --}}
        <div class="glass-card p-5">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm mb-4">Riwayat IP Semester</h2>
            <div class="space-y-3">
                @foreach([
                    [6,3.82,'emerald'],
                    [5,3.76,'emerald'],
                    [4,3.65,'blue'],
                    [3,3.70,'emerald'],
                    [2,3.58,'blue'],
                    [1,3.82,'emerald'],
                ] as [$sem,$ip,$color])
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-{{$color}}-100 dark:bg-{{$color}}-900/30 text-{{$color}}-700 dark:text-{{$color}}-400 text-xs font-bold flex items-center justify-center">{{ $sem }}</span>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs text-slate-600 dark:text-slate-400 font-medium">Semester {{ $sem }}</span>
                            <span class="text-xs font-bold text-{{$color}}-600 dark:text-{{$color}}-400">{{ number_format($ip,2) }}</span>
                        </div>
                        <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5">
                            <div class="h-1.5 rounded-full bg-{{$color}}-500 transition-all duration-700" style="width:{{ ($ip/4)*100 }}%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Progress Akademik --}}
        <div class="glass-card p-5">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm mb-4">Progress Akademik</h2>
            <div class="chart-wrapper mb-4" style="height:160px">
                <canvas id="progressRadarChart"></canvas>
            </div>
            <div class="space-y-2">
                @foreach([
                    ['SKS Selesai', 96, 144, 'indigo'],
                    ['Mata Kuliah Lulus', 28, 42, 'emerald'],
                    ['Target Kelulusan', 67, 100, 'violet'],
                ] as [$label, $val, $max, $color])
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-slate-600 dark:text-slate-400 font-medium">{{ $label }}</span>
                        <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $val }}/{{ $max }}</span>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-2">
                        <div class="h-2 rounded-full bg-{{$color}}-500 transition-all duration-700" style="width:{{ round(($val/$max)*100) }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Prestasi --}}
        <div class="glass-card p-5">
            <h2 class="font-semibold text-slate-800 dark:text-slate-100 text-sm mb-4">Prestasi Akademik</h2>
            <div class="space-y-3">
                @foreach([
                    ['🥇','Mahasiswa Berprestasi','Tingkat Fakultas 2024','amber'],
                    ['🏆','Hackathon Nasional','Juara 2 – 2023','violet'],
                    ['⭐','IPK Sempurna','Semester 1 & 6','emerald'],
                ] as [$icon,$title,$desc,$color])
                <div class="flex items-start gap-3 p-3 rounded-xl bg-{{$color}}-50/80 dark:bg-{{$color}}-900/20 border border-{{$color}}-100 dark:border-{{$color}}-800/40">
                    <span class="text-xl leading-none">{{ $icon }}</span>
                    <div>
                        <p class="text-xs font-semibold text-{{$color}}-700 dark:text-{{$color}}-400">{{ $title }}</p>
                        <p class="text-xs text-{{$color}}-600/70 dark:text-{{$color}}-500 mt-0.5">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const isDark = document.documentElement.classList.contains('dark');
    const gridColor = isDark ? 'rgba(148,163,184,0.08)' : 'rgba(0,0,0,0.06)';
    const textColor = isDark ? '#94a3b8' : '#64748b';

    // IP Semester Line Chart
    new Chart(document.getElementById('ipSemesterChart'), {
        type: 'line',
        data: {
            labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
            datasets: [{
                label: 'IP Semester',
                data: [3.82, 3.58, 3.70, 3.65, 3.76, 3.82],
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99,102,241,0.12)',
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#6366f1',
                pointRadius: 5,
                pointHoverRadius: 8,
                borderWidth: 2.5,
            },{
                label: 'IPK Kumulatif',
                data: [3.82, 3.70, 3.70, 3.68, 3.70, 3.75],
                borderColor: '#10b981',
                backgroundColor: 'transparent',
                tension: 0.4,
                borderDash: [6,4],
                pointBackgroundColor: '#10b981',
                pointRadius: 4,
                pointHoverRadius: 7,
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { labels: { color: textColor, boxWidth: 10, font: { family: 'Poppins', size: 11 } } } },
            scales: {
                x: { grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 } } },
                y: { min: 3.0, max: 4.0, grid: { color: gridColor }, ticks: { color: textColor, font: { family: 'Poppins', size: 11 }, stepSize: 0.2 } }
            }
        }
    });

    // Progress Radar Chart
    new Chart(document.getElementById('progressRadarChart'), {
        type: 'radar',
        data: {
            labels: ['Tugas', 'UTS', 'UAS', 'Kehadiran', 'IPK', 'Prestasi'],
            datasets: [{
                label: 'Performa',
                data: [85, 82, 87, 95, 94, 75],
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99,102,241,0.15)',
                pointBackgroundColor: '#6366f1',
                pointRadius: 3,
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { r: { min: 50, max: 100, ticks: { display: false, stepSize: 10 }, grid: { color: gridColor }, pointLabels: { color: textColor, font: { family: 'Poppins', size: 10 } } } }
        }
    });
});
</script>
@endpush

</x-app-layout>
