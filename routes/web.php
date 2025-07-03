<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EvenementController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

// Evenement routes
Route::get('/evenementen', [EvenementController::class, 'index'])->name('evenementen.index');
Route::get('/evenementen/{evenement}', [EvenementController::class, 'show'])->name('evenementen.show');
