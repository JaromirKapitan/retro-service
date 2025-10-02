<?php

use Illuminate\Support\Str;

if (!function_exists('isLocalhost')) {
    function isLocalhost()
    {
        return Str::endsWith(request()->server('SERVER_NAME'), '.test');
    }
}

if (!function_exists('getFlagByLang')) {
    function getFlagByLang($lang)
    {
        $prefix = 'fi fi-';
        $class = match ($lang) {
            \App\Enums\Lang::CS->value => $prefix . 'cz',
            default => $prefix . $lang,
        };

        return "<i class='$class'></i>";
    }
}
