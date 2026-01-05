<?php

namespace App\Http\Controllers;

use App\Services\VehiclePageService;

class VehicleController extends Controller
{
    public function __construct(
        private VehiclePageService $vehiclePageService
    ) {}

    /**
     * Display a listing of the resource.
     * filter vehicles by type, brand, model, year (year_from, year_to) from request parameters
     *      - filter can be empty
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        $page = $this->vehiclePageService->getWebPage();

        return inertia('VehiclesPage', [
            'page' => $page,
            'hero_img' => $page->getMedia('images')->first()->getUrl(),
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
