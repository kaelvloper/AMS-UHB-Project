<div class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
    <div class="overflow-x-auto relative">
        <!-- Loading Overlay -->
        <div wire:loading.flex class="absolute inset-0 bg-white/50 backdrop-blur-[2px] z-10 items-center justify-center">
             <div class="flex flex-col items-center">
                <svg class="animate-spin h-10 w-10 text-blue-600 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-xs font-bold text-blue-900 uppercase tracking-widest">Memperbarui Data...</span>
             </div>
        </div>

        <table class="w-full text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-4 font-bold text-[10px] uppercase tracking-widest text-center">No</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest">Mata Kuliah</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest">Dosen Pengampu</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-center">Pertemuan</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-center">Online</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-center">Offline</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest">Koordinator</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-center">Status</th>
                    <th class="px-6 py-4 font-bold text-xs uppercase tracking-widest text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($kjms as $index => $kjm)
                    <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                        <td class="px-4 py-4 text-center">
                            <span class="text-xs font-bold text-gray-400">
                                {{ $kjms->firstItem() + $index }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">
                                {{ $kjm->mata_kuliah }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-blue-900">
                                @if($kjm->dosen)
                                    {{ $kjm->dosen->nama }}{{ $kjm->dosen->gelar ? ', ' . $kjm->dosen->gelar : '' }}
                                @else
                                    {{ $kjm->dosen_pengampu ?: '-' }}
                                @endif
                            </div>
                            <div class="text-[10px] text-gray-400 font-bold uppercase mt-1 tracking-tighter">
                                NIM/NIDN: <span class="text-blue-600">{{ $kjm->dosen ? $kjm->dosen->nidn : ($kjm->nim ?: '-') }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-extrabold text-gray-900 bg-gray-100 px-3 py-1 rounded-lg">
                                {{ $kjm->jumlah_pertemuan }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($kjm->is_online)
                                <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase bg-green-100 text-green-700 border border-green-200">Iya</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase bg-red-100 text-red-700 border border-red-200">Tidak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($kjm->is_offline)
                                <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase bg-green-100 text-green-700 border border-green-200">Iya</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[8px] font-black uppercase bg-red-100 text-red-700 border border-red-200">Tidak</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-[10px] text-gray-500 font-bold uppercase tracking-tighter">
                                {{ $kjm->dosen_koordinator ?: '-' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <x-status-badge :type="$kjm->status_realisasi">
                                {{ $kjm->status_realisasi }}
                            </x-status-badge>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-4">
                                <button 
                                    wire:click="$dispatch('editKjm', { id: {{ $kjm->id }} })"
                                    class="text-blue-600 hover:text-blue-900 transition-all hover:scale-105"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button 
                                    wire:confirm="Apakah Anda yakin ingin menghapus data ini?"
                                    wire:click="deleteKjm({{ $kjm->id }})"
                                    class="text-red-500 hover:text-red-700 transition-all hover:scale-105"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                                <p class="text-gray-500 font-bold text-lg uppercase tracking-widest">Data Tidak Ditemukan</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
        {{ $kjms->links() }}
    </div>
</div>
