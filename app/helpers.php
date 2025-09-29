<?php

use Illuminate\Support\Str;

if (!function_exists('isLocalhost')) {
    function isLocalhost()
    {
        return Str::endsWith(request()->server('SERVER_NAME'), '.test');
    }
}
