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

{{-- status --}}
        <div class="col-sm-3 mt-3">
            <div>
                <label for="status" class="form-label">{{ __('Status') }}</label>

                <select id="status" name="status" class="form-control" wire:model.live="filter.status">
                    <option value="0">-- {{ __('admin.status') }} --</option>

                    @foreach($filterOptions['statuses'] as $status)
                        <option value="{{ $status->value }}">{{ __($status->getTitle()) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('admin.title') }}</th>
            <th>{{ __('admin.status') }}</th>
            <th class="text-center">{{ __('admin.date') }}</th>
            <th class="fit-content"></th>
            <th class="fit-content"></th>
        </tr>
        </thead>

        <tbody>
        @foreach($this->getList() as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <x-content-status-alt :status="$item->statusAlt"/>
                </td>
                <td class="align-middle text-center">
                    @if($item->statusAlt == \App\Enums\ContentStatusAltEnum::Scheduled)
                        {{ $item->published_at->format('d.m.Y') }}
                    @elseif($item->statusAlt == \App\Enums\ContentStatusAltEnum::Expired)
                        {{ $item->published_until->format('d.m.Y') }}
                    @endif
                </td>
                <td class="text-end fit-content">
                    @if($item->isPublished)
                        <a href="{{ route('vehicle.show', $item->seo->slug) }}" class="text-secondary text-hover-success" title="{{ __('admin.online_web') }}" target="_blank"><i class="fa fa-globe"></i></a>
                    @endif
                </td>
                <td class="text-end fit-content">
                    @if($item->task)
                        <a href="{{ route('admin.tasks.show', $item->task) }}" class="text-secondary text-hover-success" title="{{ __('admin.task') }}"><i class="fa fa-list-check"></i></a>
                    @endif

                    <x-entity.table-buttons entity="vehicles" :item="$item" :multilang="\App\Enums\LangEnum::isMultilang()"/>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
