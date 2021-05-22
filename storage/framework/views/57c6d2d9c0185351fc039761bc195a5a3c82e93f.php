        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "<?php echo e(config('settings.company_address.city')); ?>",
                "postalCode": "<?php echo e(config('settings.company_address.zip_code')); ?>",
                "streetAddress": "<?php echo e(config('settings.company_address.street')); ?>"
            },
            "name": "<?php echo e(config('app.name')); ?>",
            "url": "<?php echo e(config('app.url')); ?>",
            "email": "<?php echo e(config('settings.mail')); ?>",            
            "telephone": "<?php echo e(config('settings.company_address.phone')); ?>"
        }
        </script>
<?php /**PATH /var/www/html/szop/resources/views/frontend/page/includes/ld_json_local_business.blade.php ENDPATH**/ ?>