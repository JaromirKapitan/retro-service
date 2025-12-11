<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Auth::routes();

Route::middleware(['sync.lang'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('HomePage', [
            'stats' => [
                'vehicles' => \App\Models\Vehicle::published()->count(),
                'moto' => \App\Models\Vehicle::ofType(\App\Enums\VehicleTypeEnum::MOTO)->published()->count(),
                'cars' => \App\Models\Vehicle::ofType(\App\Enums\VehicleTypeEnum::CAR)->published()->count(),
                'buses' => \App\Models\Vehicle::ofType(\App\Enums\VehicleTypeEnum::BUS)->published()->count(),
            ],
            'page' => \App\Http\Resources\WebPageResource::make(\App\Models\WebPage::home()->first()),
        ]);
    });

    Route::get('/vehicles', function () {
        return Inertia::render('VehiclesPage', []);
    });
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

require_once __DIR__ . '/admin.php';
