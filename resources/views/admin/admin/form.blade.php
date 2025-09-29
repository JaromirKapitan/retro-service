@extends('admin.admin.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.admins.update', $model) : route('admin.admins.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('admin.admins') }}
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <x-form.input name="name" :value="$model->name" :label="__('admin.name')"/>
                    </div>
                    <div class="mb-3">
                        <x-form.input name="email" :value="$model->email" :label="__('admin.email')"/>
                    </div>
                    <div class="mb-3">
                        <x-form.password name="password" :label="__('admin.new_password')"/>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
