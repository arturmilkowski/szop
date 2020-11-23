@extends('backend.layouts.app')

@section('title', 'edycja statusu zamówienia')

@section('content')
            @component('backend.components.header')
                edycja statusu zamówienia
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">id</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">numer</th>
                                <td>{{ $order->number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">typ zamawiającego</th>
                                <td>{{ $order->orderable_type }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('backend.admins.orders.update', [$order->id]) }}" method="POST" novalidate>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="status_id"><strong>status</strong></label>
                    <select class="form-control" id="status_id" name="status_id" required>
@foreach ($statuses as $status)
@if ( $order->status_id == $status->id)
                    <option value="{{ $status->id }}" selected>{{ $status->display_name }}</option>
@else
                    <option value="{{ $status->id }}">{{ $status->display_name }}</option>
@endif
@endforeach
                    </select>
                </div>
                <a class="btn btn-secondary" href="{{ route('backend.admins.orders.show', [$order->id]) }}" role="button" title="powrót do poprzeniej strony">
                    <i class="fas fa-arrow-left"></i> anuluj
                </a>
                <button type="submit" class="btn btn-primary">wyślij</button>
            </form>
@endsection
