<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-gradient-to-r from-blue-700 to-blue-900 px-6 py-4 text-white">
                <h3 class="text-lg font-bold" id="modal-headline">
                    {{ $record_id ? 'Edit Rekap Pengajaran' : 'Tambah Rekap Pengajaran Baru' }}
                </h3>
            </div>
            <form>
                <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="space-y-4">
                        <div>
                            <label for="lecturer_id" class="block text-gray-700 text-sm font-bold mb-2">Nama Dosen:</label>
                            <select class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="lecturer_id" wire:model="lecturer_id">
                                <option value="">-- Pilih Dosen Pengampu --</option>
                                @foreach($all_lecturers as $l)
                                    <option value="{{ $l->id }}">{{ $l->full_name }} ({{ $l->status }})</option>
                                @endforeach
                            </select>
                            @error('lecturer_id') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="course_name" class="block text-gray-700 text-sm font-bold mb-2">Mata Kuliah:</label>
                            <input type="text" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="course_name" placeholder="Masukkan Nama Mata Kuliah" wire:model="course_name">
                            @error('course_name') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="semester" class="block text-gray-700 text-sm font-bold mb-2">Semester:</label>
                                <input type="text" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="semester" placeholder="Gasal 2025/2026" wire:model="semester">
                                @error('semester') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="credit_hours" class="block text-gray-700 text-sm font-bold mb-2">SKS:</label>
                                <input type="number" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="credit_hours" wire:model="credit_hours" min="1">
                                @error('credit_hours') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <!-- UTS Form Fields -->
                        <div class="bg-blue-50/50 p-4 rounded-xl border border-blue-100">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-blue-800 mb-3">Ujian Tengah Semester (UTS)</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="uts_method" class="block text-gray-600 text-xs font-bold mb-1">Metode UTS:</label>
                                    <select class="shadow appearance-none border border-gray-300 rounded-lg w-full py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="uts_method" wire:model="uts_method">
                                        <option value="CBT">CBT</option>
                                        <option value="PBT">PBT</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('uts_method') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div>
                                    <label for="uts_student_count" class="block text-gray-600 text-xs font-bold mb-1">Jumlah Mahasiswa:</label>
                                    <input type="number" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="uts_student_count" wire:model="uts_student_count" min="0">
                                    @error('uts_student_count') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- UAS Form Fields -->
                        <div class="bg-indigo-50/50 p-4 rounded-xl border border-indigo-100">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-indigo-800 mb-3">Ujian Akhir Semester (UAS)</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="uas_method" class="block text-gray-600 text-xs font-bold mb-1">Metode UAS:</label>
                                    <select class="shadow appearance-none border border-gray-300 rounded-lg w-full py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="uas_method" wire:model="uas_method">
                                        <option value="CBT">CBT</option>
                                        <option value="PBT">PBT</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('uas_method') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div>
                                    <label for="uas_student_count" class="block text-gray-600 text-xs font-bold mb-1">Jumlah Mahasiswa:</label>
                                    <input type="number" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-1.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="uas_student_count" wire:model="uas_student_count" min="0">
                                    @error('uas_student_count') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mengajar (Opsional):</label>
                                <input type="date" class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="date" wire:model="date">
                                @error('date') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                            </div>
                            <div>
                                <label for="material" class="block text-gray-700 text-sm font-bold mb-2">Materi yang Diajarkan (Opsional):</label>
                                <textarea class="shadow appearance-none border border-gray-300 rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" id="material" wire:model="material" placeholder="Masukkan detail materi" rows="2"></textarea>
                                @error('material') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-4 sm:flex sm:flex-row-reverse border-t border-gray-100">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-lg border border-transparent px-5 py-2.5 bg-green-600 text-sm font-bold text-white shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                            Simpan Data
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-lg border border-gray-300 px-5 py-2.5 bg-white text-sm font-bold text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                            Batal
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
