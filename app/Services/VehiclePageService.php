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
                    'url' => route('vehicle.show', ['seo' => $vehicle->seo->slug]),
                ];
            })->toArray();

        return $vehicles;
    }

    // get vehicle by seo slug
    public function getVehicleBySeo(string $seo): ?array
    {
        $vehicle = Vehicle::whereHas('seo', function ($query) use ($seo) {
            $query->where('slug', $seo);
        })->with('media')->first();

        if (!$vehicle) {
            return null;
        }

        return [
            'id' => $vehicle->id,
            'title' => $vehicle->title,
            'sub_title' => $vehicle->sub_title,
            'description' => $vehicle->description,
            'content' => $vehicle->content,
            'type' => $vehicle->typeEnum,
            'brand' => $vehicle->brand,
            'model' => $vehicle->model,
            'year_from' => $vehicle->year_from,
            'year_to' => $vehicle->year_to,
            'specs_html' => $vehicle->specs_html,
            'modifications_html' => $vehicle->modifications_html,
            'links_html' => $vehicle->links_html,
            'images' => $vehicle->getMedia('default')->map(function ($media) {
                return [
                    'url' => $media->getUrl(),
                    'thumb_url' => $media->getUrl('thumb'),
                ];
            })->toArray(),
        ];
    }
}
