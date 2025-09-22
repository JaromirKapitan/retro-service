<?php

namespace App\Http\Controllers\Admin;

trait MediaController
{
    protected function getMediaParams($id)
    {
        return throw new \Exception('Not implemented');
    }

    public function images($id){
        return view('admin.media.images', $this->getMediaParams($id));
    }

    public function files($id){
        return view('admin.media.files', $this->getMediaParams($id));
    }
}
