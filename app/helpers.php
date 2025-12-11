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
            \App\Enums\LangEnum::CS->value => $prefix . 'cz',
            default => $prefix . $lang,
        };

        return "<i class='$class'></i>";
    }
}

if (!function_exists('isContentEmpty')) {
    function isContentEmpty($content)
    {
        // clear from all html tags and trim spaces
        $trimmedContent = trim(strip_tags($content));

        // remove hard spaces
        $trimmedContent = str_replace('&nbsp;', '', $trimmedContent);

        return empty($trimmedContent);
    }
}
