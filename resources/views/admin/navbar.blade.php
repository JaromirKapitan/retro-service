<nav class="navbar navbar-expand-md sticky-top bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLeft" aria-controls="offcanvasNavbarLeft" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('app.name', 'Laravel') }}</a>

        @guest
        @else
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarLeft" aria-labelledby="offcanvasNavbarLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLeftLabel">{{ config('app.name', 'Laravel') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item" title="{{ __('admin.online_web') }}">
                        <a class="nav-link" href="/">
                            <i class="fa fa-globe"></i>
                            <span class="d-md-none">{{ __('admin.online_web') }}</span>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('admin.web_pages') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-pages.*')]) href="{{ route('admin.web-pages.index') }}">
                            <i class="fa fa-copy"></i>
                            <span class="d-md-none">{{ __('admin.web_pages') }}</span>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('admin.articles') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.articles.*')]) href="{{ route('admin.articles.index') }}">
                            <i class="fa fa-newspaper"></i>
                            <span class="d-md-none">{{ __('admin.articles') }}</span>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('admin.vehicles') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.vehicles.*')]) href="{{ route('admin.vehicles.index') }}">
                            <i class="fa fa-car"></i>
                            <span class="d-md-none">{{ __('admin.vehicles') }}</span>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('admin.tasks') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.tasks.*')]) href="{{ route('admin.tasks.index') }}">
                            <i class="fa fa-list-check"></i>
                            <span class="d-md-none">{{ __('admin.tasks') }}</span>
                        </a>
                    </li>
{{--                    <li class="nav-item" title="{{ __('admin.users') }}">--}}
{{--                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.users.*')]) href="{{ route('admin.users.index') }}">--}}
{{--                            <i class="fa fa-user"></i>--}}
{{--                        </a>--}}
{{--                    </li>--}}


                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link" href="#">Link</a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{--                            Dropdown--}}
                    {{--                        </a>--}}
                    {{--                        <ul class="dropdown-menu">--}}
                    {{--                            <li><a class="dropdown-item" href="#">Action</a></li>--}}
                    {{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                    {{--                            <li>--}}
                    {{--                                <hr class="dropdown-divider">--}}
                    {{--                            </li>--}}
                    {{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
        </div>
        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarRight" aria-controls="offcanvasNavbarRight" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarRight" aria-labelledby="offcanvasNavbarRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarRightLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <!-- Authentication Links -->

                    @guest
                        @if (Route::has('admin.login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('admin.login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item" title="{{ __('admin.update_codes') }}">
                            <a @class(['nav-link', 'disabled'=>isLocalhost()]) href="{{ route('admin.pull') }}">
                                <i class="fa fa-code-pull-request"></i>
                                <span class="d-md-none">{{ __('admin.update_codes') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" title="{{ __('admin.admins') }}">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.admins.*')]) href="{{ route('admin.admins.index') }}">
                                <i class="fa fa-user"></i>
                                <span class="d-md-none">{{ __('admin.admins') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" title="{{ __('admin.change_password') }}">
                            <a @class(['nav-link', 'active'=>request()->routeIs('admin.password.create')]) href="{{ route('admin.password.create') }}">
                                <i class="fa fa-key"></i>
                                <span class="d-md-none">{{ __('admin.change_password') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}" title="{{ __('admin.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{--                                {{ __('Logout') }}--}}
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                                <i class="fa fa-power-off"></i>
                                <span class="d-md-none">{{ Auth::user()->name }} - {{ __('admin.logout') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
