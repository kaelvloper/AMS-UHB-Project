<x-app-layout>
    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                        Rekap Nilai Mahasiswa
                        <!-- Aksen garis Kuning Emas di bawah judul -->
                        <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-600 mt-3 text-base">Kelola dan pantau rekapitulasi nilai akademik mahasiswa Universitas Harapan Bangsa.</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-slate-350 bg-white hover:bg-slate-50 rounded-lg text-sm font-semibold text-slate-700 transition duration-150 shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <!-- Flash Alert Messages -->
            @if (session()->has('success'))
                <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Grid Layout: 2 Columns -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <!-- Left Column: Form "Input Nilai Akhir" -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="mb-5">
                        <h4 class="text-lg font-bold text-blue-900">Input Nilai Akhir</h4>
                        <p class="text-xs text-gray-500 mt-1">Masukkan data nilai mahasiswa beserta informasi mata kuliah.</p>
                    </div>

                    <form action="{{ route('rekap-nilai.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Nama Mahasiswa -->
                        <div>
                            <label for="nama_mahasiswa" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Nama Mahasiswa <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Budi Santoso">
                            @error('nama_mahasiswa') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- NIM -->
                        <div>
                            <label for="nim" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">NIM <span class="text-red-500">*</span></label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: 22.01.4821">
                            @error('nim') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Mata Kuliah -->
                        <div>
                            <label for="mata_kuliah" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Mata Kuliah <span class="text-red-500">*</span></label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" value="{{ old('mata_kuliah') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Pemrograman Web">
                            @error('mata_kuliah') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label for="kelas" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Kelas <span class="text-red-500">*</span></label>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: TI-26-A">
                            @error('kelas') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Nilai Angka -->
                        <div>
                            <label for="nilai_angka" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Nilai Angka <span class="text-red-500">*</span></label>
                            <input type="number" name="nilai_angka" id="nilai_angka" value="{{ old('nilai_angka') }}" min="0" max="100" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="0 - 100">
                            @error('nilai_angka') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 border border-transparent rounded-lg font-bold text-sm transition duration-150 shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Nilai
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Column: Table "Daftar Nilai Akademik" -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    
                    <!-- Table Header Title -->
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="text-lg font-bold text-blue-900">Daftar Nilai Akademik</h4>
                        <p class="text-xs text-gray-500 mt-1">Berikut adalah daftar rekapitulasi nilai akademik mahasiswa yang terdaftar.</p>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-slate-650">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-12">No</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">NIM</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Nama Mahasiswa</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Mata Kuliah</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-24">Kelas</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-28">Nilai Angka</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-28">Nilai Huruf</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($rekapNilais as $index => $item)
                                    <tr class="hover:bg-slate-50 transition-colors bg-white">
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                            {{ ($rekapNilais->currentPage() - 1) * $rekapNilais->perPage() + $index + 1 }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-slate-700 font-semibold font-mono">
                                            {{ $item->nim }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap font-bold text-slate-900">
                                            {{ $item->nama_mahasiswa }}
                                        </td>
                                        <td class="px-5 py-4 text-slate-700 font-medium">
                                            {{ $item->mata_kuliah }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-750 font-mono">
                                            {{ $item->kelas }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-950 font-bold font-mono">
                                            {{ $item->nilai_angka }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center">
                                            @if($item->nilai_huruf === 'A' || $item->nilai_huruf === 'B')
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                                    {{ $item->nilai_huruf }}
                                                </span>
                                            @elseif($item->nilai_huruf === 'C' || $item->nilai_huruf === 'D')
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                                    {{ $item->nilai_huruf }}
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                                                    {{ $item->nilai_huruf }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-10 h-10 text-slate-350" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-sm font-medium">Belum ada data rekap nilai mahasiswa.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer / Pagination -->
                    <div class="bg-white px-5 py-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-sm text-slate-500 font-medium">
                            Menampilkan <span class="font-semibold text-slate-800">{{ $rekapNilais->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $rekapNilais->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $rekapNilais->total() }}</span> Nilai
                        </div>
                        <div>
                            {{ $rekapNilais->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
