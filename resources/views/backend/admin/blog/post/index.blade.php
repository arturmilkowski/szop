@extends('backend.layouts.app')

@section('title', 'wpisy')

@section('content')
            @component('backend.components.header')
                wpisy
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-primary mb-2" href="{{ route('backend.admins.blogs.posts.create') }}" role="button"><i class="fas fa-plus"></i> dodaj</a>
                </div>
            </div>
@if (count($posts) > 0)
            <div class="row">
                <div class="col-sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">tytuł</th>
                                <th scope="col">zatwierdzony</th>
                                <th scope="col">opublikowany</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>@if ($post->approved) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                                <td>@if ($post->published) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                                <td><a href="{{ route('backend.admins.blogs.posts.show', [$post->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a></td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                {{ $posts->links() }}
                </div>
            </div>
@else
            <div class="alert alert-warning" role="alert">brak wpisów</div>
@endif
@endsection
