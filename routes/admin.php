<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
//    Route::middleware(\App\Http\Middleware\CanRegisterAdmin::class)->group(function () {
//        Route::get('/register', [\App\Http\Controllers\Admin\Auth\AdminRegistrationController::class, 'create'])->name('register');
//        Route::post('/register', [\App\Http\Controllers\Admin\Auth\AdminRegistrationController::class, 'store'])->name('register.store');
//    });

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
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::get('/pull', [\App\Http\Controllers\Admin\SystemController::class, 'pull'])->name('pull');
        // media uploader
        Route::post('/ckeditor-uploader', [\App\Http\Controllers\Admin\CkeditorController::class, 'upload'])->name('ckeditor.uploader');

        Route::get('/password', [\App\Http\Controllers\Admin\PasswordController::class, 'create'])->name('password.create');
        Route::post('/password', [\App\Http\Controllers\Admin\PasswordController::class, 'store'])->name('password.store');

        Route::resource('admins', \App\Http\Controllers\Admin\AdminController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

        // web-pages
        Route::resource('web-pages', \App\Http\Controllers\Admin\WebPageController::class);
        Route::get('/web-menu/edit', [\App\Http\Controllers\Admin\WebMenuController::class, 'edit'])->name('web-menu.edit');

        // articles
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
        Route::get('/articles/{id}/images', [\App\Http\Controllers\Admin\ArticleController::class, 'images'])->name('articles.images');
        Route::get('/articles/{id}/files', [\App\Http\Controllers\Admin\ArticleController::class, 'files'])->name('articles.files');

        // vehicles
        Route::resource('vehicles', \App\Http\Controllers\Admin\VehicleController::class);

        // tasks
        Route::resource('tasks', \App\Http\Controllers\Admin\TaskController::class);
        Route::post('/tasks/{task}/assign', [\App\Http\Controllers\Admin\TaskController::class, 'assign'])->name('tasks.assign');
        Route::post('/tasks/reorder', [\App\Http\Controllers\Admin\TaskController::class, 'reorder'])->name('tasks.reorder');
    });
});
