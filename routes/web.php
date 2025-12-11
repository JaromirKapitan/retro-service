<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Auth::routes();

Route::middleware(['sync.lang'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('HomePage', []);
    });

    Route::get('/vehicles', function () {
        return Inertia::render('VehiclesPage', []);
    });
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

require_once __DIR__ . '/admin.php';
