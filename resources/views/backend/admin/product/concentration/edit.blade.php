@extends('backend.layouts.app')

@section('title', 'edycja koncentracji produktu')

@section('content')
            @component('backend.components.header')
                edycja koncentracji produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.concentrations.update', [$concentration->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--
                        <div class="form-group">
                            <label for="category_id">kategoria</label>
                            <select class="form-control @error('category_id')is-invalid @enderror" id="category_id" name="category_id" required>
@foreach ($categories as $category)
@if ($concentration->category_id == $category->id)
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
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ $concentration->name }}" maxlength="40" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>                        
                        <a class="btn btn-secondary" href="{{ route('backend.admins.products.concentrations.show', [$concentration->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                    
                    <form class="mt-2" action="{{ route('backend.admins.products.concentrations.destroy', [$concentration->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
@endsection