    <footer class="border-t-[1px] border-gray-950 text-sm text-gray-700 mt-20 pt-1">
      &copy; {{ config('app.name') }} &mdash; 2023
      &mdash; Root name: {{ Route::currentRouteName() }}
      &mdash; Root action: {{ Route::currentRouteAction() }}
      &mdash; Laravel: {{ Illuminate\Foundation\Application::VERSION }}
      &mdash; PHP: {{ PHP_VERSION }}
    </footer>
