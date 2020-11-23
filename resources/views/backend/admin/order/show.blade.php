@extends('backend.layouts.app')

@section('title', 'zamówienie')

@section('content')
            @component('backend.components.header')
                zamówienie
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">numer</th>
                                <th scope="col">status</th>
                                <th scope="col">kwota</th>
                                <th scope="col">data</th>
                                <th scope="col">użytkownik</th>
                                <th scope="col">adres</th>
                                <th scope="col">komentarz</th>
                                <th scope="col">edycja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->number }}</td>
                                <td>
                                    <order-status
                                        v-bind:orderid="{{ $order->id }}"
                                        v-bind:status="{{ $order->status }}"
                                        v-bind:statuses="{{ $statuses }}"
                                    >
                                    </order-status>
                                </td>  {{-- <span class="badge {{ $order->status->name }}">{{ $order->status->display_name }}</span> --}}
                                <td>{{ $order->total_price }} zł</td>
                                <td title="{{ $order->created_at }}">{{ $order->created_at->diffForHumans() }}</td>
                                <td>
                                    {{ $order->orderable->name }}
                                    {{-- dd($order->orderable) --}}
@if (is_a($order->orderable, 'App\Models\Customer'))
                                    {{ $order->orderable->lastname }}
@else
                                    {{ $order->orderable->profile->lastname }}
@endif
                                </td>
                                <td>
                                    <ul class="list-unstyled">
@if (is_a($order->orderable, 'App\Models\Customer'))
                                        <li>{{ $order->orderable->street }}</li>
                                        <li>{{ $order->orderable['zip_code'] }} {{ $order->orderable['city'] }}</li>
                                        <li> {{ $order->orderable['voivodeship']->name }}</li>
                                        <li>mail: {{ $order->orderable['email']  }}</li>
@if ($order->orderable['phone'])
                                        <li>tel: {{ $order->orderable['phone']  }}</li>
@endif
@else
                                        <li>{{ $order->orderable->profile->street }}</li>
                                        <li>{{ $order->orderable->profile->zip_code }} {{ $order->orderable->profile->city }}</li>
                                        <li> {{ $order->orderable->profile->voivodeship->name }}</li>
                                        <li>mail: {{ $order->orderable['email']  }}</li>
@if ($order->orderable->profile->phone)
                                        <li>tel: {{ $order->orderable->profile->phone }}</li>
@endif
@if ($order->orderable->profile->deliveryAddress)
                                        <li>&mdash;</li>
                                        <li><mark>adres dostawy:</li>
                                        <li>{{ $order->orderable->profile->deliveryAddress->street }}</li>
                                        <li>{{ $order->orderable->profile->deliveryAddress->zip_code }} {{ $order->orderable->profile->city }}</li>
                                        <li>{{ $order->orderable->profile->deliveryAddress->voivodeship->name }}</li>
@endif
                                    </ul>
@endif
                                </td>
@if ($order->comment)
                                <td><small>{{ $order->comment }}</small></td>
@else
                                <td>&mdash;</td>
@endif
                                <td><a href="{{ route('backend.admins.orders.edit', [$order->id]) }}" title="edycja"><i class="fas fa-edit"></i> edytuj</a></td>
                            </tr>
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
                                <th scope="col">typ</th>
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
                                <td><a href="{{ route('backend.admins.orders.prints.html', [$order->id, 'dokument' => 'rachunek']) }}" title=""><i class="fas fa-file-code"></i> ze strony www</a></td>
                                <td><a href="{{ route('backend.admins.orders.prints.pdf', [$order->id, 'dokument' => 'rachunek']) }}" title=""><i class="fas fa-file-pdf"></i> z pdf</a></td>
                                <td><a href="{{ route('backend.admins.orders.prints.html', [$order->id, 'dokument' => 'faktura']) }}" title=""><i class="fas fa-file-code"></i> ze strony www</a></td>
                                <td><a href="{{ route('backend.admins.orders.prints.pdf', [$order->id, 'dokument' => 'faktura']) }}" title=""><i class="fas fa-file-pdf"></i> z pdf</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.orders.index') }}" role="button" title="powrót do poprzeniej strony">
                        <i class="fas fa-arrow-left"></i> powrót
                    </a>
                </div>
            </div>
@endsection
