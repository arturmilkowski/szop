@extends('backend.layouts.app')

@section('title', 'usuwanie adresu dostawy')

@section('content')
            @component('backend.components.header')
                czy na pewno chcesz usunąć adres dostawy?
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.users.profiles.delivery_addresses.destroy', [$profile->id, $deliveryAddress->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-secondary" href="{{ route('backend.users.profiles.delivery_addresses.show', [$profile->id, $deliveryAddress->id]) }}" role="button"><i class="fas fa-angle-left"></i> nie</a>
                        <button type="submit" class="btn btn-danger" name="delete" value="Yes"><i class="fas fa-trash-alt"></i> tak</button>
                    </form>
                </div>
            </div>
@endsection
