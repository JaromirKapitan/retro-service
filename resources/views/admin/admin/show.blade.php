@extends('admin.admin.layout')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="true">Detail</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
            <h1>{{ $model->name }}</h1>
            <div class="text-muted">{{ __('admin.slug') }}: {{ $model->email }}</div>
        </div>
    </div>
@endsection
