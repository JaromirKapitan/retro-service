@extends('admin.vehicle.layout')

@section('content')
    <div class="m-3">
        <h1>{{ __('admin.images') }}</h1>
        <livewire:Admin.MediaImages :model="$model" />

        <h1 class="mt-3">{{ __('admin.files') }}</h1>
        <livewire:Admin.MediaFiles :model="$model" />
    </div>

@endsection
