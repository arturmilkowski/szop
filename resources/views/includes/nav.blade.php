            <div class="row">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">{{ config('app.name', 'szop') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">logowanie</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('password.request') }}">zapomniałem hasła</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">zakładanie konta</a></li>
                </ul>
            </div>
