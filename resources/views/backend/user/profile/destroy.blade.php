@extends('backend.layouts.app')

@section('title', 'usuwanie profilu')

@section('content')
            @component('backend.components.header')
                czy na pewno chcesz usunąć profil?
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.users.profiles.destroy', [$profile->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-secondary" href="{{ route('backend.users.profiles.show', [$profile->id]) }}" role="button"><i class="fas fa-angle-left"></i> nie</a>
                        <button type="submit" class="btn btn-danger" name="delete" value="Yes"><i class="fas fa-trash-alt"></i> tak</button>
                    </form>
                </div>
            </div>
@endsection
