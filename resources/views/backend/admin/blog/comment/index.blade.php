@extends('backend.layouts.app')

@section('title', 'komentarze do wpisów')

@section('content')
            @component('backend.components.header')
                komentarze do wpisów
            @endcomponent
@if (count($comments) > 0)
            <div class="row">
                <div class="col-sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">lp</th>
                                <th scope="col">#</th>
                                <th scope="col">id wpisu</th>
                                <th scope="col">id użytkownika</th>
                                <th scope="col" title="numer ip komentującego">numer ip</th>
                                <th scope="col">przeglądarka</th>
                                <th scope="col">zawartość</th>
                                <th scope="col">podpis</th>
                                <th scope="col">zatwierdzony?</th>
                                <th scope="col">data</th>
                                <th scope="col">szczegóły</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($comments as $comment)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $comment->id }}</td>
                                <td>                                    
                                    <a href="{{ route('backend.admins.blogs.posts.show', [$comment->post_id]) }}" title="szczegóły">
                                        <i class="far fa-eye"></i> {{ $comment->post_id }}
                                    </a>                                    
                                </td>
@if ($comment->user_id)
                                <td>
                                    <a href="{{ route('backend.admins.users.show', [$comment->user_id]) }}" title="szczegóły">
                                        <i class="far fa-eye"></i> {{ Str::limit($comment->user_id, 4, '...') }}
                                    </a>
                                </td>
@else
                                <td>&mdash;</td>
@endif
                                <td title="numer ip komentującego">{{ $comment->ip }}</td>
                                <td>{{ Str::words($comment->agent, 1, '...') }}</td>
                                <td>{{ Str::words($comment->content, 6, '...') }}</td>
                                <td>{{ Str::words($comment->author, 3, '...') }}</td>
                                <td>@if ($comment->approved) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                                <td>{{ $comment->created_at }}</td>
                                <td><a href="{{ route('backend.admins.blogs.comments.show', [$comment->id]) }}" title="szczegóły"><i class="far fa-eye"></i> szczegóły</a></td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@else
            <div class="alert alert-warning" role="alert">brak komentarzy</div>
@endif
@endsection
