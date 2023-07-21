  <x-layout>
    <x-slot:title>{{ $product->name }}</x-slot>
@if ($cart->itemsCount())
    <x-cart :cart="$cart" />
@endif
    <h1>{{ $product->name }}</h1>
    <h2>{{ $product->category->name }} {{ $product->concentration->name }}</h2>
    <img src="{{ asset('storage/images/products') . '/' . $product->img }}" class="img" alt="{{ $product->name }}">
    <p>{!! $product->description !!}</p>
@forelse ($product->types as $type)
@if ($type->description)
    <p>{{ $type->description }}</p>
@endif
@if ($type->quantity > 0)
    <form action="{{ route('cart.store', [$type->id]) }}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit">Do koszyka</button>
    </form>
    @else
    <p>Brak w magazynie</p>
@endif
@empty
    <p>Brak produktów</p>
@endforelse
    <p>
      <a href="{{ route('pages.index') }}" title="Powrót do strony głównej">Powrót do strony głównej</a>
      |
      <a href="{{ route('products.index') }}" title="Powrót do strony produktów">Powrót do strony produktów</a>
    </p>
  </x-layout>
