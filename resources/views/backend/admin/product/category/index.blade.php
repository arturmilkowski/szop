@extends('backend.layouts.app')

@section('title', 'kategorie produktów')

@section('content')
            @component('backend.components.header')
                kategorie produktów
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.products.categories.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
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
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('backend.admins.products.categories.show', [$category->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="4">brak kategorii produktów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection