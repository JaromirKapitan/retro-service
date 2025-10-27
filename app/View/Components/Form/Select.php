<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $name, public $label = '', public $value = null, public $inputAttributes = [], public $addClass = '', public $options = [], public $multiple = false, public $emptyLabel = '')
    {
        if (empty($this->inputAttributes['id'])) $this->inputAttributes['id'] = $name;
        if (empty($this->inputAttributes['name'])) $this->inputAttributes['name'] = $name;

        if ($this->multiple) {
            $this->inputAttributes['multiple'] = 'multiple';
            $this->inputAttributes['name'] .= '[]';
        }

        if (!isset($this->inputAttributes['class']))
            $this->inputAttributes['class'] = 'form-control';

        if (!empty($addClass)) {
            $this->inputAttributes['class'] .= ' ' . $addClass . ' ';
        }

        if (!empty(session('errors')) && session('errors')->has($name)) $this->inputAttributes['class'] .= ' is-invalid';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
