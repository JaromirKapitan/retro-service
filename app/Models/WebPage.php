<?php

namespace App\Models;

use App\Enums\ContentStatus;
use App\Models\Traits\ContentAble;
use App\Models\Traits\LangMutation;
use App\Models\Traits\Seoble;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebPage extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, Seoble, InteractsWithMedia, LangMutation, ContentAble;

    protected $fillable = ['title', 'description', 'content', 'status', 'lang', 'parent_id', 'home'];

    protected $attributes = [
        'status' => ContentStatus::Draft->value
    ];

    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->published();
    }

    public function setHomeAttribute($value)
    {
        // ak nastala zmena domovskej stranky zrus oznacenie pri ostatnych strankach
        if ($value == 1) {
            self::where('home', 1)->update(['home' => null]);
        }

        $this->attributes['home'] = $value;
    }
}
