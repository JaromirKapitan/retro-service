<?php

namespace App\Models\Traits;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use Illuminate\Database\Eloquent\Builder;

trait ContentAble
{
    public function scopePublished(Builder $query)
    {
        // (published_at IS nULL OR published_at <= NOW()) AND (published_until IS NULL OR published_until > NOW()) AND status = 'published'
        $query->where(function($q){
            $q->whereNull('published_at')
              ->orWhere('published_at', '<=', now());
        })->where(function($q){
            $q->whereNull('published_until')
              ->orWhere('published_until', '>', now());
        })->where('status', ContentStatus::Published->value);
    }

    public function getIsPublishedAttribute()
    {
        $status = optional($this->parent)->status ?? $this->status;
        return $status == ContentStatus::Published->value;
    }

    public function getSubTitleAttribute()
    {
        return null;
    }
}
