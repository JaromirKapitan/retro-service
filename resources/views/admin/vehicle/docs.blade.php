@extends('admin.vehicle.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('admin.vehicles.update-docs', $model) }}">
            @csrf
            @method('PUT')

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ $model->title }}
                    <div class="float-end">
                        {{--                        {!! getFlagByLang($model->lang) !!}--}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <x-form.textarea name="docs" :label="__('admin.docs')" addClass="ckeditor">{{ $model->docs }}</x-form.textarea>
                    </div>
                </div>
            </div>


            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
