<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use App\Http\Controllers\Controller;
use App\Models\Language;
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

    public function create(Request $request)
    {
        return view('admin.web-page.form', [
            'model' => new WebPage(session()->get('_old_input') ?? [
                'status' => ContentStatus::Draft->value,
                'lang' => $request->get('lang') ?? config('app.locale'),
                'parent_id' => $request->get('parent_id') ?? null,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $webPage = WebPage::create($this->validateRequest($request));
        $webPage->seo()->create($this->getSeoData());

        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('Data stored successfully.'));
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
            ->with('success', trans('Data updated successfully.'));
    }

    public function destroy(WebPage $webPage)
    {
        $webPage->delete();
        return redirect()
            ->route('admin.web-pages.index')
            ->with('success', trans('Data deleted successfully.'));
    }
}
