<x-app-layout>
    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                        Rekap Kegiatan Universitas
                        <!-- Aksen garis Kuning Emas di bawah judul -->
                        <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-600 mt-3 text-base">Kelola dan dokumentasikan seluruh agenda kegiatan akademik Universitas Harapan Bangsa.</p>
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
                
                <!-- Left Column: Form "Dokumentasi Kegiatan" -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="mb-5">
                        <h4 class="text-lg font-bold text-blue-900">Dokumentasi Kegiatan</h4>
                        <p class="text-xs text-gray-500 mt-1">Masukkan rincian kegiatan kampus baru untuk didokumentasikan.</p>
                    </div>

                    <form action="{{ route('rekap-kegiatan.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Nama Kegiatan -->
                        <div>
                            <label for="nama_kegiatan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Nama Kegiatan <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Seminar Nasional AI">
                            @error('nama_kegiatan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jenis Kegiatan -->
                        <div>
                            <label for="jenis_kegiatan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Jenis Kegiatan <span class="text-red-500">*</span></label>
                            <select name="jenis_kegiatan" id="jenis_kegiatan" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="">-- Pilih Jenis Kegiatan --</option>
                                <option value="Seminar" {{ old('jenis_kegiatan') == 'Seminar' ? 'selected' : '' }}>Seminar</option>
                                <option value="Workshop" {{ old('jenis_kegiatan') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                                <option value="Rapat Koordinasi" {{ old('jenis_kegiatan') == 'Rapat Koordinasi' ? 'selected' : '' }}>Rapat Koordinasi</option>
                                <option value="Pengabdian" {{ old('jenis_kegiatan') == 'Pengabdian' ? 'selected' : '' }}>Pengabdian</option>
                            </select>
                            @error('jenis_kegiatan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tanggal Kegiatan -->
                        <div>
                            <label for="tanggal_kegiatan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                            @error('tanggal_kegiatan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Tempat -->
                        <div>
                            <label for="tempat" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Tempat <span class="text-red-500">*</span></label>
                            <input type="text" name="tempat" id="tempat" value="{{ old('tempat') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Aula GKU Lt 3">
                            @error('tempat') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Status Kegiatan -->
                        <div>
                            <label for="status_kegiatan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Status Kegiatan <span class="text-red-500">*</span></label>
                            <select name="status_kegiatan" id="status_kegiatan" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="Terencana" {{ old('status_kegiatan') == 'Terencana' ? 'selected' : '' }}>Terencana</option>
                                <option value="Selesai" {{ old('status_kegiatan') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status_kegiatan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 border border-transparent rounded-lg font-bold text-sm transition duration-150 shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Rekap Kegiatan
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Column: Table "Daftar Kegiatan Universitas" -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    
                    <!-- Table Header Title -->
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="text-lg font-bold text-blue-900">Daftar Kegiatan Universitas</h4>
                        <p class="text-xs text-gray-500 mt-1">Berikut adalah agenda seluruh kegiatan akademik yang didokumentasikan.</p>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-slate-650">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-12">No</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Nama Kegiatan</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-36">Jenis Kegiatan</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-32">Tanggal</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Tempat</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-28">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($rekapKegiatans as $index => $item)
                                    <tr class="hover:bg-slate-50 transition-colors bg-white">
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                            {{ ($rekapKegiatans->currentPage() - 1) * $rekapKegiatans->perPage() + $index + 1 }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap font-bold text-slate-900">
                                            {{ $item->nama_kegiatan }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-semibold bg-slate-50 text-slate-700 border border-slate-200">
                                                {{ $item->jenis_kegiatan }}
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700 font-mono">
                                            {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-slate-600">
                                            {{ $item->tempat }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center">
                                            @if($item->status_kegiatan === 'Selesai')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                                    Selesai
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
                                                    Terencana
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="6" class="px-5 py-12 text-center text-slate-500">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-10 h-10 text-slate-350" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <p class="text-sm font-medium">Belum ada data rekap kegiatan kampus.</p>
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
                            Menampilkan <span class="font-semibold text-slate-800">{{ $rekapKegiatans->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $rekapKegiatans->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $rekapKegiatans->total() }}</span> Kegiatan
                        </div>
                        <div>
                            {{ $rekapKegiatans->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
