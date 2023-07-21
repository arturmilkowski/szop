  <x-layout>
    <x-slot:title>Produkty</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    <h1>Produkty</h1>
@forelse ($products as $product)
    <div class="product">
      <x-product :product="$product" />
    </div>
@empty
    <p>Brak produktów</p>
@endforelse
    <a href="{{ route('pages.index') }}" title="Powrót do strony głównej">Powrót do strony głównej</a>
  </x-layout>
