<div class="gallery">
    {{--            <img id="mainImage" src="{{ $model->getMedia('images')->first()->getUrl() }}" alt="">--}}
    {{--            <div id="thumbs" class="thumbs">--}}
    {{--                @foreach($model->getMedia('images') as $key => $image)--}}
    {{--                    <img src="{{ $image->getUrl() }}" alt="">--}}
    {{--                @endforeach--}}
    {{--            </div>--}}

    <div id="articleCarousel" class="carousel slide">
        <div class="carousel-indicators">
            @foreach($model->getMedia('images') as $key => $image)
                <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="{{ $key }}" @if($key == 0) class="active"
                        aria-current="true" @endif></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @if($model->getMedia('images')->isNotEmpty())
                @foreach($model->getMedia('images') as $key => $image)
                    <div @class(['carousel-item', 'active' => $key == 0])>
                        <img src="{{ $image->getUrl() }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            @else
                <div @class(['carousel-item', 'active' => true])>
                    <img src="/images/no_image_car.jpg" class="d-block w-100" alt="...">
                </div>
            @endif
        </div>

        @if($model->getMedia('images')->isNotEmpty())
            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
</div>
