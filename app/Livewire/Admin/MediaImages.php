<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;

class MediaImages extends MediaFiles
{
    public $type = 'images';

    #[Validate(['files.*' => 'image|max:10240'])]
    public $files = [];

    public function render()
    {
        return view('livewire.admin.media-images');
    }

}
