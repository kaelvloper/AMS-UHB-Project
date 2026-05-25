<x-app-layout>
    <!-- Wrapper Background Halaman: Slate-50 -->
    <div class="py-12 bg-slate-50 min-h-[calc(100vh-70px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Header Section -->
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-3xl font-extrabold text-blue-900 inline-block relative pb-2">
                        Modul Distribusi Perkuliahan UHB
                        <!-- Aksen garis Kuning Emas di bawah judul -->
                        <div class="absolute bottom-0 left-0 w-24 h-2 bg-yellow-400 rounded-full"></div>
                    </h3>
                    <p class="text-gray-600 mt-3 text-base">Kelola plotting jadwal kuliah dosen dan pembagian kelas di lingkungan Universitas Harapan Bangsa.</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-slate-350 bg-white hover:bg-slate-50 rounded-lg text-sm font-semibold text-slate-700 transition duration-150">
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

            @if (session()->has('error'))
                <div class="mb-8 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl flex items-center justify-between shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="text-sm font-medium">{{ session('error') }}</span>
                    </div>
                    <button type="button" @click="show = false" class="text-rose-500 hover:text-rose-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Grid Layout: 2 Columns -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <!-- Left Column: Form Plotting -->
                <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                    <div class="mb-5">
                        <h4 class="text-lg font-bold text-blue-900">Plotting Jadwal Mengajar</h4>
                        <p class="text-xs text-gray-500 mt-1">Input data distribusi mengajar baru secara valid.</p>
                    </div>

                    <form action="{{ route('distribusiku.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Dosen -->
                        <div>
                            <label for="dosen_id" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Dosen Pengajar <span class="text-red-500">*</span></label>
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

                        <!-- Mata Kuliah -->
                        <div>
                            <label for="mata_kuliah" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Mata Kuliah <span class="text-red-500">*</span></label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" value="{{ old('mata_kuliah') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Pemrograman Berbasis Web">
                            @error('mata_kuliah') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label for="kelas" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Kelas <span class="text-red-500">*</span></label>
                            <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: TI-26-A">
                            @error('kelas') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Hari -->
                        <div>
                            <label for="hari" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Hari Kuliah <span class="text-red-500">*</span></label>
                            <select name="hari" id="hari" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors bg-white">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" {{ old('hari') == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ old('hari') == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ old('hari') == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ old('hari') == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ old('hari') == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                            @error('hari') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jam Mulai & Jam Selesai -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="jam_mulai" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Jam Mulai <span class="text-red-500">*</span></label>
                                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                @error('jam_mulai') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="jam_selesai" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Jam Selesai <span class="text-red-500">*</span></label>
                                <input type="time" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                @error('jam_selesai') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Ruangan -->
                        <div>
                            <label for="ruangan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Ruangan Kelas <span class="text-red-500">*</span></label>
                            <input type="text" name="ruangan" id="ruangan" value="{{ old('ruangan') }}" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Lab Komputer 3, Ruang 402">
                            @error('ruangan') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- SKS -->
                        <div>
                            <label for="SKS" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">SKS <span class="text-red-500">*</span></label>
                            <input type="number" name="SKS" id="SKS" value="{{ old('SKS', 3) }}" min="1" max="6" required class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                            @error('SKS') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-blue-900 border border-transparent rounded-lg font-bold text-sm transition duration-150 shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Plotting Jadwal
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Column: Table List -->
                <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col justify-between">
                    
                    <!-- Table Header Title -->
                    <div class="p-5 border-b border-slate-100 bg-slate-50/50">
                        <h4 class="text-lg font-bold text-blue-900">Daftar Jadwal Distribusi Kuliah</h4>
                        <p class="text-xs text-gray-500 mt-1">Berikut adalah semua jadwal perkuliahan ter-plotting saat ini.</p>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto flex-1">
                        <table class="w-full text-sm text-left text-slate-650">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-100 border-b border-slate-200">
                                <tr>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-12">No</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Nama Dosen</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Mata Kuliah</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-20">Kelas</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Waktu (Hari, Jam)</th>
                                    <th scope="col" class="px-5 py-4 font-semibold">Ruangan</th>
                                    <th scope="col" class="px-5 py-4 font-semibold text-center w-16">SKS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($distribusis as $index => $item)
                                    <tr class="hover:bg-slate-50 transition-colors bg-white">
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                            {{ ($distribusis->currentPage() - 1) * $distribusis->perPage() + $index + 1 }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap font-bold text-slate-900">
                                            {{ $item->dosen->nama_lengkap }}
                                        </td>
                                        <td class="px-5 py-4 text-slate-700 font-medium">
                                            {{ $item->mata_kuliah }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-700 font-mono">
                                            {{ $item->kelas }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-slate-700 font-semibold">
                                            <span class="inline-flex items-center gap-1.5">
                                                <span class="text-blue-800 bg-blue-50 border border-blue-200 text-xs px-2 py-0.5 rounded">
                                                    {{ $item->hari }}
                                                </span>
                                                <span class="text-slate-650">
                                                    {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                                </span>
                                            </span>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-slate-600">
                                            {{ $item->ruangan }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap text-center text-slate-800 font-bold">
                                            {{ $item->SKS }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-10 h-10 text-slate-350" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <p class="text-sm font-medium">Belum ada jadwal distribusi perkuliahan yang di-plotting.</p>
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
                            Menampilkan <span class="font-semibold text-slate-800">{{ $distribusis->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $distribusis->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $distribusis->total() }}</span> Jadwal
                        </div>
                        <div>
                            {{ $distribusis->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
