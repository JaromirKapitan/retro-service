<?php

namespace App\Models;

trait Seoble
{
    public function seo()
    {
        return $this->morphOne(SeoData::class, 'seoble');
    }
}
