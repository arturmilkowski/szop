@extends('backend.layouts.app')

@section('title', 'dodawanie produktu')

@section('content')
            @component('backend.components.header')
                dodawanie produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            <label for="brand_id">producent</label>
                            <select class="form-control @error('brand_id')is-invalid @enderror" id="brand_id" name="brand_id">
                                <option value="">nie wypełniaj</option>
@foreach ($brands as $brand)
@if ( old('brand_id') == $brand->id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
@else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
@endif
@endforeach
                            </select>
                            @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="category_id">kategoria</label>
                            <select class="form-control @error('category_id')is-invalid @enderror" id="category_id" name="category_id" required>
@foreach ($categories as $category)
@if ( old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
@else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
@endif
@endforeach
                            </select>
                            @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="concentration_id">rodzaj</label>
                            <select class="form-control @error('concentration_id')is-invalid @enderror" id="category_id" name="concentration_id" required>
@foreach ($concentrations as $concentration)
@if ( old('concentration_id') == $concentration->id)
                                <option value="{{ $concentration->id }}" selected>{{ $concentration->name }}</option>
@else
                                <option value="{{ $concentration->id }}">{{ $concentration->name }}</option>
@endif
@endforeach
                            </select>
                            @error('concentration_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="name">nazwa</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        {{--
                        <div class="form-group">
                            <label for="slug">przyjazny adres</label>
                            <input class="form-control @error('slug')is-invalid @enderror" type="text" id="slug" name="slug" value="{{ old('slug') }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        --}}

                        <div class="form-group">
                            <label for="description">opis</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="pole nieobowiązkowe">{{ old('escription') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="hide" name="hide" value="1" @if(old('hide'))checked @endif>
                            <label class="form-check-label" for="hide">nie wyświetlaj</label>
                        </div>

                        <div class="form-group">
                            <label for="img">obrazek</label>
                            <input class="form-control-file @error('img')is-invalid @enderror" type="file" id="img" name="img">
                            @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="site_description">opis w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_description')is-invalid @enderror" type="text" id="site_description" name="site_description" value="{{ old('site_description') }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="site_keyword">słowa kluczowe w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_keyword')is-invalid @enderror" type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword') }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        
                        <a class="btn btn-secondary" href="{{ route('backend.admins.products.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
@endsection
