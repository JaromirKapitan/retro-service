<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Password;

class PasswordRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
//        $validator = validator(
//            [$attribute => $value],
//            [$attribute => [Password::min(8)
//                ->mixedCase()
//                ->numbers()
////                ->symbols()
//                ->uncompromised()
//            ]]
//        );
//
//        if(!$validator->passes()){
//            $fail(implode("\n", $validator->getMessageBag()->get($attribute)));
//        }
    }
}
