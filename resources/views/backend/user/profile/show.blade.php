@extends('backend.layouts.app')

@section('title', 'profile')

@section('content')
            @component('backend.components.header')
                dane osobowe
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">imię</th>
                                <td>{{ $user->name }}</td>
                            </tr>
@if ($profile)
                            <tr>
                                <th scope="row">nazwisko</th>
                                <td>{{ $user->profile->lastname }}</td>
                            </tr>
@endif
                            <tr>
                                <th scope="row">uprawnienia</th>
                                <td>{{ $user->role->display_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">email</th>
                                <td>
                                    <a href="mailto:{{ $user->email }}" title="wysyła email">
                                        <i class="fas fa-paper-plane"></i> {{ $user->email }}
                                    </a>
                                </td>
                            </tr>
@if ($profile)
                            <tr>
                                <th scope="row">telefon</th>
                                <td>{{ $user->profile->phone }}</td>
                            </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
@if ($profile)
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">ulica i numer mieszkania</th>
                                <td>{{ $user->profile->street }}</td>
                            </tr>
                            <tr>
                                <th scope="row">kod</th>
                                <td>{{ $user->profile->zip_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">miasto</th>
                                <td>{{ $user->profile->city }}</td>
                            </tr>
                            <tr>
                                <th scope="row">województwo</th>
                                <td>{{ $user->profile->voivodeship->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endif
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.users.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.users.profiles.edit', [$profile->id]) }}" role="button" title="edycja"><i class="fas fa-user-edit"></i> edytuj</a>
                    <a class="btn btn-primary" href="{{ route('backend.users.profiles.password.edit', [$profile->id]) }}" role="button" title="zmiena hasła"><i class="fas fa-key"></i> zmień hasło</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
@if ($user->profile->deliveryAddress)
                    <a href="{{ route('backend.users.profiles.delivery_addresses.show', [$user->profile->id, $user->profile->deliveryAddress->id]) }}" class="btn btn btn-outline-secondary mt-2" role="button" title="szczegóły">
                        pokaż adres dostawy
                    </a>
@else
                    <a href="{{ route('backend.users.profiles.delivery_addresses.create', [$user->profile->id]) }}" class="btn btn btn-outline-secondary mt-2" role="button" title="tworzenie adresu dla dostaw">
                        dostawa na inny adres
                    </a>
@endif
                    <p class="lead mt-2">
@if ($hasBasket)
                        <a href="{{ route('frontend.orders.cash.index') }}" title=""><i class="fas fa-cash-register"></i> przejdź do kasy</a>
@endif
                    </p>
                </div>
            </div>
@endsection
