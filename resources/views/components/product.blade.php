      <h2><a href="{{-- route('products.show', $product) --}}" title="{{ $product->name }}">{{ $product->name }}</a></h2>
      <h3>{{ $product->category->name }} {{ $product->concentration->name }}</h3>
@if ($product->img)
      <a href="{{-- route('products.show', $product) --}}" title="{{ $product->name }}">
        <img src="{{ asset('storage/images/products') . '/' . $product->img }}" class="img" alt="{{ $product->name }}">
      </a>
@endif
      <p>{!! $product->description !!}</p>
