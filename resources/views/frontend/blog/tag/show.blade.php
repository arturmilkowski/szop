@extends('frontend.layouts.app')

@section('title', $tag->name)

@section('content')
            <h1 class="mt-5 mb-3">{{ $tag->name }}</h1>
            <article class="row row-cols-1 row-cols-md-3">
@forelse ($tag->posts as $post)
                <div class="col mb-4 card-deck">
                    <div class="card">
@if ($post->img)
                        <img src="{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}" class="card-img-top" alt="{{ $post->title }}">
@endif
                        <div class="card-body">
                            <h2 class="card-title"><a href="{{ route('frontend.blog.posts.show', $post) }}" title="">{{ $post->title }}</a></h2>
                            <p class="card-text">{{ $post->intro }}</p>
                            <p class="card-text"><small class="text-muted">{{ $post->created_at->format('Y-m-d') }}</small></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('frontend.blog.posts.show', $post) }}" class="btn btn-outline-secondary" title="przeczytaj cały wpis">
                                przeczytaj <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
@empty
                <h2 class="text-center">brak wpisów dla tego tagu</h2>
@endforelse
            </article>
@endsection
