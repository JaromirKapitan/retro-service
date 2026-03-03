<?php

namespace App\Http\Controllers\Admin;

use App\Enums\LangEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WebPageRequest;
use App\Models\WebPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use LogicException;

class WebPageController extends Controller
{
    use SeoControllerTrait;

    public function index(): View
    {
        return view('admin.web-page.index', [
            'list' => WebPage::parents()->get(),
        ]);
    }

    public function show(WebPage $webPage): View
    {
        return view('admin.web-page.show', [
            'model' => $webPage,
        ]);
    }

    public function create(Request $request): View
    {
        $webPage = new WebPage([
            'lang'      => $request->get('lang') ?? LangEnum::getPrimary(),
            'parent_id' => $request->get('parent_id'),
        ]);

        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function store(WebPageRequest $request): RedirectResponse
    {
        /** @var WebPage $webPage */
        $webPage = WebPage::create($request->validated());
        $webPage->seo()->create($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }

    public function edit(WebPage $webPage): View
    {
        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function update(WebPageRequest $request, WebPage $webPage): RedirectResponse
    {
        $webPage->update($request->validated());
        $webPage->seo()->updateOrCreate([], $this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }

    public function destroy(): never
    {
        throw new LogicException('WebPage records cannot be deleted.');
    }
}
