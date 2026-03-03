@extends('admin.web-page.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.web-pages.update', $model) : route('admin.web-pages.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('admin.web_pages') }}
                    <div class="float-end">
                        {!! getFlagByLang($model->lang) !!}
                    </div>
                </div>

                <div class="card-body">
                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $model->parent_id ?? '' }}">
                    <input type="hidden" id="lang" name="lang" value="{{ $model->lang ?? '' }}">

                    <div class="mb-3 row">
                        <div class="{{ !$model->parent_id ? 'col-sm-6' : 'col-sm-12' }}">
                            <x-form.input name="title" :value="$model->title" :label="__('admin.title')"
                                          :input-attributes="!$model->id ? ['data-seo' => 'slug'] : []"/>
                        </div>
                        @if(!$model->parent_id)
                            <div class="col-sm-6">
                                <x-form.input name="slug" :value="$model->seo?->slug" :label="__('Slug')"/>
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <x-form.textarea
                            name="description"
                            :label="__('admin.description')"
                            maxlength="160"
                        >{{ $model->description }}</x-form.textarea>
                        <div class="form-text text-muted">{{ __('admin.description_hint') }}</div>
                    </div>

                    <div class="mb-3">
                        <x-form.textarea name="content" :label="__('admin.content')" addClass="ckeditor">{{ $model->content }}</x-form.textarea>
                    </div>

                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
