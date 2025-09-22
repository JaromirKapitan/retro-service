<?php

use Illuminate\Support\Facades\Route;
use ThemeDefault\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('theme.home');
