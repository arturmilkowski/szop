@extends('backend.layouts.app')

@section('title', 'edycja danych osobowych')

@section('content')
            @component('backend.components.header')
                edycja danych osobowych
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.users.profiles.update', [$profile->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">imię</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ $user->name }}" minlength="3" maxlength="255" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="lastname">nazwisko</label>
                            <input class="form-control @error('lastname')is-invalid @enderror" type="text" id="lastname" name="lastname" value="{{ $profile->lastname }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="street">ulica i numer mieszkania</label>
                            <input class="form-control @error('street')is-invalid @enderror" type="text" id="street" name="street" value="{{ $profile->street }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="zip_code">kod pocztowy</label>
                            <input class="form-control @error('zip_code')is-invalid @enderror" type="text" id="zip_code" name="zip_code" value="{{ $profile->zip_code }}" pattern="^[0-9]{2}-[0-9]{3}$" size="6" placeholder="pole obowiązkowe" required>
                            @error('zip_code')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="city">miasto</label>
                            <input class="form-control @error('city')is-invalid @enderror" type="text" id="city" name="city" value="{{ $profile->city }}" minlength="3" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="voivodeship_id">województwo</label>
                            <select class="form-control" id="voivodeship_id" name="voivodeship_id">
@foreach ($voivodeships as $voivodeship)
@if ( $profile->voivodeship_id == $voivodeship->id)
                                <option value="{{ $voivodeship->id }}" selected>{{ $voivodeship->name }}</option>
@else
                                <option value="{{ $voivodeship->id }}">{{ $voivodeship->name }}</option>
@endif
@endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control @error('email')is-invalid @enderror" type="email" id="email" name="email" value="{{ $user->email }}" minlength="5" maxlength="255" placeholder="pole obowiązkowe" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="phone">telefon</label>
                            <input class="form-control @error('phone')is-invalid @enderror" type="tel" id="phone" name="phone" value="{{ $profile->phone }}" sixe="9" placeholder="pole nieobowiązkowe" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                    <form action="{{ route('backend.users.profiles.destroy', [$profile->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger mt-2" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary mt-2" href="{{ route('backend.users.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                </div>
            </div>
@endsection
