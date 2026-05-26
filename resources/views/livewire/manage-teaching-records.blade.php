<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Rekap Pengajaran & Honor Ujian') }}
    </h2>
</x-slot>

<div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header Section -->
        <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h3 class="text-3xl sm:text-4xl font-extrabold text-blue-900 inline-block relative pb-2">
                    Rekap Pengajaran & Honor Ujian
                    <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                </h3>
                <p class="text-gray-600 mt-4 text-lg">Kelola rekap pengajaran, metode ujian (UTS & UAS), serta perhitungan otomatis honorarium dosen LB.</p>
            </div>
            
            <div>
                <button wire:click="create()" class="inline-flex items-center text-sm font-bold text-blue-900 hover:text-gray-900 bg-yellow-400 hover:bg-yellow-300 px-6 py-3 rounded-lg transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Rekap Baru
                </button>
            </div>
        </div>

        <!-- Info / Rate Sheet Details Card -->
        <div class="bg-gradient-to-r from-blue-800 to-blue-900 text-white rounded-2xl p-6 shadow-md mb-8 border-l-8 border-yellow-400">
            <div class="flex items-start">
                <div class="p-2 bg-white/10 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="font-bold text-lg text-yellow-300">Ketentuan & Perhitungan Honorarium</h4>
                    <p class="text-sm text-blue-100 mt-1">Sistem secara otomatis menghitung dan memberikan tanda warna kuning (highlight) pada Dosen berstatus <strong>LB (Luar Biasa)</strong>. Untuk Dosen berstatus <strong>Tetap</strong>, kolom honorarium akan dikosongkan.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 text-xs font-semibold">
                        <div class="bg-white/10 p-2.5 rounded-lg border border-white/10">
                            📢 Honor Pembuatan Soal (UTS/UAS): <span class="text-yellow-300">Rp 44.000 per SKS</span>
                        </div>
                        <div class="bg-white/10 p-2.5 rounded-lg border border-white/10">
                            📝 Honor Koreksi Lembar Jawaban: <span class="text-yellow-300">Rp 1.200 / SKS / Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-sm" role="alert">
                <p class="font-medium">{{ session('message') }}</p>
            </div>
        @endif

        @if($isModalOpen)
            @include('livewire.create-teaching-record-modal')
        @endif

        <!-- Excel Styled Table Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead class="bg-gradient-to-r from-blue-700 to-blue-900 text-white text-xs uppercase font-bold text-center">
                        <!-- Header Row 1 -->
                        <tr>
                            <th rowspan="2" class="px-3 py-4 border border-blue-600 align-middle">No.</th>
                            <th rowspan="2" class="px-4 py-4 border border-blue-600 align-middle text-left min-w-[200px]">Nama Mata Kuliah</th>
                            <th rowspan="2" class="px-2 py-4 border border-blue-600 align-middle">SKS</th>
                            <th rowspan="2" class="px-4 py-4 border border-blue-600 align-middle text-left min-w-[200px]">Dosen Pengampu</th>
                            <th colspan="2" class="px-4 py-2 border border-blue-600">UTS</th>
                            <th colspan="2" class="px-4 py-2 border border-blue-600">UAS</th>
                            <th colspan="2" class="px-4 py-2 border border-blue-600">
                                HONOR SOAL
                                <span class="block text-[9px] font-normal text-yellow-300">Rp 44k / SKS</span>
                            </th>
                            <th colspan="2" class="px-4 py-2 border border-blue-600">
                                HONOR KOREKSI
                                <span class="block text-[9px] font-normal text-yellow-300">Rp 1.2k / SKS / Mhs</span>
                            </th>
                            <th rowspan="2" class="px-4 py-4 border border-blue-600 align-middle">JUMLAH</th>
                            <th rowspan="2" class="px-4 py-4 border border-blue-600 align-middle">Aksi</th>
                        </tr>
                        <!-- Header Row 2 -->
                        <tr class="bg-blue-800/90 text-[10px]">
                            <th class="px-2 py-2 border border-blue-700 font-semibold">METODE</th>
                            <th class="px-2 py-2 border border-blue-700 font-semibold">JUMLAH</th>
                            <th class="px-2 py-2 border border-blue-700 font-semibold">METODE</th>
                            <th class="px-2 py-2 border border-blue-700 font-semibold">JUMLAH</th>
                            <th class="px-3 py-2 border border-blue-700 font-semibold">UTS</th>
                            <th class="px-3 py-2 border border-blue-700 font-semibold">UAS</th>
                            <th class="px-3 py-2 border border-blue-700 font-semibold">UTS</th>
                            <th class="px-3 py-2 border border-blue-700 font-semibold">UAS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $grand_total = 0;
                        @endphp
                        @foreach($records as $record)
                        @php
                            $isLB = $record->lecturer && $record->lecturer->status === 'LB';
                            if ($isLB) {
                                $grand_total += $record->total_honor;
                            }
                        @endphp
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-3 py-3.5 text-center border-b border-gray-200 text-sm text-gray-500">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3.5 border-b border-gray-200 text-sm font-semibold text-gray-900">{{ $record->course_name }}</td>
                            <td class="px-2 py-3.5 text-center border-b border-gray-200 text-sm font-bold text-gray-800">{{ $record->credit_hours }}</td>
                            
                            <!-- Lecturer column highlighted in yellow if status is LB -->
                            <td class="px-4 py-3.5 border-b border-gray-200 text-sm {{ $isLB ? 'bg-yellow-100/70 border-yellow-100 text-amber-950 font-medium' : 'text-gray-900' }}">
                                <div class="font-semibold">{{ $record->lecturer ? $record->lecturer->full_name : 'Dosen Tidak Ditemukan' }}</div>
                                @if($record->lecturer && $record->lecturer->title)
                                    <div class="text-xs text-gray-500 mt-0.5">{{ $record->lecturer->title }}</div>
                                @endif
                                <div class="mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $isLB ? 'bg-yellow-200 text-yellow-950' : 'bg-blue-100 text-blue-900' }}">
                                        {{ $record->lecturer ? $record->lecturer->status : 'N/A' }}
                                    </span>
                                </div>
                            </td>
                            
                            <!-- UTS Method and Student Count -->
                            <td class="px-2 py-3.5 text-center border-b border-gray-200 text-sm text-gray-700">{{ $record->uts_method }}</td>
                            <td class="px-2 py-3.5 text-center border-b border-gray-200 text-sm text-gray-700">{{ $record->uts_student_count }}</td>
                            
                            <!-- UAS Method and Student Count -->
                            <td class="px-2 py-3.5 text-center border-b border-gray-200 text-sm text-gray-700">{{ $record->uas_method }}</td>
                            <td class="px-2 py-3.5 text-center border-b border-gray-200 text-sm text-gray-700">{{ $record->uas_student_count }}</td>
                            
                            <!-- Honor Soal UTS -->
                            <td class="px-3 py-3.5 text-right border-b border-gray-200 text-sm text-gray-700 font-mono">
                                {{ $isLB ? number_format($record->honor_soal_uts, 0, ',', '.') : '-' }}
                            </td>
                            <!-- Honor Soal UAS -->
                            <td class="px-3 py-3.5 text-right border-b border-gray-200 text-sm text-gray-700 font-mono">
                                {{ $isLB ? number_format($record->honor_soal_uas, 0, ',', '.') : '-' }}
                            </td>
                            
                            <!-- Honor Koreksi UTS -->
                            <td class="px-3 py-3.5 text-right border-b border-gray-200 text-sm text-gray-700 font-mono">
                                {{ $isLB ? number_format($record->honor_koreksi_uts, 0, ',', '.') : '-' }}
                            </td>
                            <!-- Honor Koreksi UAS -->
                            <td class="px-3 py-3.5 text-right border-b border-gray-200 text-sm text-gray-700 font-mono">
                                {{ $isLB ? number_format($record->honor_koreksi_uas, 0, ',', '.') : '-' }}
                            </td>
                            
                            <!-- Row Total -->
                            <td class="px-4 py-3.5 text-right border-b border-gray-200 text-sm font-extrabold text-slate-900 font-mono bg-slate-50/50">
                                {{ $isLB ? number_format($record->total_honor, 0, ',', '.') : '-' }}
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-4 py-3.5 text-center border-b border-gray-200 text-sm font-medium">
                                <div class="flex items-center justify-center gap-1.5">
                                    <button wire:click="edit({{ $record->id }})" class="inline-flex items-center text-indigo-600 hover:text-indigo-950 bg-indigo-50 hover:bg-indigo-100/80 px-2.5 py-1.5 rounded transition-all text-xs font-semibold">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $record->id }})" class="inline-flex items-center text-red-600 hover:text-red-950 bg-red-50 hover:bg-red-100/80 px-2.5 py-1.5 rounded transition-all text-xs font-semibold">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if($records->isEmpty())
                        <tr>
                            <td colspan="14" class="px-6 py-12 text-center text-gray-500">
                                <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span class="font-semibold text-lg block text-gray-600">Belum ada data rekap pengajaran.</span>
                                <span class="text-sm mt-1 block">Silakan tambahkan data baru dengan menekan tombol "Tambah Rekap Baru".</span>
                            </td>
                        </tr>
                        @else
                        <!-- Total Row -->
                        <tr class="bg-blue-50 font-bold border-t-2 border-blue-500">
                            <td colspan="12" class="px-4 py-4 text-right text-blue-900 text-sm uppercase tracking-wide">Total Honorarium (Dosen LB)</td>
                            <td class="px-4 py-4 text-right text-blue-900 font-mono text-sm font-extrabold bg-blue-100/60 border-l border-r border-blue-200">
                                Rp {{ number_format($grand_total, 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
