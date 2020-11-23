@extends('backend.layouts.app')

@section('title', 'dodawanie typu produktu')

@section('content')
            @component('backend.components.header')
                dodawanie typu produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.types.store', [$product->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="product_id">produkt</label>
                            <select class="form-control @error('product_id')is-invalid @enderror" id="product_id" name="product_id" required>
@foreach ($products as $product_)
@if ( $product_->id == $product->id))
                                <option value="{{ $product_->id }}" selected>{{ $product_->name }}</option>
@else
                                <option value="{{ $product_->id }}">{{ $product_->name }}</option>
@endif
@endforeach
                            </select>
                            @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="size_id">rozmiar</label>
                            <select class="form-control @error('size_id')is-invalid @enderror" id="size_id" name="size_id" required>
@foreach ($sizes as $size_)
@if ( $size_->id == old('size_id')))
                                <option value="{{ $size_->id }}" selected>{{ $size_->name }}</option>
@else
                                <option value="{{ $size_->id }}">{{ $size_->name }}</option>
@endif
@endforeach
                            </select>
                            @error('size_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

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
                            <label for="price">cena [zł]</label>
                            <input class="form-control @error('price')is-invalid @enderror" type="text" id="price" name="price" value="{{ old('price') }}" {{-- min="1" max="9999.99" --}} {{-- step="1" --}} placeholder="pole obowiązkowe" required>
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="promo_price">cena promocyjna [zł]</label>
                            <input class="form-control @error('promo_price')is-invalid @enderror" type="text" id="promo_price" name="promo_price" value="@if(old('promo_price') != null){{ old('promo_price') }} @else 0.00 @endif" min="0" max="9999.99" {{-- step="1" --}} placeholder="pole obowiązkowe. ta cena musi być mniejsza niż zwykła, ale nie mniejsza od zera" required>
                            @error('promo_price')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="quantity">ilość [szt.]</label>
                            <input class="form-control @error('quantity')is-invalid @enderror" type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" min="0" max="255" step="1" placeholder="pole obowiązkowe" required>
                            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="hide" name="hide" value="1" @if(old('hide'))checked @endif>
                            <label class="form-check-label" for="hide">nie wyświetlaj</label>
                        </div>

                        <div class="form-group">
                            <label for="description">opis</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="pole nieobowiązkowe">{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="img">grafika</label>
                            <input class="form-control-file @error('img')is-invalid @enderror" type="file" id="img" name="img">
                            @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <a class="btn btn-secondary" href="{{ route('backend.admins.products.show', [$product->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
@endsection