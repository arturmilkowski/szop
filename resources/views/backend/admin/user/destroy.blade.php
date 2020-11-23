@extends('backend.layouts.app')

@section('title', 'usuwanie użytkownika')

@section('content')
            @component('backend.components.header')
                czy na pewno chcesz usunąć użytkownika {{ $user->name }} @if ($user->profile) {{ $user->profile->lastname }}@endif?
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.users.destroy', [$user->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-secondary" href="{{ route('backend.admins.users.show', [$user->id]) }}" role="button"><i class="fas fa-angle-left"></i> nie</a>
                        <button type="submit" class="btn btn-danger" name="delete" value="Yes"><i class="fas fa-trash-alt"></i> tak</button>
                    </form>
                </div>
            </div>
@endsection
