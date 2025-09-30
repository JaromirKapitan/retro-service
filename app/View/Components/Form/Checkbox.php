<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;

class Checkbox extends Input
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $name, public $label = '', public $value = null, public $inputAttributes = [], $checked = false)
    {
        if(!isset($this->inputAttributes['class'])) $this->inputAttributes['class'] = '';
        if($checked) $this->inputAttributes['checked'] = 'checked';
        parent::__construct($name, $this->label, $this->value, $this->inputAttributes);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
