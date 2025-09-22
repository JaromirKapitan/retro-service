<?php

namespace ThemeFreelancer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WebMenu;

class HomeController extends Controller
{
    public function index()
    {
        $list = WebMenu::whereNull('parent_id')->get();

        return view('theme-freelancer::home', compact('list'));
    }
}
