    <footer class="border-t-[1px] border-gray-950 text-gray-700 mt-20 pt-1 text-xs sm:text-sm md:text-sm lg:text-base xl:text-base 2xl:text-2xl">
      &copy; {{ config('app.name') }} &mdash; 2023
      &mdash; Root name: {{ Route::currentRouteName() }}
      &mdash; Root action: {{ Route::currentRouteAction() }}
      @auth
      &mdash;
      Zalogowany: {{ Auth::user()->name }} {{ Auth::user()->profile?->surname }}
      @endauth
      &mdash; Laravel: {{ Illuminate\Foundation\Application::VERSION }}
      &mdash; PHP: {{ PHP_VERSION }}
    </footer>
