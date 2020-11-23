@extends('frontend.layouts.app')
@section('gtag')
        @include('frontend.includes.gtag')
@endsection
@section('title', config('settings.company_name'))
@section('content')
@isset($basket)
            @include('frontend.includes.basket')

@endisset
            @include('frontend.page.includes.slogan')
@if ($products->count() > 0)
            <div class="row mt-5 mb-3"><h5 class="h1 col-sm"><a href="{{ route('frontend.product.index') }}" title="produkty">produkty</a></h5></div>
            <div class="row row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
@foreach ($products as $product)
                @include('frontend.page.includes.product', ['product' => $product])
@endforeach
            </div>
@else
            <h2 class="col text-center">brak produktów</h2>
@endif
@if ($posts->count() > 0)
            <div class="row mt-5 mb-3"><h6 class="h1 col-sm"><a href="{{ route('frontend.blog.posts.index') }}" title="">blog</a></h6></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-5">
@foreach ($posts as $post)
                @include('frontend.page.includes.post', ['post' => $post])
@endforeach
            </div>
@endif
@endsection
