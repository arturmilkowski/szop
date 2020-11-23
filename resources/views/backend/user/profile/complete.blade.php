@extends('backend.layouts.app')

@section('title', 'uzupełnij dane osobowe')

@section('content')
            <div class="jumbotron">
                <h1 class="display-5">
                    <a href="{{ route('backend.users.profiles.create') }}" title="profil">
                        uzupełnij dane osobowe
                    </a>
                </h1>
            </div>
@endsection
