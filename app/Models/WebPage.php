<?php

namespace App\Models;

use App\Enums\ContentStatusEnum;
use App\Enums\WebPageEnum;
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
    use HasFactory, Seoble, InteractsWithMedia, LangMutation, ContentAble;

    protected $fillable = ['title', 'description', 'content', 'lang', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    // idea: presunut do resources !!!
    public function articles()
    {
        return $this->belongsToMany(Article::class)->published();
    }

    // idea: presunut do resources !!!
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class)->published();
    }
}
