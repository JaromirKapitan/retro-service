<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $name, public $label, public $inputAttributes = [], public $addClass = '')
    {
        if(empty($this->inputAttributes['id'])) $this->inputAttributes['id'] = $name;
        if(empty($this->inputAttributes['name'])) $this->inputAttributes['name'] = $name;

        if(!isset($this->inputAttributes['class'])) $this->inputAttributes['class'] = 'form-control';
        if(!empty($this->addClass)) $this->inputAttributes['class'] .= ' ' . $this->addClass;
        if(!empty(session('errors')) && session('errors')->has($name)) $this->inputAttributes['class'] .= ' is-invalid';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
