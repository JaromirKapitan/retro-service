@extends('admin.task.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.tasks.update', $model) : route('admin.tasks.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('admin.task') }}
                    <div class="float-end">
                        {!! getFlagByLang($model->lang) !!}
                    </div>
                </div>

                <div class="card-body">
                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $model->parent_id ?? '' }}">
                    <input type="hidden" id="lang" name="lang" value="{{ $model->lang ?? '' }}">

                    <div class="mb-3">
                        <x-form.input name="title" :value="$model->title" :label="__('admin.title')" :inputAttributes="['data-seo' => 'slug']"/>
                    </div>

                    <div class="mb-3">
                        <x-form.textarea name="description" :label="__('admin.description')">{{ $model->description }}</x-form.textarea>
                    </div>

                    <div class="mb-3">
                        <x-form.select name="admin_id" :label="__('admin.assign_to')" :options="$form->user_options" :emptyLabel="__('admin.select_option')"/>
                    </div>

                    <div class="mb-3">
                        <x-form.input name="due_date" :value="optional($model->due_date)->format('Y-m-d')" :label="__('admin.due_date')" :inputAttributes="['type'=>'date']"/>
                    </div>

                    <div class="mb-3 text-end">
                        <x-form.status-buttons :enumClass="\App\Enums\TaskStatusEnum::class" :value="$model->status ?? \App\Enums\TaskStatusEnum::PENDING->value" />
                    </div>
                </div>
            </div>


            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
