<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
        <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
        <meta name="robots" content="noindex">
        <title><?php echo $__env->yieldContent('title'); ?></title>
    </head>
    <body>
<?php if(session('alert')): ?>
        <?php echo $__env->make('backend.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
        <div class="container">
            <?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /var/www/html/szop/resources/views/layouts/app.blade.php ENDPATH**/ ?>