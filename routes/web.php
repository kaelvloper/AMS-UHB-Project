<?php

use App\Http\Controllers\DistribusiPerkuliahanController;
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
});
