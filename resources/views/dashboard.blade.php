@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl p-8 border border-gray-100 dark:border-gray-700">
        <div class="flex items-center space-x-4 mb-8">
            <div class="p-3 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 rounded-2xl">
                <i data-lucide="layout-dashboard" class="w-8 h-8"></i>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Selamat Datang, Admin!</h3>
                <p class="text-gray-500 dark:text-gray-400">Panel Kendali Academic Management System - Universitas Harapan Bangsa.</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 max-w-md">
            <!-- Shortcut to KJM -->
            <a href="{{ route('kjm.index') }}" class="group p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl hover:border-blue-500 dark:hover:border-blue-500 hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <h4 class="font-bold text-gray-900 dark:text-white text-lg">Manajemen KJM</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Kelola data Kontrak Jaminan Mutu, Dosen Pengampu, dan Realisasi Perkuliahan.</p>
                <div class="mt-4 flex items-center text-blue-600 dark:text-blue-400 text-sm font-semibold">
                    Buka Modul <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>
        </div>
    </div>
@endsection
