<?php

namespace App\Enums;

use function Symfony\Component\Translation\t;

enum VehicleTypeEnum: string
{
    case MOTO = 'motorcycle';
    case CAR = 'car';
    case BUS = 'bus';

    public function getTitle(): string
    {
        return match ($this) {
            self::MOTO => trans('motorcycle'),
            self::CAR => trans('car'),
            self::BUS => trans('bus'),
        };
    }

    public static function valuesString(): string
    {
        return implode(',', array_column(self::cases(), 'value'));
    }
}
