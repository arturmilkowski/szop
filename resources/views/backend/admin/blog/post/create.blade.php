<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dodawanie</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('backend.admins.blog.posts.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="slug">
                        <x-form-group>
                            <x-input-label for="title">Tytuł</x-input-label>
                            <x-text-input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Pole obowiązkowe" maxlength="255" required autofocus />
                            <x-input-error :messages="$errors->get('title')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="intro">Wstęp</x-input-label>
                            <x-textarea-input id="intro" name="intro" placeholder="Pole nieobowiązkowe">{{ old('intro') }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('intro')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="content">Treść</x-input-label>
                            <x-textarea-input id="content" name="content" placeholder="Pole nieobowiązkowe">{{ old('content') }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('content')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="img">Obrazek</x-input-label>
                            <input class="font-semibold text-xs text-white
                            file:mr-4 file:px-4 file:py-2 file:border-0
                            rounded-md shadow-sm  file:text-violet-700 file:bg-gray-200
                            hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150
                            hover:file:bg-amber-100 hover:file:cursor-pointer" type="file" id="img" name="img">
                            {{-- @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            <x-input-error :messages="$errors->get('img')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="site_description">Opis strony w sekcji nagłówkowej</x-input-label>
                            <x-text-input type="text" id="site_description" name="site_description" value="{{ old('site_description') }}" placeholder="Pole nieobowiązkowe" maxlength="255" />
                            <x-input-error :messages="$errors->get('site_description')" />
                        </x-form-group>
                        <x-form-group>
                            <x-input-label for="site_keyword">Opis strony w sekcji nagłówkowej</x-input-label>
                            <x-text-input type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword') }}" placeholder="Pole nieobowiązkowe" maxlength="255" />
                            <x-input-error :messages="$errors->get('site_keyword')" />
                        </x-form-group>
                        <x-form-group-form-check>
                                @if(old('approved'))
                                <x-checkbox-input id="approved" name="approved" value="1" checked />
                                @else
                                <x-checkbox-input id="approved" name="approved" value="1" />
                                @endif
                                <input-label-form-check for="approved">Zatwierdzony</input-label-form-check>
                        </x-form-group-form-check>
                        <x-form-group-form-check>
                            @if(old('published'))
                            <x-checkbox-input id="published" name="published" value="1" checked />
                            @else
                            <x-checkbox-input id="published" name="published" value="1" />
                            @endif
                            <input-label-form-check for="published">Opublikowany</input-label-form-check>
                        </x-form-group-form-check>
                        <x-form-group-form-check>
                            @if(old('comments_allowed'))
                            <x-checkbox-input id="comments_allowed" name="comments_allowed" value="1" checked />
                            @else
                            <x-checkbox-input id="comments_allowed" name="comments_allowed" value="1" />
                            @endif
                            <input-label-form-check for="comments_allowed">Komentarze dozwolone</input-label-form-check>
                        </x-form-group-form-check>
                        <x-primary-button>Dodaj</x-primary-button>
                    </form>
                    <p>
                        <x-link href="{{ route('backend.admins.blog.posts.index') }}">Powrót</x-link>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
