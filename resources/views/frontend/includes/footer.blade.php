            <footer class="row">
                <div class="col-sm">
@if (App::environment() == 'local' || App::environment() == 'testing')
                        env: <strong>{{ App::environment() }}</strong> &bull;
                        action: <strong>{{ Route::currentRouteAction() }}</strong> &bull; route name: <strong>{{ Route::currentRouteName() }}</strong>
@auth
                        &bull; user: <strong>{{ Auth::user()->name }}</strong> &bull; uprawnienia: <strong>{{ Auth::user()->role->display_name }}</strong>
@endauth
@else
                        2020
                        &mdash;
                        {{ config('settings.company_name') }}
                        &mdash;
                        <a href="{{ route('frontend.pages.cookie') }}" title="informacje o plikach cookie">informacje o ciastkach</a>
                        &mdash;
                        <a href="{{ route('frontend.pages.privacy_policy') }}" title="polityka prywatności">polityka prywatności</a>
                        &mdash;
                        <a href="{{ route('frontend.pages.rodo') }}" title="prawa przysługujące z tytułu rodo">rodo</a>
@endif
                </div>
            </footer>
