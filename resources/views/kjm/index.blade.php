@extends('layouts.app', ['title' => 'Manajemen KJM'])

@section('content')
<div x-data="{ isModalOpen: false, modalMode: 'create', modalData: {}, openModal(mode, data = {}) { this.modalMode = mode; this.modalData = data; this.isModalOpen = true; if(mode === 'create'){ this.modalData = { is_online: false, is_offline: true, lampiran_count: 0, status_realisasi: 'Terealisasi' } } } }">
    
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <nav class="text-sm font-medium text-gray-500 mb-1">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('dashboard') }}" class="hover:text-blue-600 transition-colors">Home</a>
                        <i data-lucide="chevron-right" class="w-4 h-4 mx-2"></i>
                    </li>
                    <li class="text-gray-800 dark:text-gray-200">Manajemen KJM</li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Manajemen KJM</h1>
        </div>
        <button @click="openModal('create')" class="bg-blue-800 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-sm flex items-center transition-all">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Data
        </button>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center">
            <div class="p-3 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-lg mr-4">
                <i data-lucide="book" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Mata Kuliah</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalMataKuliah }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center">
            <div class="p-3 bg-purple-100 dark:bg-purple-900/50 text-purple-600 dark:text-purple-400 rounded-lg mr-4">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Dosen</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalDosen }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center">
            <div class="p-3 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg mr-4">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total KJM</p>
                <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $totalKjm }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center">
            <div class="p-3 bg-green-100 dark:bg-green-900/50 text-green-600 dark:text-green-400 rounded-lg mr-4">
                <i data-lucide="check-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Terealisasi</p>
                <p class="text-xl font-bold text-green-600 dark:text-green-400">{{ $terealisasi }}</p>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center">
            <div class="p-3 bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-400 rounded-lg mr-4">
                <i data-lucide="x-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Belum Terealisasi</p>
                <p class="text-xl font-bold text-red-600 dark:text-red-400">{{ $belumTerealisasi }}</p>
            </div>
        </div>
    </div>

    <!-- Filter & Tools Section -->
    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 mb-6 flex flex-wrap justify-between items-center gap-4">
        <form method="GET" action="{{ route('kjm.index') }}" class="flex items-center space-x-2">
            <div class="relative">
                <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari MK/Dosen..." class="pl-9 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white w-64">
            </div>
            <select name="status" class="border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="Terealisasi" {{ request('status') == 'Terealisasi' ? 'selected' : '' }}>Terealisasi</option>
                <option value="Belum" {{ request('status') == 'Belum' ? 'selected' : '' }}>Belum</option>
            </select>
            @if(request('search') || request('status'))
                <a href="{{ route('kjm.index') }}" class="text-sm text-gray-500 hover:text-red-500">Reset</a>
            @endif
        </form>
        <div class="flex space-x-2">
            <button class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-lg text-sm hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors border border-gray-200 dark:border-gray-600">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> PDF
            </button>
            <button class="flex items-center px-4 py-2 bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-green-400 rounded-lg text-sm hover:bg-green-100 dark:hover:bg-green-900/50 transition-colors border border-green-200 dark:border-green-800">
                <i data-lucide="download" class="w-4 h-4 mr-2"></i> Excel
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                    <tr class="text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Mata Kuliah</th>
                        <th class="px-6 py-4">Dosen Pengampu</th>
                        <th class="px-6 py-4 text-center">Pertemuan</th>
                        <th class="px-6 py-4 text-center">Online</th>
                        <th class="px-6 py-4 text-center">Offline</th>
                        <th class="px-6 py-4 text-center">Lampiran</th>
                        <th class="px-6 py-4">Koordinator</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($kjms as $index => $kjm)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $kjms->firstItem() + $index }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $kjm->mata_kuliah }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $kjm->dosen_pengampu }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400 text-center">{{ $kjm->jumlah_pertemuan }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($kjm->is_online)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400">Iya</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400">Tidak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($kjm->is_offline)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400">Iya</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400">Tidak</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                @if($kjm->lampiran_count > 0)
                                    <button class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300" title="View Attachment">
                                        <i data-lucide="paperclip" class="w-4 h-4 inline"></i> {{ $kjm->lampiran_count }}
                                    </button>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $kjm->dosen_koordinator }}</td>
                            <td class="px-6 py-4">
                                @if($kjm->status_realisasi == 'Terealisasi')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">
                                        Terealisasi
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">
                                        Belum
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium space-x-2">
                                <button @click="openModal('edit', {{ json_encode($kjm) }})" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 inline-block">
                                    <i data-lucide="edit-2" class="w-4 h-4"></i>
                                </button>
                                <form action="{{ route('kjm.destroy', $kjm->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                <i data-lucide="inbox" class="w-8 h-8 mx-auto mb-2 text-gray-400"></i>
                                <p>Tidak ada data KJM ditemukan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($kjms->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $kjms->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal -->
    <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="isModalOpen = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel -->
            <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200 dark:border-gray-700">
                
                <form :action="modalMode === 'edit' ? '/kjm/' + modalData.id : '{{ route('kjm.store') }}'" method="POST">
                    @csrf
                    <template x-if="modalMode === 'edit'">
                        <input type="hidden" name="_method" value="PUT">
                    </template>
                    
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title" x-text="modalMode === 'edit' ? 'Edit Data KJM' : 'Tambah Data KJM'"></h3>
                                <div class="mt-4 space-y-4">
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mata Kuliah</label>
                                        <input type="text" name="mata_kuliah" x-model="modalData.mata_kuliah" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dosen Pengampu</label>
                                        <input type="text" name="dosen_pengampu" x-model="modalData.dosen_pengampu" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Pertemuan</label>
                                            <input type="number" name="jumlah_pertemuan" x-model="modalData.jumlah_pertemuan" min="1" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Jumlah Lampiran</label>
                                            <input type="number" name="lampiran_count" x-model="modalData.lampiran_count" min="0" max="2" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex items-center mt-2">
                                            <input type="checkbox" name="is_online" x-model="modalData.is_online" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Online</label>
                                        </div>
                                        <div class="flex items-center mt-2">
                                            <input type="checkbox" name="is_offline" x-model="modalData.is_offline" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                            <label class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Offline</label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dosen Koordinator</label>
                                        <select name="dosen_koordinator" x-model="modalData.dosen_koordinator" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                            <option value="">Pilih Koordinator...</option>
                                            <option value="Pak Imam">Pak Imam</option>
                                            <option value="Bu Ayu">Bu Ayu</option>
                                            <option value="Lina">Lina</option>
                                            <!-- In real app, loop from dosen list -->
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status Realisasi</label>
                                        <select name="status_realisasi" x-model="modalData.status_realisasi" required class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                                            <option value="Terealisasi">Terealisasi</option>
                                            <option value="Belum">Belum</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-blue-800 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Simpan
                        </button>
                        <button type="button" @click="isModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Auto init lucide icons after page loads/updates -->
<script>
    document.addEventListener('alpine:initialized', () => {
        lucide.createIcons();
    });
</script>
@endsection
