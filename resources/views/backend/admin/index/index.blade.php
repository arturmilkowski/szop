@extends('backend.layouts.app')

@section('title', 'admin')

@section('content')
            <div class="jumbotron">
                <h1 class="display-5">strona główna panelu administracyjnego</h1>
                <p class="lead">
                <a href="{{ route('backend.admins.cache.index') }}" title="czyści pamięć podręczną">wyczyść pamięć podręczną</a>
{{--
@if ($profile)
                                        <a href="{{ route('backend.admins.profiles.show', [$profile->id]) }}" title="profil">dane</a>
@else
                                        <a href="{{ route('backend.admins.profiles.create') }}" title="dodawanie profilu">możesz uzupełnić profil<a>
@endif
--}}
                </p>
                <hr class="my-4">
                {{--
                <p class="lead">
                    __
                    <a href="{{ route('backend.admin.profile.index') }}" title="profil">__</a>
                </p>
                <nav class="nav">
                    <a class="nav-link" href="{{ route('backend.admins.users.index') }}" title="użytkownicy">użytkownicy</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                </nav>
                --}}
            </div>
@endsection
