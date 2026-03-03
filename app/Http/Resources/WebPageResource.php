<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = $this->only([
            'id',
            'title',
            'slug',
            'content',
            'lang',
        ]);

        $media = $this->getMedia('images');
        $data['hero_img'] = $media->isNotEmpty()
            ? $media->first()->getUrl()
            : asset('images/no_image_car_detail.png');

        return $data;
    }
}
