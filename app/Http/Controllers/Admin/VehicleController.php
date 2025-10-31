<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use App\Enums\VehicleType;
use App\Http\Controllers\Controller;
use App\Models\SeoData;
use App\Models\Vehicle;
use App\Models\WebPage;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    use MediaController, SeoController;

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

    protected function getFormData(Vehicle $vehicle){
        return (object)[
            'web_page_options' => WebPage::whereNull('parent_id')->get(),
            'type_options' => collect(VehicleType::cases())->map(function ($item) use ($vehicle){
                return (object)[
                    'value' => $item->value,
                    'title' => $item->getTitle(),
                    'selected' => $vehicle->type == $item->value ? 'selected' : '',
                ];
            })
        ];
    }

    public function store(Request $request)
    {
        $vehicle = Vehicle::create($this->validateRequest($request));
        $vehicle->seo()->create($this->getSeoData());
        $vehicle->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.vehicles.index')
            ->with('success', trans('admin.saved'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate(array_merge([
            'parent_id' => 'nullable|integer',
            'lang' => 'nullable|in:' . Lang::valuesString(),
            'type' => 'required|in:' . VehicleType::valuesString(),
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year_from' => 'required|numeric',
            'year_to' => 'nullable|numeric',
            'description' => 'nullable|string|max:300',
            'content' => 'nullable|string',
            'specs' => 'nullable|string',
            'modifications' => 'nullable|string',
            'links' => 'nullable|string',
            'status' => 'required|in:' . ContentStatus::valuesString(),
        ], $this->getSeoRules()));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('admin.vehicle.form', [
            'model' => $vehicle,
            'form' => $this->getFormData($vehicle),
        ]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($this->validateRequest($request));
        $vehicle->seo()->update($this->getSeoData());
        $vehicle->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.vehicles.index')
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
}
