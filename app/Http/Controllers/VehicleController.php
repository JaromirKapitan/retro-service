<?php

namespace App\Http\Controllers;


use App\Services\VehiclePageService;

class VehicleController extends Controller
{
    public function __construct(
        private VehiclePageService $vehiclePageService
    ) {}

    // index
    public function index()
    {
        return inertia('VehiclesPage', [
            'filter' => $this->vehiclePageService->getFilter(),
            'vehicles' => $this->vehiclePageService->getVehicles(),
        ]);
    }

    public function show(string $seo)
    {
        return inertia('VehiclePage', [
            'vehicle' => $this->vehiclePageService->getVehicleBySeo($seo),
        ]);
    }
}
