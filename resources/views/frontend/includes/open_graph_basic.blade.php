        <meta property="og:title" content="@yield('title', '{{ config("settings.company_name") }}')">
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:url" content="@yield('og_url', config('app.url'))">
        <meta property="og:image" content="@yield('og_image', config("settings.company_logo"))">
        <meta property="og:locale" content="pl_PL">
        <meta property="og:description" content="@yield('description', config("settings.company_description"))">
        <meta property="og:site_name" content="{{ config('settings.company_name') }}">
