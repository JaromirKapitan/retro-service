<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $seoble_type
 * @property int $seoble_id
 * @property string $lang
 * @property string $slug
 * @property string|null $keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $seoble
 * @method static Builder<static>|SeoData lang(string $value)
 * @method static Builder<static>|SeoData newModelQuery()
 * @method static Builder<static>|SeoData newQuery()
 * @method static Builder<static>|SeoData query()
 * @method static Builder<static>|SeoData slug(string $slug)
 * @method static Builder<static>|SeoData whereCreatedAt($value)
 * @method static Builder<static>|SeoData whereDeletedAt($value)
 * @method static Builder<static>|SeoData whereId($value)
 * @method static Builder<static>|SeoData whereKeywords($value)
 * @method static Builder<static>|SeoData whereLang($value)
 * @method static Builder<static>|SeoData whereSeobleId($value)
 * @method static Builder<static>|SeoData whereSeobleType($value)
 * @method static Builder<static>|SeoData whereSlug($value)
 * @method static Builder<static>|SeoData whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SeoData extends Model
{
    protected $table = 'seo_data';
    protected $fillable = ['seoble_id', 'seoble_type', 'lang', 'slug', 'keywords'];

    public function scopeSlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    public function scopeLang(Builder $query, string $value): Builder
    {
        return $query->where('lang', $value);
    }

    public function seoble(): MorphTo
    {
        return $this->morphTo();
    }
}
