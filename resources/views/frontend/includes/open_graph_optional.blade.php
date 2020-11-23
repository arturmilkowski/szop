        <meta property="og:published_time" content="{{ $og_published_time }}">
@isset ($og_modified_time)
        <meta property="og:modified_time" content="{{ $og_modified_time }}">
@endif
        <meta property="og:expiration_time" content="{{ $og_expiration_time }}">
        <meta property="og:author" content="{{ config("settings.company_owner") }}">
        <meta property="og:section" content="{{ config("settings.company_section") }}">
@foreach ($post->tags as $tag)
        <meta property="og:tag" content="{{ $tag->name }}">
@endforeach
