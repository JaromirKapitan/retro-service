<div class="container-fluid">
    <section class="row mb-3">
        <div class="col-sm-3">
            <div>
                <label for="type" class="form-label">{{ __('Type') }}</label>

                <select id="type" name="type" class="form-control" wire:model.live="filter.type">
                    <option value="0">-- {{ __('vehicle type') }} --</option>

                    @foreach($filterOptions['types'] as $type)
                        <option value="{{ $type->value }}">{{ __($type->getTitle()) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div>
                <label for="brand" class="form-label">{{ __('Brand') }}</label>

                <select id="brand" name="brand" class="form-control" wire:model.live="filter.brand">
                    <option value="0">-- {{ __('vehicle brand') }} --</option>

                    @foreach($filterOptions['brands'] as $brand)
                        <option value="{{ $brand }}">{{ $brand }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div>
                <label for="model" class="form-label">{{ __('Model') }}</label>

                <select id="model" name="model" class="form-control" wire:model.live="filter.model">
                    <option value="0">-- {{ __('vehicle model') }} --</option>

                    @foreach($filterOptions['models'] as $vehicleModel)
                        <option value="{{ $vehicleModel }}">{{ $vehicleModel }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <label for="year" class="form-label">{{ __('Year') }}</label>
            <input type="text" class="form-control" id="year" placeholder="1885" wire:model.live="filter.year">
        </div>
    </section>

    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.status') }}</th>
            <th>{{ __('admin.published_at') }}</th>
            <th>{{ __('admin.published_until') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($this->getList() as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <span class=" w-75 badge rounded-pill content-status-{{ $item->status }}">
                        {{ __('admin.'.$item->status) }}
                    </span>
                </td>
                <td>
                    {{ $item->published_at }}
                </td>
                <td>
                    {{ $item->published_until }}
                </td>
                <td class="text-end">
                    <x-entity.table-buttons entity="vehicles" :item="$item" :multilang="\App\Enums\Lang::isMultilang()" />
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
