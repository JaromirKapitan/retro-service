@extends('admin.article.layout')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="true">Detail</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images-tab-pane" type="button" role="tab" aria-controls="images-tab-pane" aria-selected="false">Images</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="files-tab" data-bs-toggle="tab" data-bs-target="#files-tab-pane" type="button" role="tab" aria-controls="files-tab-pane" aria-selected="false">Files</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-3" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
            detail
        </div>
        <div class="tab-pane fade p-3" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab" tabindex="0">
            <livewire:Admin.MediaImages :model="$model" />
        </div>
        <div class="tab-pane fade p-3" id="files-tab-pane" role="tabpanel" aria-labelledby="files-tab" tabindex="0">
            <livewire:Admin.MediaFiles :model="$model" />
        </div>
    </div>
@endsection
