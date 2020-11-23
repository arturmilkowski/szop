@extends('backend.layouts.app')

@section('title', 'produkt')

@section('content')
            @component('backend.components.header')
                produkt
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">producent</th>
@if ($product->brand)
                                <td>{{ $product->brand->name }}</td>
@else
                                <td>&mdash;</td>
@endif
                            </tr>
                            <tr>
                                <th scope="row">kategoria</th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">rodzaj</th>
                                <td>{{ $product->concentration->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">nazwa</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" title="przyjazny dla wyszukiwarek adres">przyjazny adres</th>
                                <td title="przyjazny dla wyszukiwarek adres">{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">opis</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th scope="row">widoczność produktu w sklepie</th>
                                <td>@if ($product->hide)<span class="badge badge-danger">nie pokazuj</span>@else <span class="badge badge-success">pokaż</span> @endif</td>
                            </tr>
@if ($product->img)
                            <tr>
                                <th scope="row">zdjęcie</th>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage') . '/' . 'img/products' . '/' . $product->img }}" />
                                </td>
                            </tr>
@endif
@if ($product->site_description)
                            <tr title="ważny dla pozycjonowania">
                                <th scope="row">opis w sekcji nagłówkowej strony</th>
                                <td>{{ $product->site_description }}</td>
                            </tr>
@endif
@if ($product->site_keyword)
                            <tr title="ważne dla pozycjonowania">
                                <th scope="row">słowa kluczowe w sekcji nagłówkowej strony</th>
                                <td>{{ $product->site_keyword }}</td>
                            </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.products.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.products.edit', [$product->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
            @component('backend.components.header')
                typy produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.products.types.create', [$product->id]) }}" role="button" title="dodawanie typu produktu">
                        <i class="fas fa-plus"></i> dodaj
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">nazwa</th>
                                <th scope="col">cena [zł]</th>
                                <th scope="col" title="cena promocyjna">cena promo [zł]</th>
                                <th scope="col">ilość</th>
                                <th scope="col">nie pokazuj</th>
                                <th scope="col">zdjęcie</th>
                                <th scope="col">edycja</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($product->types as $type)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>                            
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{ $type->price }}</td>
                                <td title="cena promocyjna">{{ $type->promo_price }}</td>
                                <td>{{ $type->quantity }}</td>
                                <td>@if ($type->hide)<span class="badge badge-danger">nie pokazuj</span>@else <span class="badge badge-success">pokaż</span> @endif</td>
@if ($type->img)
                                <td>
                                    <img class="img-thumbnail" src="{{ asset('storage/img/products/types') . '/' . $type->img }}" alt="" width="200" />
                                </td>
@else
                                <td>&mdash;</td>
@endif
                                <td>
                                    <a href="{{ route('backend.admins.products.types.show', [$product->id, $type->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="9">brak typów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.products.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                </div>
            </div>
@endsection
