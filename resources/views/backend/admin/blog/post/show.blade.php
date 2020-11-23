@extends('backend.layouts.app')

@section('title', 'wpis')

@section('content')
            @component('backend.components.header')
                wpis
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $post->id }}</td>
                            </tr>
@if ($post->user)
                            <tr>
                                <th scope="row">dodał lub zmienił</th>
                                <td>{{ $post->user->name }}</td>
                            </tr>
@endif
                            <tr>
                                <th scope="row">przyjazny adres</th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <th scope="row">nazwa</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th scope="row">wprowadzenie</th>
                                <td>{!! $post->intro !!}</td>
                            </tr>
                            <tr>
                                <th scope="row">zawartość</th>
                                <td>{!! $post->content !!}</td>
                            </tr>
@if ($post->img)
                            <tr>
                                <th scope="row">zdjęcie</th>
                                <td>
                                    <img class="img-fluid" src="{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}" />
                                </td>
                            </tr>
@endif
                            <tr title="ważny ze względu na pozycjonowanie">
                                <th scope="row">opis w sekcji head</th>
                                <td>{{ $post->site_description }}</td>
                            </tr>
                            <tr title="ważne ze względu na pozycjonowanie">
                                <th scope="row">słowa kluczowe w sekcji head</th>
                                <td>{{ $post->site_keyword }}</td>
                            </tr>
                            <tr>
                                <th scope="row">zatwierdzony</th>
                                <td>@if ($post->approved) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                            </tr>
                            <tr>
                                <th scope="row">opublikowany</th>
                                <td>@if ($post->published) <span class="badge badge-success">tak</span> @else <span class="badge badge-light">nie</span> @endif</td>
                            </tr>
                            <tr>
                                <th scope="row">tagi</th>
                                <td>
@forelse ($post->tags as $tag)
                                <a href="#" class="badge badge-secondary">{{ $tag->name }}</a>
@empty
                                &mdash;
@endforelse
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.posts.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                    <a class="btn btn-primary" href="{{ route('backend.admins.blogs.posts.edit', [$post->id]) }}" role="button" title="edycja"><i class="fas fa-edit"></i> edytuj</a>
                </div>
            </div>
@endsection
