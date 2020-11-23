@extends('backend.layouts.app')

@section('title', 'adres dostawy')

@section('content')
            @component('backend.components.header')
                adres, na który będą dostarczane przesyłki
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">ulica i numer mieszkania</th>
                                <td>{{ $deliveryAddress->street }}</td>
                            </tr>
                            <tr>
                                <th scope="row">kod pocztowy i miato</th>
                                <td>{{ $deliveryAddress->zip_code }} {{ $deliveryAddress->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">województwo</th>
                                <td>{{ $deliveryAddress->voivodeship->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.users.profiles.show', [$profile->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.users.profiles.delivery_addresses.edit', [$profile->id, $deliveryAddress->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection