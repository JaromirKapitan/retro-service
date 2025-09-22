<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaFiles extends Component
{
    use WithFileUploads;

    public $type = 'files';
    public $model;
    public $files = [];

    public function render()
    {
        return view('livewire.admin.media-files');
    }

    public function updatedFiles(){
        if(!empty($this->getRules()))
            $this->validate();

        if(empty($this->files)) return false;

        /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile $file */
        foreach($this->files as $file){
            $stored = $file->store($this->type);
            $path = storage_path('app/private/' . $stored);
            $this->model->addMedia($path)
                ->usingName($file->getClientOriginalName())
                ->toMediaCollection($this->type);
        }

        $this->reset('files');
    }

    public function delete(Media $file)
    {
        $file->delete();
    }
}
