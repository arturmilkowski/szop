@extends('backend.layouts.app')

@section('title', 'dodawanie koncentracji produktu')

@section('content')
            @component('backend.components.header')
                dodawanie koncentracji produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.concentrations.store') }}" method="POST" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--
                        <div class="form-group">
                            <label for="category_id">kategoria</label>
                            <select class="form-control @error('category_id')is-invalid @enderror" id="category_id" name="category_id" required>
                                <option></option>
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
                        --}}
                        <div class="form-group">
                            <label for="name">nazwa</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <a class="btn btn-secondary" href="{{ route('backend.admins.products.concentrations.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
@endsection
