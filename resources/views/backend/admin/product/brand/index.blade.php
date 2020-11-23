@extends('backend.layouts.app')

@section('title', 'producenci')

@section('content')
            @component('backend.components.header')
                producenci
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.products.brands.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
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
@forelse ($brands as $brand)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <a href="{{ route('backend.admins.products.brands.show', [$brand->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="4">brak producentów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
