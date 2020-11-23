@extends('backend.layouts.app')

@section('title', 'klienci')

@section('content')
            @component('backend.components.header')
                klienci <small class="text-muted">osoby, które dokonały zakupów bez rejestracji</small>
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">imię i nazwisko</th>
                                <th scope="col">ulica i numer mieszkania</th>
                                <th scope="col">kod i miasto</th>
                                <th scope="col">województwo</th>
                                <th scope="col">mail</th>
                                <th scope="col">telefon</th>
                                <th scope="col">zamówienie</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }} {{ $customer->lastname }}</td>
                                <td>{{ $customer->street }}</td>
                                <td>{{ $customer->zip_code }} {{ $customer->city }}</td>
                                <td>{{ $customer->voivodeship->name }}</td>
                                <td>
                                    <a href="{{ $customer->email }}" title="wysyła email">
                                        <i class="fas fa-paper-plane"></i> {{ $customer->email }}
                                    </a>
                                </td>
                                <td>{{ $customer->phone }}</td>
@if ($customer->order)
                                <td><a href="{{ route('backend.admins.orders.show', [$customer->order->id]) }}" title="szczegóły">{{ $customer->order->status->display_name }}</a></td>
@else
                                <td>&mdash;</td>
@endif
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="9">brak klientów</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
