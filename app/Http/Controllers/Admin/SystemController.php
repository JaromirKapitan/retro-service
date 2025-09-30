<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Process;

class SystemController extends Controller
{
    public function pull()
    {
//        if(isLocalhost()) {
////            session()->flash('warning', "Localhost nie je mozne aktualizovat.");
//            return redirect()->back();
//        }

        $result = Process::path(base_path())->run('bash deploy.sh', function (string $type, string $output){
            echo $output."<br/>";
        });

        sleep(5);

        dd('END'); // todo: TMP

//        session()->flash('success', "System aktualizovany.");
//        return redirect()->back();
    }
}
