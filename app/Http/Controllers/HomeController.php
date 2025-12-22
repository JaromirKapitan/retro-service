<?php

namespace App\Http\Controllers;

use App\Enums\LangEnum;
use App\Models\SeoData;
use App\Models\WebMenu;
use App\Models\WebPage;
use App\Services\HomePageService;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct(
        private HomePageService $homePageService
    ) {}

    public function index()
    {
        $page = $this->homePageService->getPage();

        return inertia('HomePage', [
            'stats' => $this->homePageService->getStats(),
            'page' => $page,
            'hero_img' => $page->getMedia('images')->first()->getUrl(),
        ]);
    }

    // legacy code
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
                if (LangEnum::isMultilang() && app()->getLocale() != $item->target->lang) {
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

        if(view()->exists($view))
            return $view;

        if($class === WebPage::class && $seo->seoble->for_vehicles) {
            return 'app.web-page-vehicles';
        }

        return 'app.web-page';
    }
}
