@extends('app.layout')

@section('content')
    {{--    <a class="back-link" href="{{ "" }}">← Späť</a>--}}

    <section class="detail-hero">
        @include('app.article.gallery')

        <div class="meta">
            <h2 id="title">{{ $model->title }}</h2>

            {!! $model->specs !!}
        </div>
    </section>

    <section class="section-block section--card">
        <h3>{{ __('Description') }}</h3>
        <div>{!! $model->content !!}</div>
    </section>

    @if(!isContentEmpty($model->modifications))
        <section class="section-block">
            <h3>{{ __('Modifications') }}</h3>
            {!! $model->modifications !!}
        </section>
    @endif

    <!-- Documents & Links block (visual copy of Description block) -->
    @if(!isContentEmpty($model->links))
        <section class="section-block section--paper">
            <h3>{{ __('Documents & links') }}</h3>
            {!! $model->links !!}
        </section>
    @endif
@endsection
