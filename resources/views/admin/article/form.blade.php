@extends('admin.article.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.articles.update', $model) : route('admin.articles.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('Web pages') }}
                </div>

                <div class="card-body">
                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $model->parent_id ?? '' }}">
                    <input type="hidden" id="lang" name="lang" value="{{ $model->lang ?? '' }}">

                    <div class="mb-3">
                        <label for="page" class="form-label">{{ __('Page') }}</label>
                        <select class="form-select select2 @error('web_pages') is-invalid @enderror" id="web_pages" name="web_pages[]" multiple>
                            @foreach(\App\Models\WebPage::all() as $page)
                                <option value="{{ $page->id }}" {{ $model->webPages->contains($page) ? 'selected' : '' }}>{{ $page->title }}</option>
                            @endforeach
                        </select>

                        @error('web_pages')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-form.input name="title" :value="$model->title" :label="__('Title')" :inputAttributes="['data-seo' => 'slug']"/>
                            </div>
                            <div class="col-sm-6">
                                <x-form.input name="slug" :value="optional($model->seo)->slug" :label="__('Slug')"/>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-form.textarea name="description" :label="__('Description')">{{ $model->description }}</x-form.textarea>
                    </div>

                    <div class="mb-3">
                        <x-form.textarea name="content" :label="__('Content')" addClass="ck editor">{{ $model->content }}</x-form.textarea>
                    </div>

                    <div class="mb-3 text-end">
                        <x-form.content-status :value="$model->status"/>
                    </div>
                </div>
            </div>


            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
