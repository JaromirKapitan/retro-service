<div>

    <section class="hero">
        <div class="row">
            <div class="col-sm-3">
                <div>
                    <label for="type" class="form-label">Typ</label>

                    <select id="type" name="type" class="form-control" wire:model.live="filter.type">
                        <option value="0">-- vehicle type --</option>

                        @foreach($filterOptions['types'] as $type)
                            <option value="{{ $type->value }}">{{ $type->getTitle() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div>
                    <label for="brand" class="form-label">Brand</label>

                    <select id="brand" name="brand" class="form-control" wire:model.live="filter.brand">
                        <option value="0">-- vehicle brand --</option>

                        @foreach($filterOptions['brands'] as $brand)
                            <option value="{{ $brand }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div>
                    <label for="model" class="form-label">Model</label>

                    <select id="model" name="model" class="form-control" wire:model.live="filter.model">
                        <option value="0">-- vehicle model --</option>

                        @foreach($filterOptions['models'] as $vehicleModel)
                            <option value="{{ $vehicleModel }}">{{ $vehicleModel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <label for="year" class="form-label">YEAR</label>
                <input type="text" class="form-control" id="year" placeholder="1885" wire:model.live="filter.year">
            </div>
        </div>
    </section>

    <section id="vehiclesList" class="cards-grid">
        @foreach($this->getList() as $item)
            <article class="card-vehicle">
                @if($item->getMedia('images')->isNotEmpty())
                    <div class="thumb" style="background-image:url('{{ $item->getMedia('images')->first()->getUrl('thumb') ?? $item->getMedia('images')->first()->getUrl() }}')"></div>
                @else
                    <div class="thumb" style="background-image:url('/images/no_image_car.jpg');opacity:0.4;"></div>
                @endif
                <small class="text-muted float-end mt-3">{{ $item->subTitle }}</small>
                <h4>{{ $item->title }} </h4>
                <p>{{ $item->description }}</p>
                <div class="meta-row" style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
                    <a class="btn" href="{{ route('show', $item->seo->slug) }}">{{ __('Detail') }}</a>
                    <span style="color:var(--muted)">{{ $item->type }}</span>
                </div>
            </article>
        @endforeach
    </section>
</div>
