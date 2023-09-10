<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Wpis</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <x-table-data>#</x-table-data>                                
                                <x-table-data>{{ $item->id }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Dodał</x-table-data>                                
                                <x-table-data>{{ $item->user->name }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Przyjazny adres</x-table-data>                                
                                <x-table-data>{{ $item->slug }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Tytuł</x-table-data>                                
                                <x-table-data>{{ $item->title }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Wstęp</x-table-data>                                
                                <x-table-data>{{ $item->intro }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Zawartość</x-table-data>                                
                                <x-table-data>{{ $item->content }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Obrazek</x-table-data>                                
                                <x-table-data>
                                    @if ($item->img)
                                    <a href="{{ route('backend.admins.blog.posts.images.show', $item) }}">
                                        <img width="200" src="{{ asset('storage/images/blog') . '/' . $item->img }}" alt="{{ $item->name }}">
                                    </a>
                                    <form action="{{ route('backend.admins.blog.posts.images.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button class="mt-1" :href="route('backend.admins.blog.posts.images.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Usuń
                                        </x-danger-button>
                                    </form>
                                    @endif
                                </x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Opis w sekcji nagłówkowej strony</x-table-data>                                
                                <x-table-data>{{ $item->site_description }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Słowa kluczowe w sekcji nagłówkowej strony</x-table-data>                                
                                <x-table-data>{{ $item->site_keyword }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Zatwierdzony</x-table-data>                                
                                <x-table-data>{{ $item->approved }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Opublikowany</x-table-data>                                
                                <x-table-data>{{ $item->published }}</x-table-data>
                            </tr>
                            <tr>
                                <x-table-data>Komentarze dozwolone</x-table-data>                                
                                <x-table-data>{{ $item->comments_allowed }}</x-table-data>
                            </tr>
                        </tbody>
                    </table>
                    <x-btn-group>
                        <x-link href="{{ route('backend.admins.blog.posts.index') }}">Powrót</x-link>                        
                        <x-link href="{{ route('backend.admins.blog.posts.edit', $item) }}">Edytuj</x-link>
                    </x-btn-group>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>