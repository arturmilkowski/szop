@extends('frontend.layouts.app')

@section('title', 'ciastka')
@section('description', 'ciastka (pliki cookie) używam tylko do logowania')
@section('keywords', 'cookie, ciastka, pliki cookie')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>ciastka</h1></div></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm text-justify">
                        plików typu ciastka, z angielskiego, cookie, używamy jedynie w celach bezpieczeństwa aplikacji.
                        lub gdy użytkownik, podczas logowania, zaznaczy, że chce żeby jego login i hasło zostało zapamiętane na jego komputerze.
                        takie logowanie jest wygodniejsze i właściwie tak samo bezpieczne jak wpisywanie loginu i hasła za każdym razem.
                        pliki ciastek są szyfrowane. złamanie szyfru, przekracza racjonalne nakłady czasu i sprzętu amatorskich hakerów.
                        a zawodowi, nie mają potrzeby włamywania się na strony, takie jak ta.
                        <br>
                        <strong>nie używamy ciastek do śledzenia użytkownika, wyświetlania reklam, zapisywania jego położenia lub w jakimkolwiek innym celu</strong>.
                        <br>
                        <a href="{{ route('frontend.pages.privacy_policy') }}" title="">polityka prywatności</a>.
                    </div>
                </div>
            </div>
@endsection
