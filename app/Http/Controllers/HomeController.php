<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SeoData;
use App\Models\WebMenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menu = WebMenu::whereNull('parent_id')->get();
        return view('app.home', compact('menu'));
    }

    public function show($slug)
    {
        $seo = SeoData::slug($slug)->first();

        if(empty($seo))
            return abort(404);

        return view($this->getTempleBySeo($seo), [
            'menu' => WebMenu::whereNull('parent_id')->get(),
            'model' => $seo->seoble
        ]);
    }

    protected function getTempleBySeo(SeoData $seo)
    {
        $class = get_class($seo->seoble);

        switch ($class){
            case Article::class:
                return 'app.article';

            default:
                return 'app.web-page';
        }
    }
}
