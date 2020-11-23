                <div class="col">
                <article class="card my-post-card mb-5">
@if ($post->img)
                    <a href="{{ route('frontend.blog.posts.show', $post) }}" title="czytaj dalej">
                        <img src="{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                    </a>
@endif
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('frontend.blog.posts.show', $post) }}" title="czytaj dalej">{{ $post->title }}</a></h4>
                        <p class="card-text">{!! $post->intro !!}</p>
                        <p class="card-text"><small class="text-muted"><time datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time></small></p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('frontend.blog.posts.show', $post) }}" {{--class="btn btn-outline-secondary btn-sm"--}} title="przeczytaj cały wpis">
                            czytaj dalej <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </article>
                </div>
