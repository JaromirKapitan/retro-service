<?php

use Illuminate\Support\Facades\Route;
use ClassicWhite\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('theme.home');
Route::get('/{slug}', [HomeController::class, 'show'])->name('theme.show')->where(['slug' => '^[admin]']);
