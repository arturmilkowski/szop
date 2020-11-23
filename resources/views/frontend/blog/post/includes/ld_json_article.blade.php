        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ config('app.url') }}/blog"
            },
            "headline": "{{ $post->title }}",
@if ($post->img)
            "image": [
                "{{ asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img }}"
            ],
@endif
            "datePublished": "{{ $post->created_at->format('Y-m-d') }}",
@if ($post->updated_at)
            "dateModified": "{{ $post->updated_at->format('Y-m-d') }}",
@endif
            "author": {
                "@type": "Person",
                "name": "{{ config('settings.company_owner') }}"
            },
            "publisher": {
                "@type": "Organization",
                "name": "{{ config('settings.company_name') }}",
                "logo": {
                    "@type": "ImageObject",
                        "url": "{{ config('settings.company_logo') }}"
                }
            }
        }
        </script>
