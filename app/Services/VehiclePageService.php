<?php

namespace App\Services;

use App\Enums\VehicleTypeEnum;
use App\Enums\WebPageEnum;
use App\Http\Resources\WebPageResource;
use App\Models\Vehicle;
use App\Models\WebPage;

class VehiclePageService
{
    public function getWebPage()
    {
        return WebPageResource::make(WebPage::findOrFail(WebPageEnum::VEHICLES));
    }

    public function getFilter(): array
    {
        return [
            // types of published vehicles from model Vehicle
            'types' => Vehicle::published()
                ->select('type')
                ->withoutGlobalScopes(['order'])
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
                ->withoutGlobalScopes(['order'])
                ->distinct()
                ->get()
                ->map(function ($vehicle) {
                    return $vehicle->brand;
                })
                ->toArray(),

            'models' => Vehicle::published()
                ->select('model')
                ->withoutGlobalScopes(['order'])
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

                if($vehicle->getMedia('images')->isNotEmpty())
                    $thumbnail = $vehicle->getMedia('images')->first()->getUrl('thumb') ?? $vehicle->getMedia('images')->first()->getUrl();
                else
                    $thumbnail = asset('images/no_image_car.jpg');

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
                    'thumbnail' => $thumbnail,
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

        $images = $vehicle->getMedia('images')->map(function ($media) {
            return [
                'url' => $media->getUrl(),
                'thumb_url' => $media->getUrl('thumb'),
            ];
        })->toArray();

        return [
            'id' => $vehicle->id,
            'title' => $vehicle->title,
            'sub_title' => $vehicle->sub_title,
            'description' => $vehicle->description,
            'docs_html' => $vehicle->docs_html,
            'content_html' => $vehicle->content_html,
            'type' => $vehicle->typeEnum,
            'brand' => $vehicle->brand,
            'model' => $vehicle->model,
            'year_from' => $vehicle->year_from,
            'year_to' => $vehicle->year_to,
            'specs_html' => $vehicle->specs_html,
            'modifications_html' => $vehicle->modifications_html,
            'links_html' => $vehicle->links_html,
            'hero_img' => $images[0]['url'] ?? asset('images/no_image_car_detail.png'),
            'images' => $images,
        ];
    }
}
