@extends('frontend.layouts.app')

@section('title', 'rodo')
@section('description', 'informacje o przestrzeganiu rodo')
@section('keywords', 'woda kolońska, woda toaletowa, perfumy, zapachy, perfumeria, perfumeria niszowa')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>rodo</h1></div></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        @include('frontend.includes.rodo')
                    </div>
                </div>
            </div>
@endsection
