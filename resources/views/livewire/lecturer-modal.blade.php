<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            
            <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
                <h3 class="text-lg leading-6 font-bold text-slate-900" id="modal-headline">
                    {{ $lecturer_id ? 'Edit Data Dosen' : 'Tambah Data Dosen Baru' }}
                </h3>
            </div>

            <form wire:submit.prevent="store">
                <div class="bg-white px-6 pt-5 pb-6">
                    <div class="space-y-4">
                        
                        <div>
                            <label for="full_name" class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="full_name" class="w-full rounded-md border-slate-300 shadow-sm focus:border-[#1e3a8a] focus:ring focus:ring-[#1e3a8a] focus:ring-opacity-50 text-sm" placeholder="Contoh: Budi Santoso" wire:model="full_name">
                            @error('full_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="title" class="block text-sm font-semibold text-slate-700 mb-1">Gelar (Opsional)</label>
                            <input type="text" id="title" class="w-full rounded-md border-slate-300 shadow-sm focus:border-[#1e3a8a] focus:ring focus:ring-[#1e3a8a] focus:ring-opacity-50 text-sm" placeholder="Contoh: S.Kom., M.Kom." wire:model="title">
                            @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="nidn" class="block text-sm font-semibold text-slate-700 mb-1">NIDN / NIK</label>
                                <input type="text" id="nidn" class="w-full rounded-md border-slate-300 shadow-sm focus:border-[#1e3a8a] focus:ring focus:ring-[#1e3a8a] focus:ring-opacity-50 text-sm" placeholder="Nomor Induk" wire:model="nidn">
                                @error('nidn') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-semibold text-slate-700 mb-1">Status Kepegawaian</label>
                                <select id="status" wire:model="status" class="w-full rounded-md border-slate-300 shadow-sm focus:border-[#1e3a8a] focus:ring focus:ring-[#1e3a8a] focus:ring-opacity-50 text-sm">
                                    <option value="Tetap">Dosen Tetap</option>
                                    <option value="LB">Dosen Luar Biasa (LB)</option>
                                </select>
                                @error('status') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="study_program" class="block text-sm font-semibold text-slate-700 mb-1">Program Studi</label>
                            <input type="text" id="study_program" class="w-full rounded-md border-slate-300 shadow-sm focus:border-[#1e3a8a] focus:ring focus:ring-[#1e3a8a] focus:ring-opacity-50 text-sm" placeholder="Contoh: Teknik Informatika" wire:model="study_program">
                            @error('study_program') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="profile_photo" class="block text-sm font-semibold text-slate-700 mb-1">Foto Profil (Opsional)</label>
                            <input type="file" id="profile_photo" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e3a8a] hover:file:bg-blue-100" wire:model="profile_photo">
                            @error('profile_photo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>@enderror
                            
                            <div wire:loading wire:target="profile_photo" class="text-xs text-blue-600 mt-1">Mengunggah gambar...</div>
                        </div>

                    </div>
                </div>
                
                <div class="bg-slate-50 px-6 py-4 border-t border-slate-100 flex justify-end gap-3 rounded-b-xl">
                    <button wire:click="closeModal()" type="button" class="inline-flex justify-center rounded-lg border border-slate-300 px-4 py-2 bg-white text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent px-4 py-2 bg-[#1e3a8a] text-sm font-medium text-white shadow-sm hover:bg-[#152a66] focus:outline-none transition-colors">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
