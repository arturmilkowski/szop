@extends('frontend.layouts.app')

@section('title', 'blog')
@section('description', 'tagi')
@section('keywords', 'wody kolońskie, wody toaletowe, perfumy')

@section('content')
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>tagi</h1></div></div>
@if ($tags)
            <ul class="list-group list-group-horizontal">
@foreach ($tags as $tag)
                <li class="list-group-item">
                    <a href="{{ route('frontend.blog.tags.show', $tag->slug) }}" title="wpisy dla tagu {{ $tag->name }}">{{ $tag->name }}</a>
                </li>
@endforeach
            </ul>
@endif
@endsection