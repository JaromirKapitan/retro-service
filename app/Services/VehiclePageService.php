<?php

namespace App\Services;

use App\Enums\VehicleTypeEnum;
use App\Http\Resources\WebPageResource;
use App\Models\Vehicle;
use App\Models\WebPage;

class VehiclePageService
{
    public function getFilter(): array
    {
        return [
            // types of published vehicles from model Vehicle
            'types' => Vehicle::published()
                ->select('type')
                ->distinct()
                ->get()
                ->map(function ($vehicle) {
                    return [
                        'value' => $vehicle->typeEnum,
                        'title' => $vehicle->typeEnum->getTitle(),
                    ];
                }),

            'brands' => Vehicle::published()
                ->select('brand')
                ->distinct()
                ->get()
                ->map(function ($vehicle) {
                    return $vehicle->brand;
                })
                ->toArray(),

            'models' => Vehicle::published()
                ->select('model')
                ->distinct()
                ->get()
                ->map(function ($vehicle) {
                    return $vehicle->model;
                })->toArray(),
        ];
    }
}
