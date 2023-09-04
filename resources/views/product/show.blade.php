  <x-layout>
    <x-slot:title>{{ $product->name }}</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    @if($product->img)
    <img src="{{ asset('storage/images/products') . '/' . $product->img }}" class="img" alt="{{ $product->name }}">
    @endif
    <h1 class="px-2 py-16 border-b-[1px] border-gray-950">{{ $product->name }}</h1>
    <h2 class="px-2 py-16 border-b-[1px] border-gray-950">{{ $product->category->name }} {{ $product->concentration->name }}</h2>
    <div class="px-2 py-16 border-b-[1px] border-gray-950">{!! $product->description !!}</div>
    
    <div class="flex">
      @forelse ($product->types as $type)
      <div class="w-6/12">
        {{ $type }}
        @if($type->img)
        <img src="{{ asset('storage/images/products/types') . '/' . $type->img }}" class="img" alt="{{ $type->name }}">
        @endif
        <div>{{ $type->name }}</div>
        @if ($type->description)
        <div>{{ $type->description }}</div>
        @endif
        <div>{{ $type->price }} zł</div>
        @if ($type->quantity > 0)
        <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
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

    <p>
      <x-link href="{{ route('pages.index') }}" class="mr-4" title="Powrót do strony głównej">Powrót do strony głównej</x-link>
      <x-link href="{{ route('products.index') }}" title="Powrót do strony produktów">Powrót do strony produktów</x-link>
    </p>
  </x-layout>
