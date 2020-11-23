@extends('backend.layouts.app')

@section('title', 'konto')

@section('content')
            <div class="jumbotron">
                <h1 class="display-5">strona główna konta</h1>
                <p class="lead">
@if ($hasBasket)
                    <a href="{{ route('frontend.orders.cash.index') }}" title=""><i class="fas fa-cash-register"></i> przejdź do kasy</a>
@endif
                </p>
            </div>
@endsection
