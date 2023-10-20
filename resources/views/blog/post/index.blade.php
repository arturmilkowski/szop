<x-layout>
    <x-slot:title>Blog</x-slot>
    <h1 class="mx-2 mt-20 mb-8">Blog</h1>
    <div class="grid gap-4 grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
@forelse ($posts as $post)
      <div class="mx-2 mb-10 py-2 border-t-[1px] border-b-[1px] border-black">
@if($post->img)
        <a class="hover:bg-black" href="{{ route('blog.posts.show', $post) }}">
          <img class="w-full hover:opacity-0 hover:bg-black" src="{{ asset('storage/images/blog') . '/' . $post->img }}" alt="{{ $post->name }}">
        </a>
@endif
        <h2 class="pt-4 pb-4 text-sm sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl">
          <x-link href="{{ route('blog.posts.show', $post) }}">
            {{ $post->title }}
          </x-link>
        </h2>
        <h3 class="mb-2 text-xs sm:text-xs md:text-sm lg:text-base xl:text-base 2xl:text-lg">{{ $post->intro }}</h3>
        <div class="text-gray-500 text-xs">{{ $post->created_at }}</div>
      </div>
@empty
      <p>Brak wpisów</p>
@endforelse
    </div>
</x-layout>
