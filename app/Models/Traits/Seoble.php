<?php

namespace App\Models\Traits;

use App\Models\SeoData;

trait Seoble
{
    public function seo()
    {
        return $this->morphOne(SeoData::class, 'seoble');
    }
}
