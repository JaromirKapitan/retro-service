<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('login');

    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('login');

    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Password reset
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // web-pages
        Route::resource('web-pages', \App\Http\Controllers\Admin\WebPageController::class);

        Route::get('/web-menu/edit', [\App\Http\Controllers\Admin\WebMenuController::class, 'edit'])->name('web-menu.edit');

        // articles
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
        Route::get('/articles/{id}/images', [\App\Http\Controllers\Admin\ArticleController::class, 'images'])->name('articles.images');
        Route::get('/articles/{id}/files', [\App\Http\Controllers\Admin\ArticleController::class, 'files'])->name('articles.files');
    });
});
