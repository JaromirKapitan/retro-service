<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['sync.lang'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/vehicles', [\App\Http\Controllers\VehicleController::class, 'index']);
    Route::get('/vehicle/{seo}', [\App\Http\Controllers\VehicleController::class, 'show'])->name('vehicle.show');
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

require_once __DIR__ . '/admin.php';

// musi byt posledny !!!
Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
