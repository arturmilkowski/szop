@extends('backend.layouts.app')

@section('title', 'edycja typu produktu')

@section('content')
            @component('backend.components.header')
                edycja typu (rodzaju) produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.types.update', [$product->id, $type->id]) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="product_id">produkt</label>
                            <select class="form-control @error('product_id')is-invalid @enderror" id="product_id" name="product_id" required>
@foreach ($products as $p)
@if ( $p->id == $type->product_id)
                                <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
@else
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
@endif
@endforeach
                            </select>
                            @error('product_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="name">nazwa</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ $type->name }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        {{--
                        <div class="form-group">
                            <label for="slug">przyjazny adres</label>
                            <input class="form-control @error('slug')is-invalid @enderror" type="text" id="slug" name="slug" value="{{ $type->slug }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        --}}
                        
                        <div class="form-group">
                            <label for="price">cena [zł]</label>
                            <input class="form-control @error('price')is-invalid @enderror" type="text" id="price" name="price" value="{{ $type->price }}" min="1" max="9999.99" {{-- step="1" --}} placeholder="pole obowiązkowe" required>
                            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="promo_price">cena promocyjna [zł]</label>
                            <input class="form-control @error('promo_price')is-invalid @enderror" type="text" id="promo_price" name="promo_price" value="{{ $type->promo_price }}" min="0.00" max="9999.99" {{-- step="1" --}} placeholder="pole obowiązkowe" required>
                            @error('promo_price')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="quantity">ilość [szt.]</label>
                            <input class="form-control @error('quantity')is-invalid @enderror" type="number" id="quantity" name="quantity" value="{{ $type->quantity }}" min="0" max="255" step="1" placeholder="pole obowiązkowe" required>
                            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="hide" name="hide" value="1" @if($type->hide)checked @endif>
                            <label class="form-check-label" for="hide">nie pokazuj typu <small class="text-muted">(pomimo, że jest w magazynie)</small></label>
                        </div>

                        <div class="form-group">
                            <label for="description">opis</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="pole nieobowiązkowe">{{ $type->description }}</textarea>
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
@if ($type->img)
                    <form class="mt-2" action="{{ route('backend.admins.products.types.destroy_img', [$product->id, $type->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="fas fa-image"></i> usuń grafikę</button>
                    </form>
@endif
                    <form class="mt-2" action="{{ route('backend.admins.products.types.destroy', [$product->id, $type->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
@endsection
