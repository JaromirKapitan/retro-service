<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SeoData;
use App\Models\WebMenu;
use App\Models\WebPage;

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
        $homePage = WebPage::home()->published()->first();

        return view($homePage ? 'app.web-page' : 'app.home', [
            'menu' => $this->getMenu(),
            'model' => $homePage
        ]);
    }

    public function show($slug)
    {
        $seo = SeoData::slug($slug)->first();

        if(empty($seo) || !$seo->seoble->isPublished)
            return abort(404);

        return view($this->getTempleBySeo($seo), [
            'menu' => $this->getMenu(),
            'model' => $seo->seoble
        ]);
    }

    protected function getMenu(){
        return WebMenu::whereNull('parent_id')->get()->filter(function($item){
            return $item->target->isPublished;
        });
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
