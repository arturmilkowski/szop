@extends('backend.layouts.app')

@section('title', 'zamówienia')

@section('content')
            @component('backend.components.header')
                zamówienia
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">numer</th>
                                <th scope="col">data</th>
                                <th scope="col">status</th>
                                <th scope="col">kwota</th>
                                <th scope="col">liczba produktów</th>
                                <th scope="col">koszt dostawy</th>
                                <th scope="col">razem</th>
                                <th scope="col">dostawca</th>
                                <th scope="col" title="dokument sprzedaży">dokument</th>
                                <th scope="col">imię i nazwisko</th>                                
                                <th scope="col">email</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse($orders as $order)
                            <tr>
                                <th scope="row"><small>{{ $loop->iteration }}</small></th>
                                <td><small>{{ $order->id }}</small></td>
                                <td>{{ $order->number }}</td>
                                <td title="{{ $order->created_at }}">{{ $order->created_at->diffForHumans() }}</td>
@if ($order->status)  {{-- bad test --}}
                                <td><span class="badge {{ $order->status->name }}">{{ $order->status->display_name }}</span></td>
@else
                                <td>&mdash;</td>
@endif
                                <td>{{ $order->total_price }} zł</td>
                                <td>{{ $order->items->count() }}</td>
                                <td>{{ $order->delivery_cost }} zł</td>
                                <td>{{ $order->total_price_and_delivery_cost }} zł</td>
                                <td>{{ $order->delivery_name }} zł</td>
                                <td title="dokument sprzedaży">{{ $order->saleDocument->display_name }}</td>
                                <td>
                                    {{ $order->orderable['name'] }}
@if (is_a($order->orderable, 'App\Models\Customer'))
                                    {{ $order->orderable['lastname'] }}
@else
                                    {{ $order->orderable->profile->lastname }}
@if ($order->orderable->profile->deliveryAddress)
                                    <span class="badge badge-warning">inny adres dostawy</span>
@endif
@endif
@if ($order->comment)
                                    <span class="badge badge-warning">jest komentarz</span>
@endif
                                </td>
                                <td>
                                    <a href="mailto:{{ $order->orderable['email'] }}" title="wysyła email">
                                        <i class="fas fa-paper-plane"></i> {{ $order->orderable['email'] }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('backend.admins.orders.show', [$order->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="9">brak zamówień</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
