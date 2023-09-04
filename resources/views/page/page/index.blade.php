  <x-layout>
    <x-slot:title>Strona główna</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    <h1>Strona główna</h1>    
@forelse ($products as $product)
    <div class="flex mt-20 border-t-[1px] border-b-[1px] border-black">
      <x-product :product="$product" />
    </div>
@empty
    <p>Brak produktów</p>
@endforelse
  </x-layout>
