@extends('admin.web-page.layout')

@section('content')
    <div class="m-3">
        <h1>{{ __('admin.images') }}</h1>
        <livewire:Admin.MediaImages :model="$model" />
    </div>
@endsection
