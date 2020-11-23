@extends('backend.layouts.app')

@section('title', 'zamówienie')

@section('content')
            @component('backend.components.header')
                zamówienie
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">numer</th>
                                <td>{{ $order->number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">kwota</th>
                                <td>{{ $order->total_price }} zł</td>
                            </tr>
                            <tr>
                                <th scope="row">status</th>
                                <td>{{ $order->status->display_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">data</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
@if ($order->comment)
                            <tr>
                                <th scope="row">komentarz</th>
                                <td>{{ $order->comment }}</td>
                            </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
            @component('backend.components.header')
                zamówione produkty
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id zamówienia</th>
                                <th scope="col">#</th>
                                <th scope="col">nazwa</th>
                                <th scope="col">kategoria</th>
                                <th scope="col">koncentracja</th>
                                <th scope="col">pojemność</th>
                                <th scope="col">cena</th>
                                <th scope="col">ilość</th>
                                <th scope="col">razem</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($order->items as $orderItem)
                            <tr>
                                <th scope="row">{{ $orderItem->order_id }}</th>
                                <td>{{ $orderItem->id }}</td>
                                <td>{{ $orderItem->name }}</td>
                                <td>{{ $orderItem->category }}</td>
                                <td>{{ $orderItem->concentration }}</td>
                                <td>{{ $orderItem->type_name }}</td>
                                <td>{{ $orderItem->price }} zł</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ $orderItem->subtotal_price }} zł</td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            @component('backend.components.header')
                drukowanie
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">rachunek</th>
                                <th scope="col">rachunek</th>
                                <th scope="col">faktura</th>
                                <th scope="col">faktura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a class="nav-link" href="{{ route('backend.users.orders.prints.html', [$order->id, 'dokument' => 'rachunek']) }}" title=""><i class="fas fa-file-code"></i> ze strony www</a></td>
                                <td><a class="nav-link" href="{{ route('backend.users.orders.prints.pdf', [$order->id, 'dokument' => 'rachunek']) }}" title=""><i class="fas fa-file-pdf"></i> pdf</a></td>
                                <td><a class="nav-link" href="{{ route('backend.users.orders.prints.html', [$order->id, 'dokument' => 'faktura']) }}" title=""><i class="fas fa-file-code"></i> ze strony www</a></td>
                                <td><a class="nav-link" href="{{ route('backend.users.orders.prints.pdf', [$order->id, 'dokument' => 'faktura']) }}" title=""><i class="fas fa-file-pdf"></i> pdf</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.users.orders.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                </div>
            </div>
@endsection
