<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WebPage extends Model
{
    use SoftDeletes, HasFactory, Seoble, LangMutation;

    protected $fillable = ['title', 'description', 'content', 'status', 'lang', 'parent_id'];

//    protected static function booted()
//    {
//        static::addGlobalScope('parents', function (Builder $builder) {
//            $builder->whereNull('parent_id');
//        });
//    }

    public function scopeParents(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
