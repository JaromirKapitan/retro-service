<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Process;

class SystemController extends Controller
{
    public function pull()
    {
        if(isLocalhost()) {
//            session()->flash('warning', "Localhost nie je mozne aktualizovat.");
            return redirect()->back();
        }

        Process::path(base_path())->run('./deploy.sh', function (string $type, string $output){
            if ($type == 'stdout') {
                echo $output."<br/>";
            }
        });

        sleep(5);

        session()->flash('success', "System aktualizovany.");
        return redirect()->back();
    }
}
