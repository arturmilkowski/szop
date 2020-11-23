@extends('backend.layouts.app')

@section('title', 'produkty')

@section('content')
            @component('backend.components.header')
                produkty
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.products.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped{{--table-bordered--}}{{--table-hover--}}">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">nazwa</th>
                                <th scope="col">opis</th>
                                <th scope="col">nie pokazuj</th>
                                <th scope="col">zdjęcie</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
@if ($product->description)
                                <td>{{ Str::limit($product->description, 60) }}</td>
@else
                                <td>&mdash;</td>
@endif
                                <td>@if ($product->hide)<span class="badge badge-danger">nie pokazuj</span>@else <span class="badge badge-success">pokaż</span> @endif</td>
@if ($product->img)
                                <td>
                                    <img class="img-thumbnail" width="200" src="{{ asset('storage') . '/' . 'img/products' . '/' . $product->img }}" />
                                </td>
@else
                                <td>&mdash;</td>
@endif
                                <td>
                                    <a href="{{ route('backend.admins.products.show', [$product->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="6">brak produktów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
