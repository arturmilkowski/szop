  <x-layout>
    <x-slot:title>Produkty</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    {{-- <h1>Produkty</h1> --}}
    <div class="grid gap-4 mt-20 grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
      @forelse ($products as $product)
              <div class="mx-2 mb-10 py-2 border-t-[1px] border-b-[1px] border-black">
                  <x-product :product="$product" />
              </div>
      @empty
          <p>Brak produktów</p>
      @endforelse
          </div>
    <a href="{{ route('pages.index') }}" title="Powrót do strony głównej">Powrót do strony głównej</a>
  </x-layout>
