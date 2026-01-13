<?php

namespace App\Livewire\Admin\Vehicles;

use App\Enums\ContentStatusEnum;
use App\Enums\VehicleTypeEnum;
use App\Models\Vehicle;
use Livewire\Component;

class Index extends Component
{
    public $filterOptions = [];
    public $filter = [
        'type' => null,
        'brand' => null,
        'model' => null,
        'year' => null,
        'status' => null,
    ];

    public function boot()
    {
        $this->filterOptions = [
            'types' => VehicleTypeEnum::cases(),
            'brands' => Vehicle::query()
                ->withoutGlobalScopes(['order'])
                ->distinct('brand')
                ->whereNotNull('brand')
                ->orderBy('brand')
                ->pluck('brand')
                ->toArray(),
            'models' => Vehicle::query()
                ->withoutGlobalScopes(['order'])
                ->distinct('model')
                ->whereNotNull('model')
                ->orderBy('model')
                ->pluck('model')
                ->toArray(),
            'statuses' => ContentStatusEnum::cases(),
        ];
    }

    public function getList()
    {
        $query = Vehicle::query();

        if (!empty($this->filter['type'])) {
            $query->where('type', $this->filter['type']);
        }
        if (!empty($this->filter['brand'])) {
            $query->where('brand', $this->filter['brand']);
        }

        if (!empty($this->filter['model'])) {
            $query->where('model', $this->filter['model']);
        }

        if (!empty($this->filter['year'])) {
            $year = (int)$this->filter['year'];
            $query->where(function ($q) use ($year) {
                $q->where('year_from', '<=', $year)
                    ->where(function ($q2) use ($year) {
                        $q2->whereNull('year_to')
                            ->orWhere('year_to', '>=', $year);
                    });
            });
        }

        if (!empty($this->filter['status'])) {
            $query->where('status', $this->filter['status']);
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.admin.vehicles.index');
    }
}
