<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [\ThemeDefault\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/temp/{template}', function ($template) {
    return view('temp.'.$template);
})->name('temp');

require_once __DIR__ . '/admin.php';


Route::get('/{slug}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
