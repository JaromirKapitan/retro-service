<!DOCTYPE HTML>
<head>
    <title>Classic White | Magazine</title>
    <meta charset="utf-8">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Parisienne' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.1.1/ckeditor5.css" crossorigin>

    <!-- CSS Files -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="container">

<nav class="navbar navbar-expand-md rounded sticky-top rs-shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ config('app.url') }}">Retro Service</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach($menu as $menuItem)
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => request()->routeIs('show', $menuItem->target->seo->slug)]) href="{{ route('show', $menuItem->target->seo->slug) }}">
                            {{ $menuItem->target->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<main class="container rounded mt-3 rs-shadow">
    @yield('content')
</main>

</body>
</html>
