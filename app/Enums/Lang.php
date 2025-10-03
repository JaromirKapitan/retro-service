<?php

namespace App\Enums;

enum Lang: string
{
    case SK = 'sk';
    case CS = 'cs';
    case EN = 'en';

    public function getTitle(): string
    {
        return match ($this) {
            self::SK => 'Slovenčina',
            self::CS => 'Čeština',
            self::EN => 'English',
        };
    }

    public static function getPrimary()
    {
        return self::values()[0];
    }

    public static function availible()
    {
        $langs = env('APP_LANGS') ? explode(',', env('APP_LANGS')) : [config('app.locale')];
        return array_filter(self::cases(), function ($case) use ($langs){
            return in_array($case->value, $langs);
        });
    }

    // Voliteľné: Metóda na získanie všetkých hodnôt
    public static function values(): array
    {
        $appLangs = env('APP_LANGS');

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
