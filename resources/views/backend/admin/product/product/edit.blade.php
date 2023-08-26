<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Edycja</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('backend.admins.products.products.update', $item) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('patch')
                        <input type="hidden" name="slug">
                        <div class="form-group">
                            <label for="brand_id">Producent</label>
                            <select id="brand_id" name="brand_id">
@foreach ($brands as $brand)
@if ( old('brand_id', $item->brand_id) == $brand->id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
@else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
@endif
@endforeach
                            </select>
                            <x-input-error :messages="$errors->get('brand_id')" />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategoria</label>
                            <select id="category_id" name="category_id">
@foreach ($categories as $category)
@if ( old('category_id', $item->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
@else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
@endif
@endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" />
                        </div>
                        <div class="form-group">
                            <label for="concentration_id">Koncentracja</label>
                            <select id="concentration_id" name="concentration_id">
@foreach ($concentrations as $concentration)
@if ( old('concentration_id', $item->concentration_id) == $concentration->id)
                                <option value="{{ $concentration->id }}" selected>{{ $concentration->name }}</option>
@else
                                <option value="{{ $concentration->id }}">{{ $concentration->name }}</option>
@endif
@endforeach
                            </select>
                            <x-input-error :messages="$errors->get('concentration_id')" />
                        </div>
                        <div>
                            <label for="name">Nazwa</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="Pole obowiązkowe" required autofocus>
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <label for="description">Opis</label>
                            <textarea id="description" name="description" placeholder="Pole nieobowiązkowe">{{ old('description', $item->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" />
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="hide" name="hide" value="1" @if(old('hide', $item->hide))checked @endif>
                            <label class="form-check-label" for="hide">Nie wyświetlaj</label>
                        </div>
                        <div class="form-group">
                            <label for="img">Obrazek</label>
                            <input class="form-control-file @error('img')is-invalid @enderror" type="file" id="img" name="img">
                            {{-- @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
                            <x-input-error :messages="$errors->get('img')" />
                        </div>
                        <div>
                            <label for="site_description">Opis w sekcji nagłówkowej</label>
                            <input type="text" id="site_description" name="site_description" value="{{ old('site_description', $item->site_description) }}" placeholder="Pole nieobowiązkowe">
                            <x-input-error :messages="$errors->get('site_description')" />
                        </div>
                        <div>
                            <label for="site_keyword">Słowa kluczowe w sekcji nagłówkowej</label>
                            <input type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword', $item->site_keyword) }}" placeholder="Pole nieobowiązkowe">
                            <x-input-error :messages="$errors->get('site_keyword')" />
                        </div>
                        <x-primary-button>Edytuj</x-primary-button>
                    </form>
                    <form action="{{ route('backend.admins.products.products.destroy', $item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <x-primary-button :href="route('backend.admins.products.products.destroy', $item)" onclick="event.preventDefault(); this.closest('form').submit();">
                            Usuń
                        </x-primary-button>
                    </form>
                    <p>
                        <a href="{{ route('backend.admins.products.products.index') }}">Powrót</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
