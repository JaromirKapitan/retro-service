<?php

namespace App\Models\Traits;

use App\Enums\ContentStatusEnum;
use App\Enums\ContentStatusAltEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

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
        })->where('status', ContentStatusEnum::Published->value);
    }

    public function getIsPublishedAttribute()
    {
        $status = optional($this->parent)->status ?? $this->status;
        return $status == ContentStatusEnum::Published->value;
    }

    public function getSubTitleAttribute()
    {
        return null;
    }

    // Returns ContentStatusAlt enum based on published_at, published_until and status
    public function getStatusAltAttribute()
    {
        // published - currently published
        if ($this->status == ContentStatusEnum::Published->value) {
            // expired - published_until v minulosti
            if (!is_null($this->published_until) && $this->published_until <= now()) {
                return ContentStatusAltEnum::Expired;
            }

            // scheduled - published_at v buducnosti
            if (!is_null($this->published_at) && $this->published_at > now()) {
                return ContentStatusAltEnum::Scheduled;
            }

            return ContentStatusAltEnum::Published;
        }

        // archived - archived
        if ($this->status == ContentStatusEnum::Archived->value) {
            return ContentStatusAltEnum::Archived;
        }

        // draft - never published
        return ContentStatusAltEnum::Draft;
    }

    public function getPublishedAtAttribute($value)
    {
        return !is_null($value) ? \Carbon\Carbon::parse($value) : null;
    }
    public function getPublishedUntilAttribute($value)
    {
        return !is_null($value) ? \Carbon\Carbon::parse($value) : null;
    }

    public function getContentHtmlAttribute()
    {
        return Str::of($this->content)->markdown();
    }
}
