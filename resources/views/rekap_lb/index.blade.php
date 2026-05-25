<x-app-layout>
    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                        Rekap Dosen Luar Biasa (LB)
                        <!-- Aksen garis Kuning Emas di bawah judul -->
                        <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-600 mt-3 text-base">Kelola dan pantau rekapitulasi honor mengajar Dosen Luar Biasa Universitas Harapan Bangsa.</p>
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
                
                <!-- Left Column: Form "Input Rekap Honor LB" -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="mb-5">
                        <h4 class="text-lg font-bold text-blue-900">Input Rekap Honor LB</h4>
                        <p class="text-xs text-gray-500 mt-1">Isi rekapitulasi SKS dan honor mengajar dosen luar biasa secara periodik.</p>
                    </div>

                    <form action="{{ route('rekap-lb.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Dosen -->
                        <div>
                            <label for="dosen_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Dosen Luar Biasa <span class="text-red-500">*</span></label>
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

                        <!-- Total SKS -->
                        <div>
                            <label for="total_sks" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Total SKS <span class="text-red-500">*</span></label>
                            <input type="number" name="total_sks" id="total_sks" value="{{ old('total_sks') }}" min="1" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: 12">
                            @error('total_sks') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Bulan -->
                        <div>
                            <label for="bulan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Bulan <span class="text-red-500">*</span></label>
                            <input type="text" name="bulan" id="bulan" value="{{ old('bulan') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Mei 2026">
                            @error('bulan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Status Pembayaran -->
                        <div>
                            <label for="status_pembayaran" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Status Pembayaran <span class="text-red-500">*</span></label>
                            <select name="status_pembayaran" id="status_pembayaran" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="Belum Dibayar" {{ old('status_pembayaran') == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                <option value="Proses" {{ old('status_pembayaran') == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Lunas" {{ old('status_pembayaran') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                            </select>
                            @error('status_pembayaran') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 border border-transparent rounded-lg font-bold text-sm transition duration-150 shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Simpan Rekap Honor
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Column: Table "Laporan Honor Dosen Luar Biasa" -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    
                    <!-- Table Header Title -->
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="text-lg font-bold text-blue-900">Laporan Honor Dosen Luar Biasa</h4>
                        <p class="text-xs text-gray-500 mt-1">Berikut adalah semua laporan honor mengajar Dosen Luar Biasa yang tercatat.</p>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-slate-650">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-12">No</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Nama Dosen</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-24">Total SKS</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-right">Tarif (SKS)</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-right">Total Honor</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center">Bulan</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-32">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($rekapLbs as $index => $item)
                                    <tr class="hover:bg-slate-50 transition-colors bg-white">
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                            {{ ($rekapLbs->currentPage() - 1) * $rekapLbs->perPage() + $index + 1 }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap font-bold text-slate-900">
                                            {{ $item->dosen->nama_lengkap ?? 'Dosen Tidak Ditemukan' }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700 font-medium">
                                            {{ $item->total_sks }} SKS
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-right text-slate-600 font-mono">
                                            Rp {{ number_format($item->tarif_per_sks, 0, ',', '.') }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-right text-slate-900 font-bold font-mono">
                                            Rp {{ number_format($item->total_honor, 0, ',', '.') }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700">
                                            {{ $item->bulan }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center">
                                            @if($item->status_pembayaran === 'Lunas')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                                    Lunas
                                                </span>
                                            @elseif($item->status_pembayaran === 'Proses')
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200">
                                                    Proses
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 text-rose-800 border border-rose-200">
                                                    Belum Dibayar
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
                                                <p class="text-sm font-medium">Belum ada data rekap honor dosen luar biasa.</p>
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
                            Menampilkan <span class="font-semibold text-slate-800">{{ $rekapLbs->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $rekapLbs->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $rekapLbs->total() }}</span> Rekap
                        </div>
                        <div>
                            {{ $rekapLbs->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
