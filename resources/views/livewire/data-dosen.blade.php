<div class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Flash Alert Message -->
        @if (session()->has('message'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center justify-between shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium">{{ session('message') }}</span>
                </div>
                <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Page Header -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 tracking-tight">
                    Data Dosen UHB
                </h2>
                <p class="mt-2 text-sm text-slate-600">
                    Kelola informasi, jabatan akademik, dan status dosen di lingkungan Universitas Harapan Bangsa (UHB).
                </p>
            </div>
            <div>
                <button type="button" wire:click="openModal" class="inline-flex items-center px-4 py-2.5 bg-[#1e3a8a] border border-transparent rounded-lg font-medium text-sm text-white hover:bg-[#152a66] focus:outline-none transition-colors shadow-sm duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Dosen
                </button>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            
            <!-- Toolbar & Filter -->
            <div class="p-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-slate-50/50">
                <!-- Search Bar -->
                <div class="relative w-full lg:w-1/3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" wire:model.live="search" class="block w-full py-2.5 pl-10 pr-4 text-sm text-slate-900 bg-white rounded-lg border border-slate-300 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] transition-colors" placeholder="Cari Nama, NIDN atau Program Studi...">
                </div>
                
                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                    <!-- Status Kepegawaian Filter -->
                    <div class="w-full sm:w-44">
                        <select wire:model.live="filterStatus" class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg focus:ring-[#1e3a8a] focus:border-[#1e3a8a] block w-full p-2.5 transition-colors">
                            <option value="">Semua Status</option>
                            <option value="Tetap">Tetap</option>
                            <option value="LB">Luar Biasa (LB)</option>
                        </select>
                    </div>

                    <!-- Status Keaktifan Filter -->
                    <div class="w-full sm:w-44">
                        <select wire:model.live="filterStatusAktif" class="bg-white border border-slate-300 text-slate-700 text-sm rounded-lg focus:ring-[#1e3a8a] focus:border-[#1e3a8a] block w-full p-2.5 transition-colors">
                            <option value="">Semua Keaktifan</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-slate-600">
                    <thead class="text-xs text-slate-500 bg-slate-100 border-b border-slate-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-16">No</th>
                            <th scope="col" class="px-6 py-4 font-semibold w-16 text-center">Foto</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Nama Lengkap & Gelar</th>
                            <th scope="col" class="px-6 py-4 font-semibold">NIDN/NIK</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Program Studi</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Jabatan Akademik</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Status</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Keaktifan</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($dosens as $index => $dosen)
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-slate-500 font-medium">
                                    {{ ($dosens->currentPage() - 1) * $dosens->perPage() + $index + 1 }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden border border-slate-200 mx-auto shadow-inner">
                                        @if ($dosen->foto)
                                            <img src="{{ asset('storage/' . $dosen->foto) }}" alt="Avatar" class="w-full h-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($dosen->nama) }}&background=random&color=fff&bold=true" alt="Avatar" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">{{ $dosen->nama }}, {{ $dosen->gelar }}</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700 font-mono">
                                    {{ $dosen->nidn }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700 font-medium">
                                    {{ $dosen->program_studi }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-600">
                                    {{ $dosen->jabatan_akademik }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    @if ($dosen->status === 'Tetap')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#1e3a8a] text-white shadow-sm">
                                            Tetap
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-[#e0f2fe] text-[#0369a1] border border-[#bae6fd]">
                                            LB
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    @if ($dosen->status_aktif === 'Aktif')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                            Cuti
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex items-center justify-center gap-2">
                                        <button wire:click="edit({{ $dosen->id }})" class="inline-flex items-center px-2.5 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-md transition-colors duration-150 border border-blue-150">
                                            Edit
                                        </button>
                                        <button wire:click="confirmDelete({{ $dosen->id }})" class="inline-flex items-center px-2.5 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 rounded-md transition-colors duration-150 border border-red-150">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white">
                                <td colspan="9" class="px-6 py-10 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center gap-2">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="text-sm font-medium">Tidak ada data dosen ditemukan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer / Pagination -->
            <div class="bg-white px-6 py-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-slate-500 font-medium">
                    Menampilkan <span class="font-semibold text-slate-800">{{ $dosens->firstItem() ?? 0 }}</span> sampai <span class="font-semibold text-slate-800">{{ $dosens->lastItem() ?? 0 }}</span> dari <span class="font-semibold text-slate-800">{{ $dosens->total() }}</span> Dosen
                </div>
                <div>
                    {{ $dosens->links() }}
                </div>
            </div>

        </div>
        
    </div>

    <!-- Modal Form (Tambah/Edit Dosen) -->
    @if($isModalOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-slate-900 bg-opacity-40 transition-opacity" aria-hidden="true" wire:click="closeModal"></div>

                <!-- Centered positioner -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal Content -->
                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-100"
                     x-data x-transition>
                    
                    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                        
                        <!-- Modal Header -->
                        <div class="bg-slate-50 px-6 py-4 border-b border-slate-150 flex items-center justify-between">
                            <h3 class="text-lg font-bold text-slate-900" id="modal-title">
                                {{ $isEditMode ? 'Edit Data Dosen' : 'Tambah Dosen Baru' }}
                            </h3>
                            <button type="button" wire:click="closeModal" class="text-slate-400 hover:text-slate-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="bg-white px-6 py-5 space-y-4">
                            <!-- NIDN/NIK -->
                            <div>
                                <label for="nidn" class="block text-sm font-semibold text-slate-700">NIDN / NIK <span class="text-red-500">*</span></label>
                                <input type="text" id="nidn" wire:model="nidn" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: 0612038501">
                                @error('nidn') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Nama Lengkap -->
                            <div>
                                <label for="nama" class="block text-sm font-semibold text-slate-700">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" id="nama" wire:model="nama" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: Dr. Budi Santoso">
                                @error('nama') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Gelar -->
                            <div>
                                <label for="gelar" class="block text-sm font-semibold text-slate-700">Gelar Akademik <span class="text-red-500">*</span></label>
                                <input type="text" id="gelar" wire:model="gelar" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors" placeholder="Contoh: S.Kom., M.Kom.">
                                @error('gelar') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Program Studi -->
                            <div>
                                <label for="program_studi" class="block text-sm font-semibold text-slate-700">Program Studi <span class="text-red-500">*</span></label>
                                <select id="program_studi" wire:model="program_studi" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                    <option value="">-- Pilih Program Studi --</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                    <option value="Keperawatan">Keperawatan</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Manajemen">Manajemen</option>
                                    <option value="Hukum">Hukum</option>
                                </select>
                                @error('program_studi') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Jabatan Akademik -->
                            <div>
                                <label for="jabatan_akademik" class="block text-sm font-semibold text-slate-700">Jabatan Akademik <span class="text-red-500">*</span></label>
                                <select id="jabatan_akademik" wire:model="jabatan_akademik" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                    <option value="">-- Pilih Jabatan Akademik --</option>
                                    <option value="Asisten Ahli">Asisten Ahli</option>
                                    <option value="Lektor">Lektor</option>
                                    <option value="Lektor Kepala">Lektor Kepala</option>
                                    <option value="Guru Besar">Guru Besar</option>
                                </select>
                                @error('jabatan_akademik') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status Kepegawaian & Status Aktif (Flex Row) -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="status" class="block text-sm font-semibold text-slate-700">Status Kepegawaian <span class="text-red-500">*</span></label>
                                    <select id="status" wire:model="status" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                        <option value="Tetap">Tetap</option>
                                        <option value="LB">Luar Biasa (LB)</option>
                                    </select>
                                    @error('status') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="status_aktif" class="block text-sm font-semibold text-slate-700">Status Keaktifan <span class="text-red-500">*</span></label>
                                    <select id="status_aktif" wire:model="status_aktif" class="mt-1 block w-full rounded-lg border-slate-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm py-2 px-3 transition-colors">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Cuti">Cuti</option>
                                    </select>
                                    @error('status_aktif') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>

                        <!-- Modal Footer -->
                        <div class="bg-slate-50 px-6 py-4 border-t border-slate-150 flex items-center justify-end gap-3">
                            <button type="button" wire:click="closeModal" class="inline-flex justify-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 focus:outline-none transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="inline-flex justify-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-[#1e3a8a] hover:bg-[#152a66] focus:outline-none transition-colors shadow-sm">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($isDeleteModalOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-slate-900 bg-opacity-40 transition-opacity" aria-hidden="true" wire:click="closeDeleteModal"></div>

                <!-- Centered positioner -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Modal Content -->
                <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full border border-slate-100"
                     x-data x-transition>
                    
                    <div class="bg-white px-6 pt-6 pb-4">
                        <div class="sm:flex sm:items-start gap-4">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-bold text-slate-900" id="modal-title">
                                    Hapus Data Dosen
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-slate-500">
                                        Apakah Anda yakin ingin menghapus data dosen ini? Tindakan ini tidak dapat dibatalkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 px-6 py-4 flex items-center justify-end gap-3">
                        <button type="button" wire:click="closeDeleteModal" class="inline-flex justify-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 focus:outline-none transition-colors">
                            Batal
                        </button>
                        <button type="button" wire:click="destroy" class="inline-flex justify-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none transition-colors shadow-sm">
                            Hapus
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
