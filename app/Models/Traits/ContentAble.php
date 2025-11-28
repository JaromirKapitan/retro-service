<?php

namespace App\Models\Traits;

use App\Enums\ContentStatus;
use App\Enums\ContentStatusAlt;
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

    // Returns ContentStatusAlt enum based on published_at, published_until and status
    public function getStatusAltAttribute()
    {
        // published - currently published
        if ($this->status == ContentStatus::Published->value) {
            // expired - published_until v minulosti
            if (!is_null($this->published_until) && $this->published_until <= now()) {
                return ContentStatusAlt::Expired;
            }

            // scheduled - published_at v buducnosti
            if (!is_null($this->published_at) && $this->published_at > now()) {
                return ContentStatusAlt::Scheduled;
            }

            return ContentStatusAlt::Published;
        }

        // archived - archived
        if ($this->status == ContentStatus::Archived->value) {
            return ContentStatusAlt::Archived;
        }

        // draft - never published
        return ContentStatusAlt::Draft;
    }

    public function getPublishedAtAttribute($value)
    {
        return !is_null($value) ? \Carbon\Carbon::parse($value) : null;
    }
    public function getPublishedUntilAttribute($value)
    {
        return !is_null($value) ? \Carbon\Carbon::parse($value) : null;
    }
}
