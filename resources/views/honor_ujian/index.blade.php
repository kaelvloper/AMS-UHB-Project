<x-app-layout>
    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                        Rekap Honor Ujian Dosen
                        <!-- Aksen garis Kuning Emas di bawah judul -->
                        <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-600 mt-3 text-base">Kelola dan pantau rekapitulasi honorarium pengawasan ujian tengah & akhir semester dosen UHB.</p>
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
                
                <!-- Left Column: Form "Input Honor Pengawas" -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="mb-5">
                        <h4 class="text-lg font-bold text-blue-900">Input Honor Pengawas</h4>
                        <p class="text-xs text-gray-500 mt-1">Input jumlah sesi mengawas ujian dosen secara periodik.</p>
                    </div>

                    <form action="{{ route('honor-ujian.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Dosen -->
                        <div>
                            <label for="dosen_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Dosen Pengawas <span class="text-red-500">*</span></label>
                            <select name="dosen_id" id="dosen_id" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="">-- Pilih Dosen --</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('dosen_id') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dosen_id') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jumlah Sesi Mengawas -->
                        <div>
                            <label for="jumlah_sesi" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Jumlah Sesi Mengawas <span class="text-red-500">*</span></label>
                            <input type="number" name="jumlah_sesi" id="jumlah_sesi" value="{{ old('jumlah_sesi') }}" min="1" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: 4">
                            @error('jumlah_sesi') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jenis Ujian -->
                        <div>
                            <label for="jenis_ujian" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Jenis Ujian <span class="text-red-500">*</span></label>
                            <select name="jenis_ujian" id="jenis_ujian" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="UTS" {{ old('jenis_ujian') == 'UTS' ? 'selected' : '' }}>UTS (Ujian Tengah Semester)</option>
                                <option value="UAS" {{ old('jenis_ujian') == 'UAS' ? 'selected' : '' }}>UAS (Ujian Akhir Semester)</option>
                            </select>
                            @error('jenis_ujian') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Semester -->
                        <div>
                            <label for="semester" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Semester <span class="text-red-500">*</span></label>
                            <input type="text" name="semester" id="semester" value="{{ old('semester') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: 2025/2026 Ganjil">
                            @error('semester') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 border border-transparent rounded-lg font-bold text-sm transition duration-150 shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Rekap Honor Ujian
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Column: Table "Daftar Honorarium Ujian Dosen" -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    
                    <!-- Table Header Title -->
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="text-lg font-bold text-blue-900">Daftar Honorarium Ujian Dosen</h4>
                        <p class="text-xs text-gray-500 mt-1">Berikut adalah semua rekapitulasi honorarium pengawasan ujian dosen saat ini.</p>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-slate-650">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-12">No</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Nama Dosen</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-24">Jenis Ujian</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-24">Sesi Mengawas</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-right">Tarif (Sesi)</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-right">Total Honor</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center">Semester</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($honorUjians as $index => $item)
                                    <tr class="hover:bg-slate-50 transition-colors bg-white">
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                            {{ ($honorUjians->currentPage() - 1) * $honorUjians->perPage() + $index + 1 }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap font-bold text-slate-900">
                                            {{ $item->dosen->nama_lengkap ?? 'Dosen Tidak Ditemukan' }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold {{ $item->jenis_ujian === 'UTS' ? 'bg-indigo-50 text-indigo-800 border border-indigo-200' : 'bg-purple-50 text-purple-800 border border-purple-200' }}">
                                                {{ $item->jenis_ujian }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700 font-medium">
                                            {{ $item->jumlah_sesi }} Sesi
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-right text-slate-600 font-mono">
                                            Rp {{ number_format($item->tarif_per_sesi, 0, ',', '.') }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-right text-slate-900 font-bold font-mono">
                                            Rp {{ number_format($item->total_honor_ujian, 0, ',', '.') }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700">
                                            {{ $item->semester }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-10 h-10 text-slate-350" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                <p class="text-sm font-medium">Belum ada data rekap honorarium ujian.</p>
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
                            Menampilkan <span class="font-semibold text-slate-800">{{ $honorUjians->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $honorUjians->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $honorUjians->total() }}</span> Rekap
                        </div>
                        <div>
                            {{ $honorUjians->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
