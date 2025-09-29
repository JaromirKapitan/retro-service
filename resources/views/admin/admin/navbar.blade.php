<nav class="navbar navbar-expand-md sticky-top bg-light-subtle" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubLeft" aria-controls="offcanvasNavbarSubLeft"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('admin.admins.index') }}">{{ __('admin.admins') }}</a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarSubLeft" aria-labelledby="offcanvasNavbarSubLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarSubLeftLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.index')]) href="{{ route('admin.admins.index') }}">
                            <i class="fa fa-list"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.create')]) href="{{ route('admin.admins.create') }}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @if(!empty($model) && $model->id)
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubRight"
                    aria-controls="offcanvasNavbarSubRight" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarSubRight" aria-labelledby="offcanvasNavbarSubRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarSubRightLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.show')]) href="{{ route('admin.admins.show', $model) }}">
                                <i class="fa fa-info"></i>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.images')]) href="{{ route('admin.admins.images', $model) }}">--}}
{{--                                <i class="fa fa-image"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.files')]) href="{{ route('admin.admins.files', $model) }}">--}}
{{--                                <i class="fa fa-file"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.edit')]) href="{{ route('admin.admins.edit', $model) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link submit-form text-hover-danger" href="#" data-ask="{{ __('admin.do_you_really_want_to_delete_this_record') }}">
                                <i class="fa fa-trash-can"></i>
                            </a>
                            <form action="{{ route('admin.admins.destroy', $model) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>
