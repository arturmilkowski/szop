    <nav>
      <a href="{{ route('pages.index') }}" @if(Route::currentRouteName() == 'pages.index')class="active"@endif title="">Strona główna</a>
      <a href="#">Produkty</a>
      <a href="{{ route('pages.about') }}" @if(Route::currentRouteName() == 'pages.about')class="active"@endif title="">O firmie</a>
      <a href="{{ route('pages.contacts.create') }}" @if(Route::currentRouteName() == 'pages.contacts.create')class="active"@endif title="">Kontakt</a>
    </nav>
