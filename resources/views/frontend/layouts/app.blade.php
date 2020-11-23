<!doctype html>
<html lang="pl">
    <head>
@if (App::environment('prod'))
@yield('gtag')
@endif
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ mix('css/frontend/app.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description', 'ręcznie tworzone wody toaletowe i kolońskie. naturalne składniki. dobra jakość')">
        <meta name="keywords" content="@yield('keywords', 'woda toaletowa, woda kolońska, polska woda kolońska, polska woda toaletowa, naturalna woda kolońska, lawenda dla panów, gardenia')">
        <link rel="canonical" href="https://woda-kolonska.pl/">
        @include('frontend.includes.favicon')
        @include('frontend.includes.open_graph_basic')
        @yield('open_graph_optional')

@section('ldjson')
        @include('frontend.page.includes.ld_json_local_business')
        @include('frontend.page.includes.ld_json_logo')
        @include('frontend.page.includes.ld_json_faq')
@show
    </head>
    <body>
        @include('frontend.includes.nav')
@if (session('alert'))
        @include('frontend.includes.alert')
@endif
        <div class="container-fluid">
@yield('content')
            @include('frontend.includes.nav1')
            @include('frontend.includes.footer')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>