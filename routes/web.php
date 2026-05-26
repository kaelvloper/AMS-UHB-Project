<?php

use App\Http\Controllers\DistribusiPerkuliahanController;
use App\Http\Controllers\RekapDosenLbController;
use App\Http\Controllers\ManajemenKjmController;
use App\Http\Controllers\RekapHonorUjianController;
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

<<<<<<< HEAD
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

=======
    Route::get('/dosen', function () {
        return view('dosen');
    })->name('dosen');

    Route::resource('distribusiku', DistribusiPerkuliahanController::class);
    Route::resource('rekap-lb', RekapDosenLbController::class);
    Route::resource('manajemen-kjm', ManajemenKjmController::class);
    Route::resource('honor-ujian', RekapHonorUjianController::class);
    Route::resource('rekap-nilai', App\Http\Controllers\RekapNilaiMahasiswaController::class);
    Route::resource('rekap-kegiatan', App\Http\Controllers\RekapKegiatanUhbController::class);
>>>>>>> 8c23ed1adc5ddda7d6e7f8a0ae2aea090a44839b
});
