@extends('layouts.app', ['title' => 'Placeholder'])

@section('content')
    <div class="flex flex-col items-center justify-center min-h-[60vh]">
        <div class="p-4 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-500 rounded-full mb-6">
            <i data-lucide="construction" class="w-16 h-16"></i>
        </div>
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">Fitur {{ $name ?? 'Menu' }} Sedang Dalam Pengembangan</h2>
        <p class="text-gray-600 dark:text-gray-400 text-center max-w-md">
            Harap hubungi Admin IT UHB untuk informasi lebih lanjut mengenai ketersediaan modul ini.
        </p>
        <a href="{{ route('dashboard') }}" class="mt-8 px-6 py-2.5 bg-blue-800 hover:bg-blue-700 text-white font-medium rounded-lg shadow transition-colors inline-flex items-center">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Kembali ke Dashboard
        </a>
    </div>
@endsection
