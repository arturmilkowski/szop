@extends('frontend.layouts.app')

@section('title', $post->title)
@section('description', $post->site_description)
@section('keywords', $post->site_keyword)
@section('og_type', 'article')
@section('og_image', asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img)
@section('open_graph_optional')
@include('frontend.includes.open_graph_optional', [
        'og_published_time' => $post->created_at->format('Y-m-d'),
        'og_modified_time' => $post->updated_at,
        'og_expiration_time' => $post->created_at->addYears(1)->format('Y-m-d'),
        'og_tag' => $post->tags,
    ]
)
@endsection
@section('ldjson')
@parent
        @include('frontend.blog.post.includes.ld_json_article')
@endsection

@section('content')
            <article>
                <h1 class="mt-5 mb-3">{{ $post->title }}</h1>
@if ($post->img)
                <div class="row">
                    <div class="col-sm mb-5">
                        <img class="img-fluid" src="{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}" alt="{{ $post->title }}" />
                    </div>
                </div>
@endif
                <div class="row mt-3 mb-3">
                    <div class="col-sm text-justify">
                        <p class="lead">{!! $post->intro !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">{!! $post->content  !!}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm">
                        <p class="card-text"><small class="text-muted">data publikacji: <time>{{ $post->created_at->format('Y-m-d') }}</time></small></p>
                    </div>
                </div>
@if (count($post->tags) > 0)
                <div class="row mt-3">
                    <div class="col-sm">
                        tagi:
@foreach ($post->tags as $tag)
                        <a href="{{ route('frontend.blog.tags.show', $tag->slug) }}" class="badge badge-light" title="zobacz wpisy dla tagu">{{ $tag->name }}</a>
@endforeach
                    </div>
                </div>
@endif
            </article>
            <div class="row mt-3">
                <div class="col-sm">
                    <a href="{{ route('frontend.pages.index') }}" class="btn btn-light"><i class="fas fa-home"></i> strona główna</a>
                    <a href="{{ route('frontend.blog.posts.index') }}" class="btn btn-light"><i class="fas fa-angle-left"></i> powrót do bloga</a>
                </div>
            </div>
            @include('frontend.blog.post.includes.comment_form')
@if (count($post->comments) > 0)
            <div class="row">
                <div class="col-sm mt-5"><h3>komentarze <i class="far fa-comments"></i></h3></div>
            </div>
            <ul class="list-unstyled">
@foreach ($post->comments as $comment)
                    <li class="media">    
                        <div class="media-body">                            
                            {{ $comment->content }}
                            <div class="mt-0 mb-4"><small>&mdash; {{ $comment->author }}</small></div>
                        </div>
                    </li>
@endforeach
            </ul>
@endif
@endsection
