<!DOCTYPE HTML>
<head>
    <title>Classic White | Magazine</title>
    <meta charset="utf-8">
    <!-- Google Fonts -->
{{--    <link href='https://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>--}}

{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>--}}

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.1.1/ckeditor5.css" crossorigin>

    <!-- CSS Files -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container">

<h1 class="rs-font" href="{{ config('app.url') }}">Retro Service</h1>
<nav class="navbar navbar-expand-md rounded sticky-top rs-shadow">
    <div class="container">
{{--        <a class="navbar-brand rs-font" href="{{ config('app.url') }}">Retro Service</a>--}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($menu as $menuItem)
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->routeIs('show', $menuItem->seo->slug)]) href="{{ route('show', $menuItem->seo->slug) }}">
                            {{ $menuItem->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav justify-content-end flex-grow-1">
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('admin.login') }}">{{ __('admin.login') }}</a>--}}
{{--                </li>--}}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
{{--                        Dropdown--}}
                        {!! getFlagByLang(app()->getLocale()) !!}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @foreach(\App\Enums\Lang::availible() as $lang)
                            <li><a class="dropdown-item" href="{{ route('language', $lang->value) }}">{!! getFlagByLang($lang->value) !!} {{ $lang->getTitle() }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container rounded mt-3 rs-shadow">
    @yield('content')
</main>

</body>
</html>
