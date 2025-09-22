<nav class="navbar navbar-expand-md sticky-top bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLeft" aria-controls="offcanvasNavbarLeft" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>

        @guest
        @else
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarLeft" aria-labelledby="offcanvasNavbarLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLeftLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('Pages') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.web-pages.*')]) href="{{ route('admin.web-pages.index') }}">
                            <i class="fa fa-globe"></i>
                        </a>
                    </li>
                    <li class="nav-item" title="{{ __('Articles') }}">
                        <a @class(['nav-link', 'active'=>request()->routeIs('admin.articles.*')]) href="{{ route('admin.articles.index') }}">
                            <i class="fa fa-newspaper"></i>
                        </a>
                    </li>


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
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{--                                {{ __('Logout') }}--}}
                                <i class="fa fa-power-off"></i>
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
