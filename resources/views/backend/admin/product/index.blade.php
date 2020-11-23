@extends('backend.layouts.app')

@section('title', 'produkty')

@section('content')
            @component('backend.components.header')
            @endcomponent
            <div class="row text-center">
                <div class="col-sm">
                    <a href="{{ route('backend.admins.products.brands.index') }}" title="">producenci</a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('backend.admins.products.categories.index') }}" title="">kategorie</a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('backend.admins.products.concentrations.index') }}" title="">rodzaje</a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('backend.admins.products.index') }}" title="">produkty</a>
                </div>
            </div>
@endsection
