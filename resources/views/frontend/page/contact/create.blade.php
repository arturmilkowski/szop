@extends('frontend.layouts.app')

@section('title', 'kontakt')
@section('description', 'możesz się ze mną skontaktować')
@section('keywords', 'woda kolońska, męska woda kolońska, lawendowa woda kolońska, perfumy, perumeria niszowa, drogeria, nowa sól')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>kontakt</h1></div></div>
            <div class="row mb-5">
                <div class="col-sm">
                    <form action="{{ route('frontend.pages.contacts.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="subject">tytuł</label>
                            <input name="subject" value="{{ old('subject') }}" type="text" class="form-control @error('subject')is-invalid @enderror" id="subject" aria-describedby="subjectHelp" placeholder="pole obowiązkowe" minlength="3" maxlength="160" required>
                            <small id="subjectHelp" class="form-text text-muted">tytuł</small>
@error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group">
                            <label for="content">treść</label>
                            <textarea name="content" class="form-control @error('content')is-invalid @enderror" id="content" aria-describedby="contentHelp" rows="3" placeholder="pole obowiązkowe" maxlength="1000" required>{{ old('content') }}</textarea>
                            <small id="contentHelp" class="form-text text-muted">treść</small>
@error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email')is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="pole obowiązkowe" minlength="5" maxlength="30" required>
                            <small id="emailHelp" class="form-text text-muted">adres tylko do mojej wiadomości. nie wysyłam maili reklamowych</small>
@error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
@enderror
                        </div>
                        <div class="form-check unwanted">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="unwanted">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">wyślij <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="col-sm mt-3 px-lg-5">
                    <address {{--class="pl-5"--}}>
                        <strong>{{ config('settings.company_name') }}</strong>
                        <br>
                        {{ config('settings.company_address.street') }}
                        <br>
                        {{ config('settings.company_address.zip_code') }} {{ config('settings.company_address.city') }}
                        <br>
                        {{ config('settings.company_address.voivodeship') }}
                        <br>
                        <i class="fas fa-mobile"></i> {{ config('settings.company_address.phone') }}
                    </address>
                </div>
            </div>
@endsection
