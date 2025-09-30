<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SystemController extends Controller
{
    public function pull()
    {
        Storage::put('pull', 'Do pull');

        session()->flash('success', "Pull request nastaveny.");
        return redirect()->back();
    }
}
