@extends('backend.layouts.app')

@section('title', 'kategoria produktu')

@section('content')
            @component('backend.components.header')
                kategoria produktu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">nazwa</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">przyjazny adres</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.products.categories.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.products.categories.edit', [$category->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
