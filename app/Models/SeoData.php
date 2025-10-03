<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    protected $table = 'seo_data';
    protected $fillable = ['seoble_id', 'seoble_type', 'lang', 'slug', 'keywords'];

    public function scopeSlug(Builder $query, string $slug)
    {
        $query->where('slug', $slug);
    }

    public function scopeLang(Builder $query, string $value)
    {
        $query->where('lang', $value);
    }

    public function seoble()
    {
        return $this->morphTo();
    }
}
