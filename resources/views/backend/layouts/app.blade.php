<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
        <title>@yield('title')</title>
        <meta name="robots" content="noindex">
    </head>
    <body>
        @include('backend.includes.nav')
@if (session('alert'))
        @include('backend.includes.alert')
@endif
        <div class="container-fluid" id="app">
@yield('content')
            @include('backend.includes.footer')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>