<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
        <meta name="robots" content="noindex">
        <title>@yield('title')</title>
    </head>
    <body>
@if (session('alert'))
        @include('backend.includes.alert')
@endif
        <div class="container">
            @include('includes.nav')
@yield('content')
            @include('backend.includes.footer')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
