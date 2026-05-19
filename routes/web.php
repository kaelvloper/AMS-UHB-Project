<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('nilai.panjang');
});

// Preview halaman Nilai Panjang tanpa login
Route::get('/nilai-panjang', function () {
    return view('pages.nilai.panjang');
})->name('nilai.panjang');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Nilai Mahasiswa
    Route::get('/nilai', function () {
        return view('pages.nilai.index');
    })->name('nilai.index');

    // Data Mahasiswa
    Route::get('/mahasiswa', function () {
        return view('pages.mahasiswa.index');
    })->name('mahasiswa.index');

    Route::get('/mahasiswa/{nim}', function ($nim) {
        return view('pages.mahasiswa.show', compact('nim'));
    })->name('mahasiswa.show');

    // Statistik
    Route::get('/statistik', function () {
        return view('pages.statistik.index');
    })->name('statistik.index');

});
