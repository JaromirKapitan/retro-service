<?php

namespace App\Enums;

enum Lang: string
{
    case SK = 'sk';
    case CS = 'cs';
    case EN = 'en';

    // Voliteľné: Metóda na získanie všetkých hodnôt
    public static function values(): array
    {
        $appLangs = env('APP_LANGS', null);

        // todo: osetrit ci aby zadane hodnoty boli z mnoziny dostupnych hodnot
        if(!empty($appLangs))
            return explode(',', $appLangs);

        // jednojazykova verzia
        return [config('app.locale')];

//        return array_column(self::cases(), 'value');
    }

    public static function valuesString(): string
    {
        return implode(',', self::values());
    }

    public static function isMultilang()
    {
        return count(self::values()) > 1;
    }
}
