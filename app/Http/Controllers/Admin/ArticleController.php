<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ContentStatus;
use App\Enums\Lang;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use MediaController, SeoController;

    public function index()
    {
        return view('admin.article.index', [
            'list' => Article::all(),
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
        return view('admin.article.form', [
            'model' => new Article(session()->get('_old_input') ?? [
                'status' => ContentStatus::Draft->value,
                'lang' => $request->get('lang') ?? config('app.locale'),
                'parent_id' => $request->get('parent_id') ?? null,
            ]),
        ]);
    }

    public function store(Request $request)
    {
        $article = Article::create($this->validateRequest($request));
        $article->seo()->create($this->getSeoData());

        return redirect()
            ->route('admin.articles.index')
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

    public function edit(Article $article)
    {
        return view('admin.article.form', [
            'model' => $article,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($this->validateRequest($request));
        $article->seo()->update($this->getSeoData());
        $article->webPages()->sync($request->get('web_pages'));

        return redirect()
            ->route('admin.articles.index')
            ->with('success', trans('Data updated successfully.'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()
            ->route('admin.articles.index')
            ->with('success', trans('Data deleted successfully.'));
    }

    protected function getMediaParams($id)
    {
        return [
            'model' => Article::findOrFail($id),
            'layout' => 'admin.article.layout',
        ];
    }
}
