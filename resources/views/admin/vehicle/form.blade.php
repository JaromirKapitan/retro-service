@extends('admin.vehicle.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.vehicles.update', $model) : route('admin.vehicles.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('admin.vehicle') }}
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
                                @foreach($form->web_page_options as $webPage)
                                    <x-form.checkbox name="web_pages[]"
                                                     :value="$webPage->id"
                                                     :label="$webPage->title"
                                                     :inputAttributes="['id'=>'web_page_'.$webPage->id]"
                                                     :checked="$model->webPages->contains($webPage) || empty($model->id) && $webPage->for_vehicles"
                                    />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <x-form.input name="brand" :value="$model->brand" :label="__('admin.brand')"/>
                                </div>
                                <div class="col-sm-4">
                                    <x-form.input name="model" :value="$model->model" :label="__('admin.model')"/>
                                </div>
                                <div class="col-sm-4">
                                    <x-form.input name="slug" :value="optional($model->seo)->slug" :label="__('admin.slug')"/>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <x-form.select name="type" :label="__('admin.type')" :options="$form->type_options" :emptyLabel="__('admin.select_option')"/>
                                </div>

                                <div class="col-sm-4">
                                    <x-form.input name="year_from" :value="$model->year_from" :label="__('admin.production_year_from')" />
                                </div>
                                <div class="col-sm-4">
                                    <x-form.input name="year_to" :value="$model->year_to" :label="__('admin.production_year_to')" />
                                </div>

{{--                                <div class="col-sm-8">--}}
{{--                                    <label for="year_from" class="form-label">{{ __('admin.production_years') }}</label>--}}

{{--                                    <div class="input-group">--}}
{{--                                        <input type="text" maxlength="4" id="year_from" name="year_from" value="{{ $model->year_from }}" class="form-control">--}}
{{--                                        <span class="input-group-text">-</span>--}}
{{--                                        <input type="text" maxlength="4" id="year_to" name="year_to" value="{{ $model->year_to }}" class="form-control">--}}
{{--                                    </div>--}}

{{--                                    @error('year_from')--}}
{{--                                    <div class="invalid-feedback">{!! nl2br($message) !!}</div>--}}
{{--                                    @enderror--}}
{{--                                    @error('year_to')--}}
{{--                                    <div class="invalid-feedback">{!! nl2br($message) !!}</div>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
                            </div>

                            <div class="mb-3">
                                <x-form.textarea name="description" :label="__('admin.description')">{{ $model->description }}</x-form.textarea>
                            </div>

                            <div class="mb-3">
                                <x-form.textarea name="content" :label="__('admin.content')" addClass="ckeditor">{{ $model->content }}</x-form.textarea>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <x-form.textarea name="specs" :label="__('admin.specs')" addClass="ckeditor">{{ $model->specs }}</x-form.textarea>
                                    <div class="text-muted">{{ __('admin.not_required_but_nice_to_have') }}: {{ $model->email }}</div>
                                </div>

                                <div class="col-md-4">
                                    <x-form.textarea name="modifications" :label="__('admin.modifications_on_vehicle')" addClass="ckeditor">{{ $model->modifications }}</x-form.textarea>
                                </div>
                                <div class="col-md-4">
                                    <x-form.textarea name="links" :label="__('admin.links')" addClass="ckeditor">{{ $model->links }}</x-form.textarea>
                                </div>
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

@push('scripts')
    <script>
        window.onload = function() {
            $('#brand, #model').keyup(e => {
                $('#slug').val(slug($('#brand').val() + " " + $('#model').val()));
            })
        };
    </script>
@endpush
