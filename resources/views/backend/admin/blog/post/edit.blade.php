@extends('backend.layouts.app')

@section('title', 'edycja wpisu')

@section('content')
            @component('backend.components.header')
                edycja wpisu
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.blogs.posts.update', [$post->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            <label for="title">tytuł</label>
                            <input class="form-control @error('title')is-invalid @enderror" type="text" id="title" name="title" value="{{ $post->title }}" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="intro">wprowadzenie</label>
                            <textarea class="form-control @error('intro')is-invalid @enderror" id="intro" name="intro" rows="3" maxlength="255" placeholder="pole nieobowiązkowe">{{ $post->intro }}</textarea>
                            @error('intro')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="content">zawartość</label>
                            <textarea class="form-control @error('content')is-invalid @enderror" id="content" name="content" rows="5" placeholder="pole nieobowiązkowe">{{ $post->content }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="img">grafika</label>
                            <input class="form-control-file @error('img')is-invalid @enderror" type="file" id="img" name="img">
                            @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="site_description">opis w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_description')is-invalid @enderror" type="text" id="site_description" name="site_description" value="{{ $post->site_description }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('site_description')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="site_keyword">słowa kluczowe w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_keyword')is-invalid @enderror" type="text" id="site_keyword" name="site_keyword" value="{{ $post->site_keyword }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('site_keyword')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="approved" name="approved" value="1" @if($post->approved)checked @endif>
                            <label class="form-check-label" for="approved">zatwierdzony</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="published" name="published" value="1" @if($post->published)checked @endif>
                            <label class="form-check-label" for="published">opublikowany <small class="text-muted">(wpis musi być zatwierdzony żeby mógł byc opublikowany)</small></label>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 1</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag1)
                                    <option value="{{ $tag1->id }}">{{ $tag1->name }}</option>
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 2</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag2)
                                    <option value="{{ $tag2->id }}">{{ $tag2->name }}</option>
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 3</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag3)
                                    <option value="{{ $tag3->id }}">{{ $tag3->name }}</option>
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.posts.show', [$post->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
@foreach ($post->tags as $tag)
                    <form class="mt-2" action="{{ route('backend.admins.blogs.posts.destroy_tag', [$post->id, $tag->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-outline-danger btn-sm" title="usuwanie"><i class="fas fa-tag"></i> {{ $tag->name }} <i class="far fa-trash-alt"></i> usuń tag</button>
                    </form>
@endforeach
@if ($post->img)
                    <form class="mt-2" action="{{ route('backend.admins.blogs.posts.destroy_img', [$post->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="fas fa-image"></i> usuń grafikę</button>
                    </form>
@endif
                    <form class="mt-2" action="{{ route('backend.admins.blogs.posts.destroy', [$post->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
@endsection
