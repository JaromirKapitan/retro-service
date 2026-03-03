@extends('admin.web-page.layout')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">{{ __('admin.images') }}</h5>
            </div>
            <div class="card-body">
                <livewire:admin.media-images :model="$model" />
            </div>
        </div>
    </div>
@endsection
