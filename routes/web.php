<?php

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

    Route::get('/events', function () {
        return view('events');
    })->name('events');

    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');

    Route::get('/certificates', function () {
        return view('certificates');
    })->name('certificates');
});

