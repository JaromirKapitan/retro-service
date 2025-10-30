@extends('app.layout')

@section('content')
    <h1>{{ $model->title }}</h1>
    @if($model->content)
        <p>{!! $model->content !!}</p>
    @endif

    <section id="vehiclesList" class="cards-grid">
        @if($model->list)
            @foreach($model->list as $item)
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
                        <span style="color:var(--muted)">{{ __(!empty($item->type) ? $item->type : 'article') }}</span>
                    </div>
                </article>
            @endforeach
        @endif
    </section>

@endsection
