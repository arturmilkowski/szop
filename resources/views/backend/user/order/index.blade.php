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
                                <th scope="col">status</th>
                                <th scope="col">kwota</th>
                                <th scope="col">data</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->number }}</td>
@if ($order->status)  {{-- bad test --}}
                                <td>{{ $order->status->display_name }}</td>
@else
                                <td>&mdash;</td>
@endif
                                <td>{{ $order->total_price }} zł</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('backend.users.orders.show', [$order->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
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
