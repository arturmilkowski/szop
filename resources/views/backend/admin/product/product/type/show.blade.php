@extends('backend.layouts.app')

@section('title', 'produkt')

@section('content')
            @component('backend.components.header')
                typ (rodzaj) produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $type->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">nazwa</th>
                                <td>{{ $type->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">rozmiar</th>
                                <td>{{ $type->size->name }} ({{ $type->size->display_name }})</td>
                            </tr>
                            <tr>
                                <th scope="row">cena</th>
                                <td>{{ $type->price }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">cena promocyjna</th>
                                <td>{{ $type->promo_price }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">ilość </th>
                                <td>{{ $type->quantity }} szt</td>
                            </tr>
                            <tr>
                                <th scope="row">widoczność produktu w sklepie</th>
                                <td>@if ($type->hide)<span class="badge badge-danger">nie pokazuj</span>@else <span class="badge badge-success">pokaż</span> @endif</td>
                            </tr>
                            <tr>
                                <th scope="row">opis</th>
                                <td>{{ $type->description }}</td>
                            </tr>
@if ($type->img)
                            <tr>
                                <th scope="row">grafika</th>
                                <td><img class="img-fluid" src="{{ asset('storage') . '/' . 'img/products/types' . '/' . $type->img }}" /></td>
                            </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.products.show', [$product->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.products.types.edit', [$product->id, $type->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
