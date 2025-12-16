<?php

namespace App\View\Components;

use App\Enums\StatusEnumInterface;
use Illuminate\View\Component;

class StatusLabel extends Component
{
    public StatusEnumInterface $status;

    public function __construct(StatusEnumInterface $status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('components.status-label');
    }
}
