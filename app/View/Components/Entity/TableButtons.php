<?php

namespace App\View\Components\Entity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableButtons extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $entity, public $item, public $multilang = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.entity.table-buttons');
    }
}
