@extends('app.layout')

@section('content')
    <h1>{{ $model->title }}</h1>
    @if(!isContentEmpty($model->content))
        {!! $model->content !!}
    @endif

    <livewire:VehicleList/>
@endsection
