<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Wpisy</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-3">
                        <x-link href="{{ route('backend.admins.blog.posts.create') }}">Dodaj</x-link>
                    </p>
@if ($collection->count())
                    <table class="w-full">
                        <thead>
                            <tr>
                                <x-table-header>#</x-table-header>
                                <x-table-header>Obrazek</x-table-header>
                                <x-table-header>Tytuł</x-table-header>                                
                                <x-table-header>Utworzono</x-table-header>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($collection as $item)
                            <tr>                                
                                <x-table-data>{{ $item->id }}</x-table-data>
                                <x-table-data>
                                    @if ($item->img)
                                    <img width="100" src="{{ asset('storage/images/blog') . '/' . $item->img }}" alt="{{ $item->name }}">
                                    @endif
                                </x-table-data>                                
                                <x-table-data>
                                    <x-link href="{{ route('backend.admins.blog.posts.show', $item) }}">{{ $item->title }}</x-link>
                                </x-table-data>
                                <x-table-data>{{ $item->created_at->format("m.d.Y") }}</x-table-data>
                            </tr>
@endforeach
                        </tbody>
                    </table>
@else
                    <div>Brak danych</div>
@endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
