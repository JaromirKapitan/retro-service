<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <title>Theme Default</title>
        @vite([
            'frontend-themes/theme-default/resources/css/app.css',
            'frontend-themes/theme-default/resources/js/app.js',
        ])
    </head>
    <body>
    <div class="container">
        @yield('content')
    </div>
    </body>
</html>
