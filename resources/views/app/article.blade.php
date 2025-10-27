@extends('app.layout')

@section('content')
    {{--    <a class="back-link" href="{{ "" }}">← Späť</a>--}}

    <section class="detail-hero">
        @include('app.article.gallery')

        <div class="meta">
            <h2 id="title">{{ $model->title }}</h2>

            {!! $model->description !!}
        </div>
    </section>

    <section class="section-block section--card">
        <h3>{{ __('Description') }}</h3>
        <div>{!! $model->content !!}</div>
    </section>
@endsection
