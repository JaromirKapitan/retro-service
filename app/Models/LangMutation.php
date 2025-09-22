<?php

namespace App\Models;

use App\Enums\Lang;

trait LangMutation
{
    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getMutationsAttribute()
    {
        $mutations = [config('app.locale') => $this];
        foreach(Lang::values() as $lang){
            if($lang == config('app.locale')) continue;
            $mutations[$lang] = self::where('lang', $lang)->where('parent_id', $this->id)->first();
        }

        return $mutations;
    }
}
