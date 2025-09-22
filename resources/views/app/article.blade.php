@extends('app.layout')

@section('content')
    @if($model->getMedia('images'))
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                @foreach($model->getMedia('images') as $key => $image)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" @if($key == 0) class="active"
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
@endsection
