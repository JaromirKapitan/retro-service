<?php

namespace App\Services;

use App\Enums\VehicleTypeEnum;
use App\Http\Resources\WebPageResource;
use App\Models\Vehicle;
use App\Models\WebPage;

class HomePageService
{
    public function getStats(): array
    {
        return [
            'vehicles' => Vehicle::published()->count(),
            'moto' => Vehicle::ofType(VehicleTypeEnum::MOTO)->published()->count(),
            'cars' => Vehicle::ofType(VehicleTypeEnum::CAR)->published()->count(),
            'buses' => Vehicle::ofType(VehicleTypeEnum::BUS)->published()->count(),
        ];
    }

    public function getPage()
    {
        return WebPageResource::make(WebPage::home()->first());
    }
}
