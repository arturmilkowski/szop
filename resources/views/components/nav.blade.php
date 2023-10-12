    <nav class="flex px-2 pt-2 space-x-8">
      <a href="{{ route('pages.index') }}" @if(Route::currentRouteName() == 'pages.index')class="active"@endif title="">Strona główna</a>
      <a href="{{ route('products.index') }}" @if(Str::startsWith(Route::currentRouteName(), 'products'))class="active"@endif title="">Produkty</a>
      <a href="{{ route('blog.posts.index') }}" @if(Str::startsWith(Route::currentRouteName(), 'blog'))class="active"@endif title="">Blog</a>
      <a href="{{ route('pages.about') }}" @if(Route::currentRouteName() == 'pages.about')class="active"@endif title="">O firmie</a>
      <a href="{{ route('pages.contacts.create') }}" @if(Route::currentRouteName() == 'pages.contacts.create')class="active"@endif title="">Kontakt</a>
@auth
      <a href="{{ url('/dashboard') }}">Dashboard</a>
@else
      <a href="{{ route('login') }}">Log in</a>
      <a href="{{ route('register') }}">Register</a>
@endauth
    </nav>
