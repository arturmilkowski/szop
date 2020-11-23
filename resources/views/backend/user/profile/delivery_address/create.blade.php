@extends('backend.layouts.app')

@section('title', 'dodawanie adresu dostawy')

@section('content')
            @component('backend.components.header')
                dodawanie adresu dostawy
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.users.profiles.delivery_addresses.store', [$profile->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="street">ulica i numer mieszkania</label>
                            <input class="form-control @error('street')is-invalid @enderror" type="text" id="street" name="street" value="{{ old('street') }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="zip_code">kod pocztowy</label>
                            <input class="form-control @error('zip_code')is-invalid @enderror" type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" pattern="^[0-9]{2}-[0-9]{3}$" size="6" placeholder="pole obowiązkowe" required>
                            @error('zip_code')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="city">miasto</label>
                            <input class="form-control @error('city')is-invalid @enderror" type="text" id="city" name="city" value="{{ old('city') }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="voivodeship_id">województwo</label>
                            <select class="form-control" id="voivodeship_id" name="voivodeship_id">
@foreach ($voivodeships as $voivodeship)
@if (old('voivodeship_id') == $voivodeship->id)
                                <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
@else
                                <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
@endif
@endforeach
                            </select>
                            @error('voivodeship_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> zapisz</button>
                    </form>                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary mt-2" href="{{ route('backend.users.profiles.show', [$profile->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                </div>
            </div>
@endsection
