@extends('app.layout')

@section('content')
    {{--    <a class="back-link" href="{{ "" }}">← Späť</a>--}}

    <section class="detail-hero">
        @include('app.article.gallery')

        <div class="meta">
            <h2 id="title">{{ $model->title }}</h2>

            {!! $model->specs !!}
            {{--            <ul class="specs">--}}
            {{--                <li><strong>Výkon:</strong> <span id="power">19 kW</span></li>--}}
            {{--                <li><strong>Objem motora:</strong> <span id="engine">594 cc</span></li>--}}
            {{--                <li><strong>Max. rýchlosť:</strong> <span id="topSpeed">100 km/h</span></li>--}}
            {{--                <li><strong>Hmotnosť:</strong> <span id="weight">615 kg</span></li>--}}
            {{--                <li><strong>Nostnosť:</strong> <span id="payload">"Nobody knows" :-D</span></li>--}}
            {{--            </ul>--}}
        </div>
    </section>

    <section class="section-block section--card">
        <h3>{{ __('Description') }}</h3>
        <div>{!! $model->content !!}</div>
    </section>

    @if($model->changes)
        <section class="section-block">
            <h3>{{ __('Modifications') }}</h3>
            {!! $model->changes !!}
            {{--            <ul>--}}
            {{--                <li><strong>1971</strong> — Minor chassis and suspension adjustments to improve ride comfort.</li>--}}
            {{--                <li><strong>1984</strong> — Upgraded front axle — improved geometry and durability (1984 update).</li>--}}
            {{--                <li><strong>1986</strong> — Small interior trim improvements and optional heater upgrades introduced.</li>--}}
            {{--            </ul>--}}
        </section>
    @endif

    <!-- Documents & Links block (visual copy of Description block) -->
    @if($model->links)
        <section class="section-block section--paper">
            <h3>{{ __('Documents & links') }}</h3>
            {!! $model->links !!}
            {{--        <ul>--}}
            {{--            <li>--}}
            {{--                <a href="https://en.wikipedia.org/wiki/Trabant" target="_blank">--}}
            {{--                    <svg class="doc-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">--}}
            {{--                        <path d="M14 3h7v7" fill="none" stroke="currentColor" stroke-width="1.5"></path>--}}
            {{--                        <path d="M10 14L21 3" fill="none" stroke="currentColor" stroke-width="1.5"></path>--}}
            {{--                        <path d="M21 21H3V3" fill="none" stroke="currentColor" stroke-width="1.2" opacity="0.04"></path>--}}
            {{--                    </svg>--}}
            {{--                    <span class="doc-label">Trabant — Wikipedia</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--        </ul>--}}

        </section>
    @endif
@endsection
