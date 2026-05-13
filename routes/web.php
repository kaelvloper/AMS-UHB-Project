<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KjmController;

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

    Route::resource('kjm', KjmController::class);
    
    Route::get('/placeholder', function () {
        return view('placeholder', ['name' => request('name', 'Menu')]);
    })->name('placeholder');
});
