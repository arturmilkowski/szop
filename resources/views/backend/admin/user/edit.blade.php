@extends('backend.layouts.app')

@section('title', 'edycja')

@section('content')
            @component('backend.components.header')
                edycja
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.users.update', [$user->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="email">imię</label>
                            <input class="form-control @error('name')is-invalid @enderror" type="text" id="name" name="name" value="{{ $user->name }}" minlength="3" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control @error('email')is-invalid @enderror" type="email" id="email" name="email" value="{{ $user->email }}" minlength="5" maxlength="30" placeholder="pole obowiązkowe" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        {{--
                        <div class="form-group">
                            <label for="password">hasło</label>
                            <input class="form-control" type="password" id="password" name="password" value="{{ $user->password }}" minlength="" maxlength="" placeholder="pole obowiązkowe" required>
                        </div>
                        --}}
                        <a class="btn btn-secondary" href="{{ route('backend.admins.users.show', [$user->id]) }}" role="button" title="powrót"><i class="fas fa-user"></i> użytkownik</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                    <form action="{{ route('backend.admins.users.destroy', [$user->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
@endsection