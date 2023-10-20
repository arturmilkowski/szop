<x-layout>
    <x-slot:title>{{ $post->title }}</x-slot>
    <h1 class="mx-2 mt-20 mb-10 pt-4 border-t-[1px] border-black text-base sm:text-base md:text-lg lg:text-xl xl:text-2xl 2xl:text-3xl">{{ $post->title }}</h1>
@if($post->img)
    <img class="mx-2" src="{{ asset('storage/images/blog') . '/' . $post->img }}" alt="{{ $post->name }}">
@endif
    <div class="mx-2 pt-4 text-sm sm:text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl">{{ $post->content }}</div>
    {{-- <div class="mx-2">{{ $post }}</div> --}}
    <div class="mx-2 py-2 text-gray-500 text-xs border-b-[1px] border-black">{{ $post->created_at }}</div>
    <p class="flex gap-4 mx-2 mt-8">
        <x-link href="{{ route('pages.index') }}">Strona główna</x-link>
        <x-link href="{{ route('blog.posts.index') }}">Blog strona główna</x-link>
    </p>
</x-layout>
