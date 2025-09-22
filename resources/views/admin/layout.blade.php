<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
    </head>
    <body>

    @include('admin.navbar')

    @yield('menu')

    <main class="py-2">
        @yield('content')
    </main>

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.0.2/ckeditor5.css" />
    <script src="https://cdn.ckeditor.com/ckeditor5/46.0.2/ckeditor5.umd.js"></script>

    @livewireScriptConfig

    </body>
</html>
