<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Kontrak Jaminan Mutu (KJM)') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumb -->
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" wire:navigate class="inline-flex items-center text-xs font-bold text-gray-400 hover:text-blue-600 transition-colors uppercase tracking-widest">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest">Manajemen KJM</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Header Section -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-blue-900">Daftar Kontrak Jaminan Mutu</h3>
                    <p class="text-gray-500 text-sm mt-1">Monitoring pelaksanaan perkuliahan dan perhitungan beban mengajar dosen.</p>
                </div>
                <div>
                    <button 
                        wire:click="$dispatch('openModal')"
                        class="inline-flex items-center px-4 py-2.5 bg-blue-600 border border-transparent rounded-xl font-bold text-sm text-white hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all shadow-md hover:shadow-lg"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Kontrak Baru
                    </button>
                </div>
            </div>

            <!-- Stats Section -->
            <livewire:kjm-stats />

            <!-- Filter Section -->
            <div class="mt-8">
                <livewire:kjm-filter-section />
            </div>

            <!-- Table Section -->
            <div class="mt-6">
                <livewire:kjm-table />
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <livewire:kjm-form-modal />
</div>
