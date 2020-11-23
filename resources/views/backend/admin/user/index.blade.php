@extends('backend.layouts.app')

@section('title', 'użytkownicy')

@section('content')
            @component('backend.components.header')
                użytkownicy
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.users.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped{{--table-bordered--}}{{--table-hover--}}">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">rejestracja</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                <a href="{{ route('backend.admins.users.show', [$user->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a>
                                </td>
                            </tr>
@empty
                            <tr>                                
                                <td class="table-warning" colspan="6">brak użytkowników</td>
                            </tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
