{{-- @if ($product->img)
      <div class="w-1/2">
            <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">
                  <img class="w-full" src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
            </a>
      </div>
@endif
      <div class="w-1/2">
            <h2 class="px-10 py-10 border-b-[1px] border-black text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl">
                  <a href="{{ route('products.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</a>
            </h2>
            <h3 class="px-10 py-10 border-b-[1px] border-black text-xs sm:text-sm md:text-base lg:text-lg">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
            <div class="px-10 py-10 border-b-[1px] border-black text-xs sm:text-sm md:text-sm lg:text-sm">{!! $product->description !!}</div>
            <div class="px-10 py-10 border-b-[1px] border-black">
                  <a class="pb-1 border-b-[1px] border-black hover:border-dotted text-xs sm:text-sm md:text-base lg:text-base" href="{{ route('products.show', $product) }}" title="{{ $product->name }}">Pokaż</a>
            </div>
      </div> --}}
      
      @if($product->img)
      <a class="hover:bg-black" href="{{ route('products.show', $product) }}">
            <img class="w-full" src="{{ asset('storage/images/products') . '/' . $product->img }}" alt="{{ $product->name }}">
      </a>
      @endif
      <h2 class="pt-4 pb-4 text-sm sm:text-sm md:text-base lg:text-lg xl:text-2xl 2xl:text-3xl">
            <x-link href="{{ route('products.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</x-link>
      </h2>
      <h3 class="mb-2 text-xs sm:text-xs md:text-sm lg:text-base xl:text-base 2xl:text-lg">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
      <h4 class="text-xs sm:text-xs md:text-sm lg:text-base xl:text-lg 2xl:text-xl">{!! $product->description !!}</h4>
      <div class="mt-4 mb-2">
            <a class="border-b-[1px] border-black hover:border-dotted text-xs sm:text-sm md:text-base lg:text-base" href="{{ route('products.show', $product) }}" title="{{ $product->name }}">Pokaż</a>
      </div>
      {{-- <div class="text-gray-500 text-xs">--</div> --}}
