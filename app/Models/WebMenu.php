<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WebMenu extends Model
{
    protected $table = 'web_menu';
    protected $fillable = ['parent_id', 'target_id', 'target_type', 'link', 'title_langs', 'order'];

    protected static function booted(): void
    {
        parent::booted();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderByRaw('ISNULL(`order`)')->orderBy('order');
        });
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function target()
    {
        return $this->morphTo();
    }
}
