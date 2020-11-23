@extends('backend.layouts.app')

@section('title', 'komentarz do wpisu')

@section('content')
            @component('backend.components.header')
                komentarz do wpisu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $comment->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">id wpisu</th>
                                <td>{{ $comment->post_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">id użytkownika</th>
                                <td>{{ $comment->user_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">ip</th>
                                <td>{{ $comment->ip }}</td>
                            </tr>
                            <tr>
                                <th scope="row">agent</th>
                                <td>{{ $comment->agent }}</td>
                            </tr>
                            <tr>
                                <th scope="row">treść</th>
                                <td>{{ $comment->content }}</td>
                            </tr>
                            <tr>
                                <th scope="row">autor</th>
                                <td>{{ $comment->author }}</td>
                            </tr>
                            <tr>
                                <th scope="row">zatwierdzony</th>
                                <td>@if ($comment->approved) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                            </tr>
                            <tr>
                                <th scope="row">utworzono</th>
                                <td>{{ $comment->created_at }}</td>
                            </tr>
@if ($comment->updated_at)
                            <tr>
                                <th scope="row">zmieniono</th>
                                <td>{{ $comment->updated_at }}</td>
                            </tr>
@endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.comments.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.blogs.comments.edit', [$comment->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
