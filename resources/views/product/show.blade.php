  <x-layout>
    <x-slot:title>{{ $product->name }}</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    @if($product->img)
    <img class="my-20 border-t-[1px] border-b-[1px] border-black" src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
    @endif
    <div class="flex items-stretch mx-2 mt-12 gap-8">
      <div class="w-1/2 border-t-[1px] border-black pt-4">
        <h1 class="text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl">{{ $product->name }}</h1>
        <h2 class="text-xs sm:text-sm md:text-base lg:text-lg">{{ $product->category->name }} {{ $product->concentration->name }}</h2>
      </div>
      <div class="w-1/2 border-t-[1px] border-black pt-4">
        <div class="text-xs sm:text-sm md:text-sm lg:text-sm">{!! $product->description !!}</div>
      </div>
    </div>
    <div class="flex mx-2 mt-12 gap-8">
      @forelse ($product->types as $type)
      <div class="w-1/2 border-t-[1px] border-black pt-4">
        {{-- $type --}}
        @if($type->img)
        {{-- <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" alt="{{ $type->name }}"> --}}
        @endif
        <div class="text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl">{{ $type->name }}</div>
        @if ($type->description)
        <div class="text-xs sm:text-sm md:text-sm lg:text-sm"">{{ $type->description }}</div>
        @endif
        <div class="text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl">{{ $type->price }} zł</div>
        @if ($type->quantity > 0)
        <form class="mt-4" action="{{ route('cart.store', [$type->id]) }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <x-btn>Do koszyka</x-btn>
        </form>
        @else
        <p>Brak w magazynie</p>
@endif
      </div>
      @empty
      <p>Brak produktów</p>
      @endforelse
    </div>

    <p class="flex gap-x-4 mx-2 pt-24">
      <x-link href="{{ route('pages.index') }}" title="Powrót do strony głównej">Powrót do strony głównej</x-link>
      <x-link href="{{ route('products.index') }}" title="Powrót do strony produktów">Powrót do strony produktów</x-link>
    </p>
  </x-layout>
