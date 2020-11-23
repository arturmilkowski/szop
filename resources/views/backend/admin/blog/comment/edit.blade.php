@extends('backend.layouts.app')

@section('title', 'edycja komentarza')

@section('content')
            @component('backend.components.header')
                edycja komentarza
            @endcomponent
            <div class="row">
                <div class="col-sm">
                    <form action="{{ route('backend.admins.blogs.comments.update', [$comment->id]) }}" method="POST" novalidate>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="content">zawartość</label>
                            <textarea class="form-control @error('content')is-invalid @enderror" id="content" name="content" rows="10" placeholder="pole obowiązkowe">{{ $comment->content }}</textarea>
                            @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        <div class="form-group">
                            <label for="author">komentujący</label>
                            <input class="form-control @error('author')is-invalid @enderror" type="text" id="author" name="author" value="{{ $comment->author }}" maxlength="60" placeholder="pole obowiązkowe" required>
                            @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror

                        </div>
                        
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="approved" name="approved" value="1" @if($comment->approved)checked @endif>
                            <label class="form-check-label" for="approved">zatwierdzony</label>
                        </div>

                        <a class="btn btn-secondary" href="{{ route('backend.admins.blogs.comments.show', [$comment->id]) }}" role="button" title="powrót"><i class="fas fa-arrow-left"></i> powrót</a>
                        <button type="submit" class="btn btn-primary" title="zapisywanie"><i class="fas fa-save"></i> zapisz</button>
                    </form>
                    <form class="mt-2" action="{{ route('backend.admins.blogs.comments.destroy', [$comment->id]) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger" title="usuwanie"><i class="far fa-trash-alt"></i> usuń</button>
                    </form>
                </div>
            </div>
@endsection
