<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class WebMenuController extends Controller
{
    public function edit()
    {
        return view('admin.web-menu.edit');
    }

    public function update()
    {

    }
}
