@extends('backend.layouts.app')

@section('title', 'koncentracja produktu')

@section('content')
            @component('backend.components.header')
                koncentracja produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $concentration->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">nazwa</th>
                                <td>{{ $concentration->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">przyjazny adres</th>
                                <td>{{ $concentration->slug }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.products.concentrations.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.products.concentrations.edit', [$concentration->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
