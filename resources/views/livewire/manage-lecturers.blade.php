<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Dosen UHB') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-bold text-slate-900 tracking-tight">
                        Data Dosen UHB
                    </h2>
                    <p class="mt-2 text-sm text-slate-600">
                        Kelola informasi dan status dosen di lingkungan Universitas Harapan Bangsa (UHB).
                    </p>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                    <p class="font-medium">{{ session('message') }}</p>
                </div>
            @endif

            @if($isModalOpen)
                @include('livewire.lecturer-modal')
            @endif

            <!-- Main Card -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                
                <!-- Toolbar -->
                <div class="p-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Search Bar -->
                    <div class="relative w-full md:w-1/2 lg:w-2/5">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input wire:model.live.debounce.300ms="search" type="search" class="block w-full py-2.5 pl-10 pr-4 text-sm text-slate-900 bg-white rounded-full border border-slate-300 focus:ring-[#1e3a8a] focus:border-[#1e3a8a] transition-colors" placeholder="Cari Nama, NIDN atau Program Studi...">
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <select wire:model.live="filter_status" class="inline-flex items-center pl-4 pr-10 py-2.5 bg-slate-200 border border-transparent rounded-lg font-medium text-sm text-slate-700 hover:bg-slate-300 focus:outline-none focus:ring-2 focus:ring-[#1e3a8a] transition-colors appearance-none cursor-pointer">
                                <option value="">Semua Status</option>
                                <option value="Tetap">Tetap</option>
                                <option value="LB">LB</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                        
                        <button wire:click="create()" type="button" class="inline-flex items-center px-4 py-2.5 bg-[#1e3a8a] border border-transparent rounded-lg font-medium text-sm text-white hover:bg-[#152a66] focus:outline-none transition-colors shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Dosen
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-600">
                        <thead class="text-xs text-slate-500 bg-slate-100 border-b border-slate-200">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-center">No</th>
                                <th scope="col" class="px-6 py-4 font-medium">Foto Profil</th>
                                <th scope="col" class="px-6 py-4 font-medium">Nama Lengkap (dengan Gelar)</th>
                                <th scope="col" class="px-6 py-4 font-medium">NIDN/NIK</th>
                                <th scope="col" class="px-6 py-4 font-medium">Program Studi</th>
                                <th scope="col" class="px-6 py-4 font-medium">Status</th>
                                <th scope="col" class="px-6 py-4 font-medium text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($lecturers as $lecturer)
                            <tr class="hover:bg-slate-50 transition-colors bg-white">
                                <td class="px-6 py-3 whitespace-nowrap text-center">{{ $loop->iteration + $lecturers->firstItem() - 1 }}</td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center overflow-hidden border border-slate-200">
                                        @if($lecturer->profile_photo)
                                            <img src="{{ Storage::url($lecturer->profile_photo) }}" alt="Avatar" class="w-full h-full object-cover">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($lecturer->full_name) }}&background=random" alt="Avatar" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    <div class="font-bold text-slate-900">{{ $lecturer->full_name }}</div>
                                    <div class="text-xs text-slate-500 mt-0.5">{{ $lecturer->title }}</div>
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    {{ $lecturer->nidn }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-slate-700">
                                    {{ $lecturer->study_program }}
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap">
                                    @if($lecturer->status == 'Tetap')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-[#1e3a8a] text-white">Tetap</span>
                                    @else
                                        <span class="inline-flex items-center px-4 py-1 rounded-full text-xs font-semibold bg-[#22c55e] text-white">LB</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 whitespace-nowrap text-center">
                                    <button wire:click="edit({{ $lecturer->id }})" class="text-indigo-600 hover:text-indigo-900 mx-1">
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </button>
                                    <button wire:click="delete({{ $lecturer->id }})" class="text-red-600 hover:text-red-900 mx-1">
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                                    Tidak ada data dosen yang ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer / Pagination -->
                <div class="bg-white px-6 py-4 border-t border-slate-200">
                    {{ $lecturers->links() }}
                </div>

            </div>
            
        </div>
    </div>
</div>
