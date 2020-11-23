@extends('backend.layouts.app')

@section('title', 'dodawanie wpisu')

@section('content')
            @component('backend.components.header')
                dodawanie wpisu
            @endcomponent
            
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.blogs.posts.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title">tytuł</label>
                            <input class="form-control @error('title')is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title') }}" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="intro">wprowadzenie</label>
                            <textarea class="form-control" id="intro" name="intro" rows="3" maxlength="255" placeholder="pole nieobowiązkowe">{{ old('intro') }}</textarea>
                            @error('intro')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="content">zawartość</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="pole nieobowiązkowe">{{ old('content') }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="img">obrazek</label>
                            <input class="form-control-file @error('img')is-invalid @enderror" type="file" id="img" name="img">
                            @error('img')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="site_description">opis w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_description')is-invalid @enderror" type="text" id="site_description" name="site_description" value="{{ old('site_description') }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('site_description')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group">
                            <label for="site_keyword">słowa kluczowe w sekcji nagłówkowej strony</label>
                            <input class="form-control @error('site_keyword')is-invalid @enderror" type="text" id="site_keyword" name="site_keyword" value="{{ old('site_keyword') }}" maxlength="255" placeholder="pole nieobowiązkowe">
                            @error('site_keyword')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="approved" name="approved" value="1" @if(old('approved'))checked @endif>
                            <label class="form-check-label" for="approved">zatwierdzony</label>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="published" name="published" value="1" @if(old('published'))checked @endif>
                            <label class="form-check-label" for="published">opublikowany</label>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 1</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag1)
@if ( old('tag_id') == $tag1->id)
                                    <option value="{{ $tag1->id }}" selected>{{ $tag1->name }}</option>
@else
                                    <option value="{{ $tag1->id }}">{{ $tag1->name }}</option>
@endif
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 2</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag2)
@if ( old('tag_id') == $tag2->id)
                                    <option value="{{ $tag2->id }}" selected>{{ $tag2->name }}</option>
@else
                                    <option value="{{ $tag2->id }}">{{ $tag2->name }}</option>
@endif
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-group col-md-4">
                                <label for="tag_id">tag 3</label>
                                <select class="form-control @error('tag_id')is-invalid @enderror" id="tag_id" name="tags[]">
                                    
                                    <option value="">wybierz z listy</option>
@foreach ($tags as $tag3)
@if ( old('tag_id') == $tag3->id)
                                    <option value="{{ $tag3->id }}" selected>{{ $tag3->name }}</option>
@else
                                    <option value="{{ $tag3->id }}">{{ $tag3->name }}</option>
@endif
@endforeach
                                </select>
                            @error('tag_id')<div class="invalid-feedback">{{ $message }}</div>@enderror

                            </div>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.posts.index') }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                </div>
            </div>
@endsection
