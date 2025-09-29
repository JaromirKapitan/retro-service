<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function pull()
    {
        if(isLocalhost()) {
//            session()->flash('warning', "Localhost nie je mozne aktualizovat.");
            return redirect()->back();
        }

        // Spustenie deploy.sh skriptu
        exec('cd '. base_path().' && ./deploy.sh &');

//        session()->flash('success', "System aktualizovany.");
        return redirect()->back();
    }
}
