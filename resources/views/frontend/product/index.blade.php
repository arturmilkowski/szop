@extends('frontend.layouts.app')

@section('title', 'produkty')
@section('description', 'produkty')
@section('keywords', 'naturalne wody kolońskie, naturalne wody toaletowe, naturalne perfumy')

@section('content')
@isset($basket)
            @include('frontend.includes.basket')

@endisset
@if ($products->count() > 0)
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>produkty</h1></div></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
@foreach ($products as $product)
                <div class="col">
                <div class="card border-light">
                    <a href="{{ route('frontend.product.show', $product) }}" title="{{ $product->name }}"><img src="{{ asset(config('settings.storage.products_storage_path')) . '/' . $product->img }}" class="card-img-top" alt="{{ $product->name }}"></a>
                    <div class="card-body">
                        <h2 class="card-title"><a href="{{ route('frontend.product.show', $product) }}" title="{{ $product->name }}">{{ $product->name }}</a></h2>
                        <h3 class="card-text">{{ $product->category->name }} {{ $product->concentration->name }}</h3>
                        <p class="card-text"><span class="text-muted">{!! $product->description !!}</span></p>
                        <p class="card-text"><span class="text-muted"><a href="{{ route('frontend.product.show', $product) }}" title="{{ $product->name }}">pokaż <i class="fas fa-angle-right"></i></a></span></p>
                    </div>
                </div>
                </div>
@endforeach
            </div>
@else
            <h2 class="col text-center">brak produktów</h2>
@endif
@endsection
