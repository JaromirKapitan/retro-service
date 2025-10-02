<?php

namespace App\Models\Traits;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use Illuminate\Database\Eloquent\Builder;

trait ContentAble
{
    public function scopePublished(Builder $query)
    {
        $query->where('status', ContentStatus::Published->value);
    }

    public function getIsPublishedAttribute()
    {
        $status = optional($this->parent)->status ?? $this->status;
        return $status == ContentStatus::Published->value;
    }
}
