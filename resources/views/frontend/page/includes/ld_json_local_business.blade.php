        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "{{ config('settings.company_address.city') }}",
                "postalCode": "{{ config('settings.company_address.zip_code') }}",
                "streetAddress": "{{ config('settings.company_address.street') }}"
            },
            "name": "{{ config('app.name') }}",
            "url": "{{ config('app.url') }}",
            "email": "{{ config('settings.mail') }}",            
            "telephone": "{{ config('settings.company_address.phone') }}"
        }
        </script>
