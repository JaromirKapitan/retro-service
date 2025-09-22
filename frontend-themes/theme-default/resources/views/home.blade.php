@extends('theme-default::app')

@section('content')
    <h1>Vitaj v Theme Default</h1>
    <ul>
        @forelse($pages as $page)
            <li>{{ $page->title }}</li>
        @empty
            <li>Zatiaľ žiadne stránky.</li>
        @endforelse
    </ul>
@endsection
