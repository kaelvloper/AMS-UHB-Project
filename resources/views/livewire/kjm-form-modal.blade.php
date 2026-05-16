<div>
    @if($isOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Background Backdrop -->
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div 
                    class="fixed inset-0 bg-blue-900/40 backdrop-blur-sm transition-opacity" 
                    aria-hidden="true"
                    wire:click="$set('isOpen', false)"
                ></div>

                <!-- Modal Panel -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full border border-gray-100">
                    <div class="bg-white">
                        <!-- Modal Header -->
                        <div class="bg-blue-600 px-6 py-4 flex items-center justify-between">
                            <h3 class="text-lg font-black text-white uppercase tracking-widest">
                                {{ $kjmId ? 'Edit Kontrak KJM' : 'Tambah Kontrak Baru' }}
                            </h3>
                            <button wire:click="$set('isOpen', false)" class="text-white hover:text-gray-200 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="px-8 py-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Mata Kuliah -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Mata Kuliah</label>
                                    <input 
                                        wire:model.live="mata_kuliah" 
                                        type="text" 
                                        class="w-full px-4 py-2.5 border @error('mata_kuliah') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                        placeholder="Masukkan nama mata kuliah..."
                                    >
                                    @error('mata_kuliah') <span class="text-red-500 text-[10px] font-bold uppercase mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Pilih Dosen (Sync) -->
                                <div class="md:col-span-2">
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Pilih Dosen (Sistem)</label>
                                    <select 
                                        wire:model.live="dosen_id" 
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                    >
                                        <option value="">-- Pilih Dosen dari Data Dosen UHB --</option>
                                        @foreach($dosens as $dosen)
                                            <option value="{{ $dosen->id }}">{{ $dosen->nama }} ({{ $dosen->nidn }})</option>
                                        @endforeach
                                    </select>
                                    <p class="text-[10px] text-gray-400 mt-1 font-bold italic">*Kosongkan jika ingin input manual di bawah.</p>
                                </div>

                                <!-- Dosen Pengampu (Manual/Backup) -->
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Nama Dosen (Manual)</label>
                                    <input 
                                        wire:model.live="dosen_pengampu" 
                                        type="text" 
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                        placeholder="Nama dosen..."
                                    >
                                </div>

                                <!-- NIM (Manual/Backup) -->
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">NIM / NIDN (Manual)</label>
                                    <input 
                                        wire:model.live="nim" 
                                        type="text" 
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                        placeholder="Masukkan NIM..."
                                    >
                                </div>

                                <!-- Koordinator -->
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Dosen Koordinator</label>
                                    <input 
                                        wire:model.live="dosen_koordinator" 
                                        type="text" 
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                        placeholder="Nama koordinator..."
                                    >
                                </div>

                                <!-- Jumlah Pertemuan -->
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Jumlah Pertemuan</label>
                                    <input 
                                        wire:model.live="jumlah_pertemuan" 
                                        type="number" 
                                        class="w-full px-4 py-2.5 border @error('jumlah_pertemuan') border-red-500 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                    >
                                    @error('jumlah_pertemuan') <span class="text-red-500 text-[10px] font-bold uppercase mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Metode Pembelajaran -->
                                <div class="flex items-center gap-6 py-2">
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" wire:model.live="is_online" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                        <span class="ml-2 text-sm font-bold text-gray-600 group-hover:text-blue-600 transition-colors">Online</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer group">
                                        <input type="checkbox" wire:model.live="is_offline" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                                        <span class="ml-2 text-sm font-bold text-gray-600 group-hover:text-blue-600 transition-colors">Offline</span>
                                    </label>
                                </div>

                                <!-- Status -->
                                <div>
                                    <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-1">Status Realisasi</label>
                                    <select 
                                        wire:model.live="status_realisasi" 
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all font-bold text-gray-900"
                                    >
                                        <option value="Belum">Belum Terealisasi</option>
                                        <option value="Berjalan">Berjalan</option>
                                        <option value="Terealisasi">Terealisasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="bg-gray-50 px-8 py-4 flex items-center justify-between border-t border-gray-100">
                            <button 
                                wire:click="$set('isOpen', false)" 
                                class="text-xs font-black text-gray-400 hover:text-gray-600 uppercase tracking-widest transition-colors"
                            >
                                Batal
                            </button>
                            <button 
                                wire:click="save"
                                wire:loading.attr="disabled"
                                class="inline-flex items-center px-6 py-2.5 bg-blue-600 border border-transparent rounded-xl font-black text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <span wire:loading.remove wire:target="save">Simpan Perubahan</span>
                                <span wire:loading wire:target="save" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Memproses...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
