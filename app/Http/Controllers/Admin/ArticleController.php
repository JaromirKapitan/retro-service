<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatusEnum;
use App\Enums\LangEnum;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\SeoData;
use App\Models\WebPage;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use MediaController, SeoControllerTrait;

    public function index()
    {
        return view('admin.article.index', [
            'list' => Article::whereNull('parent_id')->get(),
        ]);
    }

    public function show(Article $article)
    {
        return view('admin.article.show', [
            'model' => $article,
        ]);
    }

    public function create(Request $request)
    {
        $article = new Article(session()->get('_old_input') ?? [
            'lang' => $request->get('lang') ?? config('app.locale'),
            'parent_id' => $request->get('parent_id') ?? null,
        ]);

        if(!empty(session()->get('_old_input'))) {
            $article->seo = new SeoData(session()->get('_old_input'));
        }

        return view('admin.article.form', [
            'model' => $article,
            'form' => $this->getFormData($article),
        ]);
    }

    protected function getFormData(Article $article){
        return (object)[
            'web_page_options' => WebPage::all()->map(function ($item) use ($article){
                return (object)[
                    'value' => $item->id,
                    'title' => $item->title,
                    'selected' => $article->webPages->contains($item) ? 'selected' : '',
                ];
            })
        ];
    }

    public function store(Request $request)
    {
        $article = Article::create($this->validateRequest($request));
        $article->seo()->create($this->getSeoData());
        $article->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.articles.index')
            ->with('success', trans('admin.saved'));
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate(array_merge([
            'parent_id' => 'nullable|integer',
            'lang' => 'nullable|in:' . LangEnum::valuesString(),
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:300',
            'content' => 'nullable|string',
            'status' => 'required|in:' . ContentStatusEnum::valuesString(),
        ], $this->getSeoRules()));
    }

    public function edit(Article $article)
    {
        return view('admin.article.form', [
            'model' => $article,
            'form' => $this->getFormData($article),
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($this->validateRequest($request));
        $article->seo()->update($this->getSeoData());
        $article->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.articles.index')
            ->with('success', trans('admin.saved'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()
            ->route('admin.articles.index')
            ->with('success', trans('admin.record_deleted'));
    }

    protected function getMediaParams($id)
    {
        return [
            'model' => Article::findOrFail($id),
            'layout' => 'admin.article.layout',
        ];
    }
}
