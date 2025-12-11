<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentStatusAlt extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public \App\Enums\ContentStatusAltEnum $status)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.content-status-alt');
    }
}
