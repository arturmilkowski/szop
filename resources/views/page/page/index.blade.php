  <x-layout>
    <x-slot:title>Strona główna</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    <h1>Strona główna</h1>    
@forelse ($products as $product)
    <div class="product">
      <x-product :product="$product" />
    </div>
@empty
    <p>Brak produktów</p>
@endforelse
  </x-layout>
