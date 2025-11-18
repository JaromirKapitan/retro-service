<?php

namespace App\Models;

use App\Enums\ContentStatus;
use App\Models\Traits\ContentAble;
use App\Models\Traits\LangMutation;
use App\Models\Traits\Seoble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vehicle extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, Seoble, InteractsWithMedia, LangMutation, ContentAble;

    protected $fillable = ['type', 'brand', 'model', 'year_from', 'year_to', 'description', 'content', 'status', 'lang', 'parent_id', 'specs', 'modifications', 'links', 'published_at', 'published_until'];

    protected $dates = ['published_at', 'published_until'];

    protected $attributes = [
        'status' => ContentStatus::Draft->value
    ];

    public function webPages()
    {
        return $this->belongsToMany(WebPage::class);
    }

    public function getTitleAttribute()
    {
        return $this->brand . ' ' . $this->model;
    }

    public function getDefaultWebPage()
    {
        return $this->webPages()->second();
    }

    public function getSubTitleAttribute()
    {
        return '(' . $this->year_from . (!empty($this->year_to) ? ' - ' . $this->year_to : '') . ')';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->height(160);

        $this->addMediaConversion('small')
            ->height(360);
    }
}
