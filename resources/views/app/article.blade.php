@extends('app.layout')

@section('content')
    <h1>{!! $model->title !!}</h1>


    <div class="ck ck-content" lang="en" dir="ltr" role="textbox" >
        {!! $model->content !!}
    </div>

    @if($model->getMedia('images'))
        <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($model->getMedia('images') as $key => $image)
                    <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{ $key }}" @if($key == 0) class="active"
                            aria-current="true" @endif></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($model->getMedia('images') as $key => $image)
                    <div @class(['carousel-item', 'active' => $key == 0])>
                        <img src="{{ $image->getUrl() }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

@endsection
