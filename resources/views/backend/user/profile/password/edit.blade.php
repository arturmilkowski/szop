@extends('backend.layouts.app')

@section('title', 'zmiana hasła')

@section('content')
            @component('backend.components.header')
                zmiana hasła
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.users.profiles.password.update', [$profile->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="old-password">stare hasło</label>
                            <input class="form-control @error('old-password')is-invalid @enderror" type="password" id="old-password" name="old-password" {{--value="{{ $profile->password }}"--}} minlength="8" {{--maxlength="30"--}} placeholder="pole obowiązkowe" required>
                            @error('old-password')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="password">nowe hasło</label>
                            <input class="form-control @error('password')is-invalid @enderror" type="password" id="password" name="password" value="{{ $profile->password }}" minlength="8" {{--maxlength="30"--}} placeholder="pole obowiązkowe" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="password-confirm">powtórz nowe hasło</label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="pole obowiązkowe" required>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary mt-2" href="{{ route('backend.users.profiles.show', [$profile->id]) }}" role="button" title="anuluj">
                        <i class="fas fa-arrow-left"></i> anuluj
                    </a>
                </div>
            </div>
@endsection
