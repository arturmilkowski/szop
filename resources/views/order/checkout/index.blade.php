<x-layout>
    <x-slot:title>Kasa</x-slot>
    <x-header-one>Kasa</x-header-one>
@if ($cart->itemsCount())
    <x-cart-no-edit :cart="$cart" />
@endif
    <main class="mx-2">
      <div>Dostawa: {{ $deliveryName }}</div>
      <div>Sposób: {{ $deliveryMethod }}</div>
      <div>Koszt: {{ $deliveryCost }} zł</div>
      <div>Koszt razem z dostwą: {{ $totalPriceAndDeliveryCost }}</div>
      <p class="flex gap-8 mt-6">
@guest
        <x-link href="{{ route('login') }}">Zaloguj się i kup</x-link>
        <x-link href="{{ route('register') }}">Załóż konto</x-link>
        <a href="{{ route('orders.without-registration.create') }}">Zamów bez rejestracji</a>
@endguest
@auth
        <a href="{{ route('orders.with-registration.create') }}">Zamów</a>
@endauth
      </p>
    </main>
</x-layout>