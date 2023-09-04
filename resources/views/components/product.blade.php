@if ($product->img)
      <div class="w-6/12">
            <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">
                  <img class="w-full" src="{{ asset('storage/images/products') . '/' . $product->img }}" class="img" alt="{{ $product->name }}">
            </a>
      </div>
@endif
      <div class="w-6/12 border-gray-950 border-l-[1px]">
            <h2 class="px-10 py-16 border-b-[1px] border-gray-950">
                  <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</a>
            </h2>
            <h3 class="px-10 py-16 border-b-[1px] border-gray-950">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
            <div class="px-10 py-16 border-b-[1px] border-gray-950">{!! $product->description !!}</div>
            <div class="px-10 py-16">
                  <a class="border-b-[1px] border-gray-950 pb-1 hover:border-dotted" href="{{ route('products.show', $product) }}" title="{{ $product->name }}">Pokaż</a>
            </div>
      </div>
