@extends('admin.task.layout')

@section('content')
    <div class="m-3">
        <h1>{{ $model->title }}</h1>
        <div class="mb-3">{{ $model->description }}</div>
    </div>
@endsection
