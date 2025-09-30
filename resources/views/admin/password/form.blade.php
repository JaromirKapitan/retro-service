@extends('admin.layout')

@section('menu')
    <nav class="navbar navbar-expand-md sticky-top bg-light-subtle" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubLeft"
                    aria-controls="offcanvasNavbarSubLeft"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ route('admin.admins.index') }}">{{ __('admin.change_password') }}</a>
        </div>
    </nav>

@endsection

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('admin.password.store') }}">
            @csrf

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('admin.change_password') }}
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <x-form.password name="current_password" :label="__('admin.current_password')"/>
                    </div>
                    <div class="mb-3">
                        <x-form.password name="password" :label="__('admin.new_password')"/>
                    </div>
                    <div class="mb-3">
                        <x-form.password name="password_confirmation" :label="__('admin.confirm_password')"/>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            </div>
        </form>
    </div>
@endsection
