<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect('/');
})->name('language');

require_once __DIR__ . '/temp.php';
require_once __DIR__ . '/admin.php';

// musi byt posledny !!!
Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
