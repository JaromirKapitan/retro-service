<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class Password extends Input
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.password');
    }
}
