            <div class="row">
                <div class="col-sm col-sm-12 col-md-10 col-lg-8 col-xl-6 mt-5">
                    <h4>skomentuj <i class="far fa-comment"></i></h4>
                    <form action="{{ route('frontend.blog.posts.comments.store', [$post->slug]) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="content">treść</label>
                            <textarea name="content" class="form-control @error('content')is-invalid @enderror" id="content" aria-describedby="contentHelp" rows="3" placeholder="pole obowiązkowe" maxlength="3000" required>{{ old('content') }}</textarea>
                            <small id="contentHelp" class="form-text text-muted">treść</small>
@error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
@enderror
                        </div>

                        <div class="form-group">
                            <label for="author">podpis</label>
@auth
@if (old('author'))
                            <input name="author" value="{{ old('author') }}" type="text" class="form-control @error('author')is-invalid @enderror" id="author" aria-describedby="authorHelp" placeholder="pole obowiązkowe" minlength="1" maxlength="255" required>
@else
                            <input name="author" value="{{ Auth::user()->name }}" type="text" class="form-control @error('author')is-invalid @enderror" id="author" aria-describedby="authorHelp" placeholder="pole obowiązkowe" minlength="1" maxlength="255" required>
@endif
@endauth
@guest()
                            <input name="author" value="{{ old('author') }}" type="text" class="form-control @error('author')is-invalid @enderror" id="author" aria-describedby="authorHelp" placeholder="pole obowiązkowe" minlength="1" maxlength="255" required>
@endguest
                            <small id="authorHelp" class="form-text text-muted">podpis</small>
@error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
@enderror
                        </div>

                        <div class="form-check unwanted">
                            <input type="checkbox" class="form-check-input" id="unwanted" name="unwanted">
                            <label class="form-check-label" for="unwanted">check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">wyślij <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
