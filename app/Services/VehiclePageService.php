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

    // return list of published vehicles with applied filters (type, brand, model) from Vehicle model and thumbnail image if exists if not use default image public/images/no_image_car.jpg
    public function getVehicles(): array
    {
        $vehicles = Vehicle::published()
            ->with('media')
            ->get()
            ->map(function ($vehicle) {
                return [
                    'id' => $vehicle->id,
                    'title' => $vehicle->title,
                    'sub_title' => $vehicle->sub_title,
                    'description' => $vehicle->description,
                    'type' => $vehicle->typeEnum,
                    'brand' => $vehicle->brand,
                    'model' => $vehicle->model,
                    'year_from' => $vehicle->year_from,
                    'year_to' => $vehicle->year_to,
                    'thumbnail' => $vehicle->getFirstMediaUrl('default', 'thumb') ?: asset('images/no_image_car.jpg'),
                ];
            })->toArray();

        return $vehicles;
    }
}
