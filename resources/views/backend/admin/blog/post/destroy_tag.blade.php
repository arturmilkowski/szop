@extends('backend.layouts.app')

@section('title', 'usuwanie tagu')

@section('content')
            @component('backend.components.header')
                czy na pewno chcesz usunąć tag: {{ $tag->name }} z wpisu {{ $post->title }}?
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.blogs.posts.destroy_tag', [$post->id, $tag->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.posts.show', [$post->id]) }}" role="button"><i class="fas fa-angle-left"></i> nie</a>
                        <button type="submit" class="btn btn-danger" name="delete" value="Yes"><i class="fas fa-trash-alt"></i> tak</button>
                    </form>
                </div>
            </div>
@endsection
