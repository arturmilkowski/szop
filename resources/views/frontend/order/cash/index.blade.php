@extends('frontend.layouts.app')

@section('title', 'kasa')

@section('noindex')
<meta name="robots" content="noindex">
@endsection

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>kasa</h1></div></div>
            <div class="row">
                <div class="col-sm">
                    @include('frontend.includes.basket_no_edit')
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    dostawa: {{ $deliveryCost }} zł.
                    <strong>razem: {{ $totalPriceAndDeliveryCost }} zł<strong>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm">
                    <a class="btn btn-outline-secondary btn-block" href="{{ route('login') }}" title="logowanie">zaloguj się i kup <i class="fas fa-sign-in-alt"></i></a>
                </div>
                <div class="col-sm text-center">
                    <a class="btn btn-outline-secondary btn-block" href="{{ route('register') }}" title="zakładanie konta">załóż konto <i class="fas fa-user-plus"></i></a>
                </div>
                <div class="col-sm text-center">
                    <a class="btn btn-outline-secondary btn-block" href="{{ route('frontend.orders.without_registration.create') }}" title="zamawianie bez rejestracji">zamów bez rejestracji <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
@endsection
