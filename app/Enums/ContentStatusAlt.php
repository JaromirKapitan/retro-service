<?php

namespace App\Enums;

use function Symfony\Component\Translation\t;

enum ContentStatusAlt: string
{
    case Draft = 'draft';
    case Scheduled = 'scheduled';
    case Published = 'published';
    case Expired = 'expired';
    case Archived = 'archived';

    public function getTitle()
    {
        return match($this) {
            self::Draft => trans('admin.draft'),
            self::Scheduled => trans('admin.scheduled'),
            self::Published => trans('admin.published'),
            self::Expired => trans('admin.expired'),
            self::Archived => trans('admin.archived'),
        };
    }

    public function getIcon()
    {
        return match($this) {
            self::Draft => 'fas fa-pencil-alt',
            self::Scheduled => 'fas fa-clock',
            self::Published => 'fas fa-check-circle',
            self::Expired => 'fas fa-hourglass-end',
            self::Archived => 'fas fa-archive',
        };
    }

    public function getCssClass()
    {
        return match($this) {
            self::Draft => 'warning',
            self::Scheduled => 'info',
            self::Published => 'success',
            self::Expired => 'secondary',
            self::Archived => 'danger',
        };
    }
}
