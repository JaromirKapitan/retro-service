<?php

namespace App\Http\Requests\Admin;

use App\Enums\ContentStatusEnum;
use App\Enums\LangEnum;
use App\Enums\VehicleTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class WebPageRequest extends FormRequest
{
    use SeoRequest;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = array_merge([
            'parent_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:300',
            'content' => 'nullable|string',
        ], $this->getSeoRules());

        if(LangEnum::isMultilang()) {
            $rules['lang'] = 'nullable|in:' . LangEnum::valuesString();
        }

        return $rules;
    }
}
