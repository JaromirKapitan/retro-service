<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rule;

trait SeoController
{
    protected function getSeoRules()
    {
        // ziskaj seo model
        $params = request()->route()->parameters();
        $seo = !empty($params) && count($params) == 1 ? array_pop($params)->seo : null;

        return [
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('seo_data')->where(function ($query) use ($seo) {
                    $query
                        ->where('lang', request()->input('lang'))
                        ->where('slug', request()->input('slug'));

                    if(!empty($seo)) {
                        $query->where('id', '<>', $seo->id);
                    }
                    return $query;
                })
            ],
        ];
    }

    protected function getSeoData()
    {
        return [
            'lang' => request()->input('lang'),
            'slug' => request()->input('slug'),
        ];
    }
}
