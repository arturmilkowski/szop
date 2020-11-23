@extends('backend.layouts.app')

@section('title', 'blog')

@section('content')
            @component('backend.components.header')
            @endcomponent
            <div class="row text-center">
                <div class="col-sm">
                    <a href="{{ route('backend.admins.blogs.tags.index') }}" title="oznaczenia postów">tagi</a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('backend.admins.blogs.posts.index') }}" title="posty na blogu">wpisy</a>
                </div>
                <div class="col-sm">
                    <a href="{{ route('backend.admins.blogs.comments.index') }}" title="komentarze do wpisów na blogu">komentarze</a>
                </div>
            </div>
@endsection
