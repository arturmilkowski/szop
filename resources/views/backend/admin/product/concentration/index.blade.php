@extends('backend.layouts.app')

@section('title', 'kategorie produktów')

@section('content')
            @component('backend.components.header')
                koncentracja produktów
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.products.concentrations.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped{{--table-bordered--}}{{--table-hover--}}">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                {{--<th scope="col">kategoria</th>--}}
                                <th scope="col">nazwa</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($concentrations as $concentration)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $concentration->id }}</td>
                                {{--<td>{{ $concentration->category }}</td>--}}
                                <td>{{ $concentration->name }}</td>
                                <td>
                                    <a href="{{ route('backend.admins.products.concentrations.show', [$concentration->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="4">brak koncentracji produktów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
