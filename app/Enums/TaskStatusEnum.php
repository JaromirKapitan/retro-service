<?php

namespace App\Enums;

enum TaskStatusEnum: string implements StatusEnumInterface
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function getTitle(): string
    {
        return match($this) {
            self::PENDING => trans('admin.pending'),
            self::IN_PROGRESS => trans('admin.in_progress'),
            self::COMPLETED => trans('admin.completed'),
            self::CANCELLED => trans('admin.cancelled'),
        };
    }

    // fontawesome icons
    public function getIcon(): string
    {
        return match($this) {
            self::PENDING => 'fa fa-clock',
            self::IN_PROGRESS => 'fa fa-spinner',
            self::COMPLETED => 'fa fa-check-circle',
            self::CANCELLED => 'fa fa-times-circle',
        };
    }

    // css classes
    public function getCssClass(): string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::IN_PROGRESS => 'info',
            self::COMPLETED => 'success',
            self::CANCELLED => 'danger',
        };
    }

    // return self based on string
    public static function fromString(string $status): ?self
    {
        return match ($status) {
            'in_progress' => self::IN_PROGRESS,
            'completed' => self::COMPLETED,
            'cancelled' => self::CANCELLED,
            default => self::PENDING,
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
