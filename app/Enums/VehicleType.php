<?php

namespace App\Enums;

use function Symfony\Component\Translation\t;

enum VehicleType: string
{
    case MOTO = 'motorcycle';
    case CAR = 'car';
    case BUS = 'bus';

    public function getTitle(): string
    {
        return match ($this) {
            self::MOTO => t('motorcycle'),
            self::CAR => t('car'),
            self::BUS => t('bus'),
        };
    }

    public static function valuesString(): string
    {
        return implode(',', array_column(self::cases(), 'value'));
    }
}
