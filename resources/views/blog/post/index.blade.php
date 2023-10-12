<x-layout>
    <x-slot:title>Blog</x-slot>
    <h1 class="mx-2">Blog</h1>
    <div class="grid grid-cols-4 gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
@forelse ($posts as $post)
      <div class="mx-2 py-2 border-t-[1px] border-b-[1px] border-black">
@if($post->img)
        <a href="{{ route('blog.posts.show', $post) }}">
          <img class="w-full hover:grayscale" src="{{ asset('storage/images/blog') . '/' . $post->img }}" alt="{{ $post->name }}">
        </a>
@endif
        <a href="{{ route('blog.posts.show', $post) }}">
          <h2 class="pt-4 pb-2">{{ $post->title }}</h2>
        </a>
        <h3>{{ $post->intro }}</h3>
        <div>{{ $post->created_at }}</div>
      </div>
@empty
      <p>Brak wpisów</p>
@endforelse
    </div>
</x-layout>
