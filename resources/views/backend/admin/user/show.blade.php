@extends('backend.layouts.app')

@section('title', 'użytkownik')

@section('content')
            @component('backend.components.header')
                użytkownik
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table{{--table-bordered--}}">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">imię</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">email</th>
                                <td>
                                    <a href="mailto:{{ $user->email }}" title="wysyła email">
                                        <i class="fas fa-paper-plane"></i> {{ $user->email }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">uprawnienia</th>
                                <td>{{ $user->role->display_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">rejestracja</th>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.users.index') }}" role="button" title="użytkownicy"><i class="fas fa-users"></i> użytkownicy</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.users.edit', [$user->id]) }}" role="button" title="edycja"><i class="fas fa-user-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
