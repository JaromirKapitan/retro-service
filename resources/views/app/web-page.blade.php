@extends('app.layout')

@section('content')
    <h1>{{ $model->title }}</h1>
    @if($model->content)
        <p>{!! $model->content !!}</p>
    @endif

    <div class="row">
        @if($model->articles)
            @foreach($model->articles as $article)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="heading-bg">
                        <a href="{{ route('show', $article->seo->slug) }}">
                            <h2>{{ $article->title }}</h2>
                            @if($article->getMedia('images')->isNotEmpty())
                                <img class="img-fluid mb-2" src="{{ $article->getMedia('images')->first()->getUrl() }}" style="width: 255px;height: 170px;">
                            @endif
                        </a>
                        <p>
                            {!! $article->description !!}
                        </p>

                        <div class="text-end">
                            <a href="{{ route('show', $article->seo->slug) }}" class="fc">Show me more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
