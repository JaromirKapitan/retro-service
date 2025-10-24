<!DOCTYPE HTML>
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.1.1/ckeditor5.css" crossorigin>

    <!-- CSS Files -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<header class="site-header">
    <div class="container">
        <input id="navToggle" class="nav-toggle" type="checkbox" hidden>
        <h1 class="logo">{{ config('app.name') }}</h1>

        <nav class="main-nav">
            @foreach($menu as $menuItem)
                <a href="{{ route('show', $menuItem->seo->slug) }}">{{ $menuItem->title }}</a>
            @endforeach
        </nav>

        @if(\App\Enums\Lang::isMultilang())
            <div class="lang-switcher" style="margin-left:12px">
                <button class="lang-btn" aria-haspopup="true" aria-expanded="false">{{ strtoupper(config('app.locale')) }}</button>
                <div class="lang-menu">
                    @foreach(\App\Enums\Lang::availible() as $lang)
                        <a class="lang-option" href="{{ route('language', $lang->value) }}">{{ strtoupper($lang->value) }}</a>
                    @endforeach
                </div>
            </div>
        @endif

        <label for="navToggle" class="menu-toggle" aria-label="Toggle menu" role="button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </label>
    </div>
</header>

<main class="container">
    @yield('content')

    {{--        <section class="hero">--}}
    {{--            <h2>Opravy a servis v tmavom vintage štýle</h2>--}}
    {{--            <p>Komplexné návody, tipy na renovácie a kontakty na overené servisy.</p>--}}
    {{--            <a class="btn" href="vehicles.html">Prejsť na vozidlá</a>--}}
    {{--        </section>--}}

    {{--        <section class="intro-cards">--}}
    {{--            <article class="card">Návody a technické postupy</article>--}}
    {{--            <article class="card">Predajcovia dielov</article>--}}
    {{--            <article class="card">Miestne servisy a kontakty</article>--}}
    {{--        </section>--}}
</main>

<footer class="site-footer">
    <div class="container">
        <p>&copy; 2025 {{ config('app.name') }}</p>
    </div>
</footer>

</body>
</html>
