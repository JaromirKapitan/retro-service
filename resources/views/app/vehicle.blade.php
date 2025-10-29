@extends('app.layout')

@section('content')
    {{--    <a class="back-link" href="{{ "" }}">← Späť</a>--}}

    <section class="detail-hero mb-3">
        @include('app.article.gallery')

        <div class="meta">
            <h2 id="title">{{ $model->title }}</h2>
            <small class="text-muted mb-3">{{ $model->subTitle }}</small>

            {!! $model->specs !!}
        </div>
    </section>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab"
                    aria-controls="home-tab-pane" aria-selected="true">{{ __('Description') }}</button>
        </li>
        @if(!isContentEmpty($model->modifications))
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab"
                        aria-controls="profile-tab-pane" aria-selected="false">{{ __('Modifications') }}</button>
            </li>
        @endif
        @if(!isContentEmpty($model->links))
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab"
                        aria-controls="contact-tab-pane" aria-selected="false">{{ __('Documents & links') }}</button>
            </li>
        @endif
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active section--card p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            {!! $model->content !!}
        </div>

        @if(!isContentEmpty($model->modifications))
            <div class="tab-pane section--card p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                {!! $model->modifications !!}
            </div>
        @endif

        @if(!isContentEmpty($model->links))
            <div class="tab-pane section--card p-3" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                {!! $model->links !!}
            </div>
        @endif
    </div>
@endsection
