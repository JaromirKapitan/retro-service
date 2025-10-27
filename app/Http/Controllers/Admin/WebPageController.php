<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use App\Http\Controllers\Controller;
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
            'lang' => $request->get('lang') ?? Lang::getPrimary(),
            'parent_id' => $request->get('parent_id') ?? null,
        ]);

        if (!empty(session()->get('_old_input'))) {
            $webPage->seo = new SeoData(session()->get('_old_input'));
        }

        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function store(Request $request)
    {
        $webPage = WebPage::create($this->validateRequest($request));
        $webPage->seo()->create($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate(array_merge([
            'parent_id' => 'nullable|integer',
            'lang' => 'nullable|in:' . Lang::valuesString(),
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:300',
            'content' => 'nullable|string',
            'status' => 'required|in:' . ContentStatus::valuesString(),
            'home' => 'nullable|bool',
            'for_vehicles' => 'nullable|bool',
        ], $this->getSeoRules()));
    }

    public function edit(WebPage $webPage)
    {
        return view('admin.web-page.form', [
            'model' => $webPage,
        ]);
    }

    public function update(Request $request, WebPage $webPage)
    {
        $webPage->update($this->validateRequest($request));
        $webPage->seo()->update($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.saved'));
    }

    public function destroy(WebPage $webPage)
    {
        $webPage->delete();

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('admin.record_deleted'));
    }
}
