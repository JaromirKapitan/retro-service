<?php

use Illuminate\Support\Facades\Route;
use ThemeFreelancer\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('theme.home');
