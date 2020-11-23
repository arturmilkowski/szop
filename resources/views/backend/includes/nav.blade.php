        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('frontend.pages.index') }}" title="strona główna sklepu">{{ config('settings.company_name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if($currentRouteName == 'backend.users.index') active @endif">
                        <a class="nav-link" href="{{ route('backend.users.index') }}" title="strona główna konta">konto @if($currentRouteName == 'backend.users.index')<span class="sr-only">(current)</span>@endif</a>
                    </li>
@if (Auth::user()->profile)
                    <li class="nav-item @if($currentRouteName == 'backend.users.profiles') active @endif">
                        <a class="nav-link" href="{{ route('backend.users.profiles.show', [Auth::user()->profile->id]) }}" title="dane osobowe">profil @if($currentRouteName == 'backend.users.profiles')<span class="sr-only">(current)</span>@endif</a>
                    </li>
@if (Auth::user()->orders->count() > 0)
                    <li class="nav-item @if($currentRouteName == 'backend.users.orders') active @endif">
                        <a class="nav-link" href="{{ route('backend.users.orders.index') }}" title="zamówienia">zamówienia @if($currentRouteName == 'backend.users.orders')<span class="sr-only">(current)</span>@endif</a>
                    </li>
@endif
@endif
@can('viewAny', App\User::class)
                    <li class="nav-item @if($currentRouteName == 'backend.admins.index') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.index') }}" title="strona główna panelu administracyjnego">admin @if($currentRouteName == 'backend.admins.index')<span class="sr-only">(current)</span>@endif</a>
                    </li>
                    <li class="nav-item @if($currentRouteName == 'backend.admins.blogs') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.blogs.index') }}" title="blog">blog @if($currentRouteName == 'backend.admins.blogs')<span class="sr-only">(current)</span>@endif</a>
                    </li>
                    <li class="nav-item @if($currentRouteName == 'backend.admins.products') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.products.index.index') }}" title="produkty">produkty @if($currentRouteName == 'backend.admins.products')<span class="sr-only">(current)</span>@endif</a>
                    </li>
                    <li class="nav-item @if($currentRouteName == 'backend.admins.users') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.users.index') }}" title="osoby, które założyły konto">użytkownicy @if($currentRouteName == 'backend.admins.users')<span class="sr-only">(current)</span>@endif</a>
                    </li>
                    <li class="nav-item @if($currentRouteName == 'backend.admins.customers') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.customers.index') }}" title="osoby, które dokonały zakupów, ale nie założyły konta">klienci @if($currentRouteName == 'backend.admins.customers')<span class="sr-only">(current)</span>@endif</a>
                    </li>
                    <li class="nav-item @if($currentRouteName == 'backend.admins.orders') active @endif">
                        <a class="nav-link" href="{{ route('backend.admins.orders.index') }}" title="zamówienia">zamówienia @if($currentRouteName == 'backend.admins.orders')<span class="sr-only">(current)</span>@endif</a>
                    </li>
@endcan
                </ul>
@auth
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}" role="button" title="wylogowanie" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    wyloguj
                </a>
                <form id="logout-form" class="form-inline" action="{{ route('logout') }}" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
@else
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('frontend.login_register.index') }}" role="button" title="zaloguj się lub załóż konto">zaloguj</a>
@endauth
            </div>
        </nav>
