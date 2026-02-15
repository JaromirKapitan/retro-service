<nav class="navbar navbar-expand-md sticky-top bg-light-subtle" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubLeft" aria-controls="offcanvasNavbarSubLeft"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('admin.vehicles.index') }}">{{ __('admin.vehicles') }}</a>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarSubLeft" aria-labelledby="offcanvasNavbarSubLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarSubLeftLabel">{{ __('admin.vehicles') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.index')]) href="{{ route('admin.vehicles.index') }}">
                            <i class="fa fa-list"></i>
                            <span class="d-md-none">{{ __('admin.list') }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.create')]) href="{{ route('admin.vehicles.create') }}">
                            <i class="fa fa-plus"></i>
                            <span class="d-md-none">{{ __('admin.add') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubRight"
                aria-controls="offcanvasNavbarSubRight" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(!empty($model) && $model->id)
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarSubRight" aria-labelledby="offcanvasNavbarSubRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarSubRightLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <x-entity.detail-buttons entity="vehicles" :model="$model" :multilang="\App\Enums\LangEnum::isMultilang()">
                        <li class="nav-item">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.docs')]) href="{{ route('admin.vehicles.docs', $model) }}"
                               title="{{ __('admin.docs') }}">
                                <i class="fa fa-book"></i>
                                <span class="d-md-none">{{ __('admin.docs') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.links')]) href="{{ route('admin.vehicles.links', $model) }}"
                               title="{{ __('admin.links') }}">
                                <i class="fa fa-link"></i>
                                <span class="d-md-none">{{ __('admin.links') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.mods')]) href="{{ route('admin.vehicles.mods', $model) }}"
                               title="{{ __('admin.mods') }}">
                                <i class="fa fa-wrench"></i>
                                <span class="d-md-none">{{ __('admin.mods') }}</span>
                            </a>
                        </li>
                    </x-entity.detail-buttons>
                </div>
            </div>
        @endif
    </div>
</nav>
