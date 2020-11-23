@extends('frontend.layouts.app')

@section('noindex')
<meta name="robots" content="noindex">
@endsection

@section('title', 'logowanie lub rejestracja')

@section('content')
            <div class="row mt-5">
                <div class="col-sm text-center">
                    <h2><a href="{{ route('login') }}" title="logowanie">zaloguj się <i class="fas fa-sign-in-alt"></i></a></h2>
                </div>
                <div class="col-sm text-center">
                    <h2><a href="{{ route('register') }}" title="rejestracja">zarejestruj się <i class="fas fa-user-plus"></i></a></h2>
                </div>
            </div>
@endsection
