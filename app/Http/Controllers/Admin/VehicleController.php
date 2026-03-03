<?php

namespace App\Http\Controllers\Admin;

use App\Enums\VehicleTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehicleRequest;
use App\Models\SeoData;
use App\Models\Vehicle;
use App\Models\WebPage;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    use MediaController, SeoControllerTrait;

    public function index()
    {
        return view('admin.vehicle.index', [
            'list' => Vehicle::whereNull('parent_id')->get(),
        ]);
    }

    public function show(Vehicle $vehicle)
    {
        return view('admin.vehicle.show', [
            'model' => $vehicle,
        ]);
    }

    public function create(Request $request)
    {
        $vehicle = new Vehicle(session()->get('_old_input') ?? [
            'lang' => $request->get('lang') ?? config('app.locale'),
            'parent_id' => $request->get('parent_id') ?? null,
        ]);

        if (!empty(session()->get('_old_input'))) {
            $vehicle->seo = new SeoData(session()->get('_old_input'));
        }

        return view('admin.vehicle.form', [
            'model' => $vehicle,
            'form' => $this->getFormData($vehicle),
        ]);
    }

    protected function getFormData(Vehicle $vehicle)
    {
        return (object)[
            'web_page_options' => WebPage::whereNull('parent_id')->get(),
            'type_options' => collect(VehicleTypeEnum::cases())->map(function ($item) use ($vehicle) {
                return (object)[
                    'value' => $item->value,
                    'title' => $item->getTitle(),
                    'selected' => $vehicle->type == $item->value ? 'selected' : '',
                ];
            })
        ];
    }

    public function store(VehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());
        $vehicle->seo()->create($this->getSeoData());
        $vehicle->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.vehicles.links', $vehicle)
            ->with('success', trans('admin.saved'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicle.form', [
            'model' => $vehicle,
            'form' => $this->getFormData($vehicle),
        ]);
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        $vehicle->seo()->update($this->getSeoData());
        $vehicle->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.vehicles.edit', $vehicle)
            ->with('success', trans('admin.saved'));
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', trans('admin.record_deleted'));
    }

    protected function getMediaParams($id)
    {
        return [
            'model' => Vehicle::findOrFail($id),
            'layout' => 'admin.vehicle.layout',
        ];
    }

    public function links($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicle.links', [
            'model' => $vehicle,
            'form' => $this->getFormData($vehicle),
        ]);
    }

    public function linksStore(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->links = $request->input('links');
        $vehicle->save();

        return redirect()
            ->route('admin.vehicles.links', $vehicle)
            ->with('success', trans('admin.saved'));
    }

    public function mods($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicle.mods', [
            'model' => $vehicle,
            'form' => $this->getFormData($vehicle),
        ]);
    }

    public function modsStore(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->modifications = $request->input('modifications');
        $vehicle->save();

        return redirect()
            ->route('admin.vehicles.mods', $vehicle)
            ->with('success', trans('admin.saved'));
    }
}
