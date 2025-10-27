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
                    {{ __('admin.article') }}
                    <div class="float-end">
                        {!! getFlagByLang($model->lang) !!}
                    </div>
                </div>

                <div class="card-body">
                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $model->parent_id ?? '' }}">
                    <input type="hidden" id="lang" name="lang" value="{{ $model->lang ?? '' }}">

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label class="form-label">{{ __('admin.web_pages') }}</label>
                                @foreach(\App\Models\WebPage::whereNull('parent_id')->get() as $webPage)
                                    <x-form.checkbox name="web_pages[]"
                                                     :value="$webPage->id"
                                                     :label="$webPage->title"
                                                     :inputAttributes="['id'=>'web_page_'.$webPage->id]"
                                                     :checked="$model->webPages->contains($webPage)"
                                    />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <x-form.input name="title" :value="$model->title" :label="__('admin.title')" :inputAttributes="['data-seo' => 'slug']"/>
                                    </div>
                                    <div class="col-sm-6">
                                        <x-form.input name="slug" :value="optional($model->seo)->slug" :label="__('admin.slug')"/>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <x-form.textarea name="description" :label="__('admin.description')">{{ $model->description }}</x-form.textarea>
                            </div>

                            <div class="mb-3">
                                <x-form.textarea name="content" :label="__('admin.content')" addClass="ckeditor">{{ $model->content }}</x-form.textarea>
                            </div>

                            <div class="mb-3 text-end">
                                <x-form.content-status :value="$model->status"/>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
