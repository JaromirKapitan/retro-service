<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatusEnum;
use App\Enums\LangEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebPageRequest;
use App\Models\SeoData;
use App\Models\WebPage;
use Illuminate\Http\Request;

class WebPageController extends Controller
{
    use SeoController;

    public function index()
    {
        return view('admin.web-page.index', [
            'list' => WebPage::parents()->get(),
        ]);
    }

    public function show(WebPage $webPage)
    {
        return view('admin.web-page.show', [
            'model' => $webPage,
        ]);
    }

    public function create(Request $request)
    {
        $webPage = new WebPage(session()->get('_old_input') ?? [
            'lang' => $request->get('lang') ?? LangEnum::getPrimary(),
            'parent_id' => $request->get('parent_id') ?? null,
        ]);

        if (!empty(session()->get('_old_input'))) {
            $webPage->seo = new SeoData(session()->get('_old_input'));
        }

        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function store(WebPageRequest $request)
    {
        $webPage = WebPage::create($request->all());
        $webPage->seo()->create($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }

    public function edit(WebPage $webPage)
    {
        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function update(WebPageRequest $request, WebPage $webPage)
    {
        $webPage->update($request->all());
        $webPage->seo()->update($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }
}
