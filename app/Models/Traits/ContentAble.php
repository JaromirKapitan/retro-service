<?php

namespace App\Models\Traits;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Builder;

trait ContentAble
{
    public function scopePublished(Builder $query)
    {
        $query->where('status', ContentStatus::Published->value);
    }

    public function getIsPublishedAttribute()
    {
        return $this->status == ContentStatus::Published->value;
    }
}
