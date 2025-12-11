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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect('/');
})->name('language');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

require_once __DIR__ . '/temp.php';
require_once __DIR__ . '/admin.php';

// musi byt posledny !!!
Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
