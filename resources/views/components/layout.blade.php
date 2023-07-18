<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite('resources/css/main.css')

  </head>
  <body>
    <x-nav />
    {{ $slot }}
    <x-footer />
  </body>
</html>
