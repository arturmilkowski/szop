                <div class="card mb-5">
@if ($type->img)
                    <img src="{{ asset(config('settings.storage.types_storage_path')) . '/' . $type->img }}" class="card-img-top" alt="{{ $type->name }}" loading="lazy">
@endif
                    <div class="card-body">
                        <p class="card-title h4 product-name">{{ $type->name }}</p>
                        <p class="card-subtitle h5 mb-2 product-price">{{ $type->price }} zł</p>
@if($type->description)
                        <p class="card-text">{!! Markdown::parse($type->description) !!}</p>
@endif
                        <p class="card-text">
                            <small class="text-muted">sztuk w magazynie: {{ $type->quantity}}</small>
                        </p>
                    </div>
                    <div class="card-footer">
@if ($type->quantity > 0)
                        <form action="{{ route('frontend.basket.store', [$type->id]) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-outline-primary">do koszyka <i class="fas fa-shopping-basket fa-lg"></i></button>
                        </form>
@else
                        <div class="alert alert-danger" role="alert">brak w magazynie</div>
@endif
                    </div>
                </div>
