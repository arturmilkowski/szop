@extends('frontend.layouts.app')

@section('title', 'blog')
@section('description', 'blog')
@section('keywords', 'wody kolońskie, wody toaletowe, perfumy')

@section('content')
@if ($posts->count() > 0)
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>blog</h1></div></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
@foreach ($posts as $post)
                <div class="col mb-4">
                    <div class="card my-post-card">
@if ($post->img)
                        <a href="{{ route('frontend.blog.posts.show', $post) }}" title="{{ $post->title }}">
                            <img src="{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}" class="card-img-top" alt="{{ $post->title }}">
                        </a>
@endif
                        <div class="card-body">
                            <h2 class="card-title"><a href="{{ route('frontend.blog.posts.show', $post) }}" title="przeczytaj całość">{{ $post->title }}</a></h2>
                            <p class="card-text">{!! $post->intro !!}</p>
                            <p class="card-text"><small class="text-muted">data publikacji: <time>{{ $post->created_at->format('Y-m-d') }}</time></small></p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('frontend.blog.posts.show', $post) }}" {{--class="btn btn-outline-secondary"--}} title="przeczytaj cały wpis">
                                czytaj dalej <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
@else
            <h2 class="text-center">brak wpisów</h2>
@endif
@endsection
