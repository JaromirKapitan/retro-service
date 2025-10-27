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

    protected $fillable = ['title', 'description', 'content', 'status', 'lang', 'parent_id', 'home', 'for_vehicles'];

    protected $attributes = [
        'status' => ContentStatus::Draft->value
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->published();
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class)->published();
    }

    public function setHomeAttribute($value)
    {
        // ak nastala zmena domovskej stranky zrus oznacenie pri ostatnych strankach
        if ($value == 1) {
            self::where('home', 1)->where('id', '!=', $this->id)->update(['home' => null]);
            $this->attributes['home'] = 1;
        }else{
            $this->attributes['home'] = $value;
        }
    }

    public function scopeHome(Builder $query)
    {
        $query->where('home', 1);
    }

    public function setForVehiclesAttribute($value)
    {
        // ak nastala zmena domovskej stranky zrus oznacenie pri ostatnych strankach
        if ($value == 1) {
            self::where('for_vehicles', 1)->where('id', '!=', $this->id)->update(['for_vehicles' => null]);
            $this->attributes['for_vehicles'] = 1;
        }else{
            $this->attributes['for_vehicles'] = $value;
        }
    }

    public function scopeForVehicles(Builder $query)
    {
        $query->where('for_vehicles', 1);
    }
}
