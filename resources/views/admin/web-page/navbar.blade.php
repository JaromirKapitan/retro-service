<nav class="navbar navbar-expand-md sticky-top bg-light-subtle" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubLeft" aria-controls="offcanvasNavbarSubLeft" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('admin.web-pages.index') }}">{{ __('Pages') }}</a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarSubLeft" aria-labelledby="offcanvasNavbarSubLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarSubLeftLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-pages.index')]) href="{{ route('admin.web-pages.index') }}">
                            <i class="fa fa-list"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-pages.create')]) href="{{ route('admin.web-pages.create') }}">
                            <i class="fa fa-plus"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-menu.edit')]) href="{{ route('admin.web-menu.edit') }}">
                            <i class="fa fa-folder-tree"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @if(!empty($model) && $model->id)
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubRight" aria-controls="offcanvasNavbarSubRight" aria-label="Toggle navigation">
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
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-pages.edit')]) href="{{ route('admin.web-pages.edit', $model) }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link submit-form text-hover-danger" href="#" data-ask="{{ __('Do you really want to delete this record?') }}">
                                <i class="fa fa-trash-can"></i>
                            </a>
                            <form action="{{ route('admin.web-pages.destroy', $model) }}" method="POST" class="d-none">
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
