@extends('app.layout')

@section('content')
    <h1>{{ $model->title }}</h1>
    @if($model->content)
        <p>{!! $model->content !!}</p>
    @endif

    <section id="vehiclesList" class="cards-grid">
        @if($model->articles)
            @foreach($model->articles as $article)
                <article class="card-vehicle">
                    @if($article->getMedia('images')->isNotEmpty())
                        <div class="thumb" style="background-image:url('{{ $article->getMedia('images')->first()->getUrl() }}')"></div>
                    @endif
                    <h4>{{ $article->title }} {{--  <small>(1963–1990)</small> --}}</h4>
                    <p>{{ $article->description }}</p>
                    <div class="meta-row" style="display:flex;justify-content:space-between;align-items:center;margin-top:10px">
                        <a class="btn" href="{{ route('show', $article->seo->slug) }}">Detail</a>
{{--                        <span style="color:var(--muted)">car</span>--}}
                    </div>
                </article>
            @endforeach
        @endif
    </section>

@endsection
