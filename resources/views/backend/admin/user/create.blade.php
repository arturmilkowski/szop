@extends('backend.layouts.app')

@section('title', 'dodawanie użytkownika')

@section('content')
            @component('backend.components.header')
                dodawanie użytkownika
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.users.store') }}" method="POST" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="email">imię</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control @error('email')is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" minlength="5" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="password">hasło</label>
                            <input class="form-control @error('password')is-invalid @enderror" type="password" id="password" name="password" value="{{ old('password') }}" minlength="8" maxlength="255" placeholder="pole obowiązkowe" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <a class="btn btn-secondary" href="{{ route('backend.admins.users.index') }}" role="button" title="powrót"><i class="fas fa-users"></i> użytkownicy</a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
@endsection