@extends('backend.layouts.app')

@section('title', 'tagi')

@section('content')
            @component('backend.components.header')
                tagi
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.blogs.tags.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
                </div>
            </div>
@if (count($tags) > 0)
            <div class="row">
                <div class="col-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">nazwa</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($tags as $tag)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td><a href="{{ route('backend.admins.blogs.tags.show', [$tag->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a></td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@else
            <div class="alert alert-warning" role="alert">brak tagów</div>
@endif
@endsection
