<?php

namespace App\Enums;

enum ContentStatus: string
{
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';

    // Voliteľné: Metóda na získanie všetkých hodnôt
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function valuesString(): string
    {
        return implode(',', self::values());
    }

    public static function cssClass($status)
    {
        if($status == self::Published->value)
            return "success";

        if($status == self::Archived->value)
            return "danger";

        return "warning";
    }
}
