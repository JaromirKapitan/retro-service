<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;

trait SeoRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function getSeoRules(): array
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
}
