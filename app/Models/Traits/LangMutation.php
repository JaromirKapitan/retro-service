<?php

namespace App\Models\Traits;

use App\Enums\Lang;
use Illuminate\Database\Eloquent\Builder;

trait LangMutation
{
    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getMutationsAttribute()
    {
        foreach(Lang::values() as $key => $lang){
            if($key == 0)
                $mutations[$lang] = $this;
            else
                $mutations[$lang] = self::where('lang', $lang)->where('parent_id', $this->id)->first();
        }

        return $mutations;
    }

    public function scopeLang(Builder $query, string $value)
    {
        $query->where('lang', $value);
    }
}
