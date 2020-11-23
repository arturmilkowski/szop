@extends('backend.layouts.app')

@section('title', 'usuwanie koncentracji produktu')

@section('content')
            @component('backend.components.header')
                czy na pewno chcesz usunąć koncentrację produktu {{ $concentration->name }}?
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.products.concentrations.destroy', [$concentration->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-secondary" href="{{ route('backend.admins.products.concentrations.show', [$concentration->id]) }}" role="button"><i class="fas fa-angle-left"></i> nie</a>
                        <button type="submit" class="btn btn-danger" name="delete" value="Yes"><i class="fas fa-trash-alt"></i> tak</button>
                    </form>
                </div>
            </div>
@endsection
