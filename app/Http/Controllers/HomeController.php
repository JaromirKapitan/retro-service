<?php

namespace App\Http\Controllers;

use App\Enums\Lang;
use App\Models\SeoData;
use App\Models\WebMenu;
use App\Models\WebPage;
use Illuminate\Support\Str;

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
        $homePage = WebPage::home()->lang(app()->getLocale())->published()->first();

        return view($homePage ? 'app.web-page' : 'app.home', [
            'menu' => $this->getMenu(),
            'model' => $homePage
        ]);
    }

    public function show($slug)
    {
        $seo = SeoData::slug($slug)->lang(app()->getLocale())->first();

        if(empty($seo)) {
            $seo = SeoData::slug($slug)->first();
            if(!empty($seo)){
                app()->setLocale($seo->lang);
                session()->put('locale', $seo->lang);
            }
        }

        if (empty($seo) || !$seo->seoble->isPublished)
            return abort(404);

        return view($this->getTempleBySeo($seo), [
            'menu' => $this->getMenu(),
            'model' => $seo->seoble
        ]);
    }

    protected function getMenu()
    {
        return WebMenu::whereNull('parent_id')->get()
            ->map(function ($item) {
                if (Lang::isMultilang() && app()->getLocale() != $item->target->lang) {
                    return $item->target->childrens->firstWhere('lang', app()->getLocale());
                }

                return $item->target;
            })->filter(function ($item) {
                return !empty($item) && $item->isPublished;
            });
    }

    protected function getTempleBySeo(SeoData $seo)
    {
        $class = get_class($seo->seoble);
        $view = 'app.'.Str::slug(class_basename($class));
        return view()->exists($view) ? $view : 'app.web-page';
    }
}
