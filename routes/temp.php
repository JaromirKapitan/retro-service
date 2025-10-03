<?php

use Illuminate\Support\Facades\Route;

Route::get('/temp/{template}', function ($template) {
    return view('temp.'.$template);
})->name('temp');
