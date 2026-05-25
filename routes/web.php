<?php

use App\Http\Controllers\DistribusiPerkuliahanController;
use App\Http\Controllers\RekapDosenLbController;
use App\Http\Controllers\ManajemenKjmController;
use App\Http\Controllers\RekapHonorUjianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dosen', function () {
        return view('dosen');
    })->name('dosen');

    Route::resource('distribusiku', DistribusiPerkuliahanController::class);
    Route::resource('rekap-lb', RekapDosenLbController::class);
    Route::resource('manajemen-kjm', ManajemenKjmController::class);
    Route::resource('honor-ujian', RekapHonorUjianController::class);
});
