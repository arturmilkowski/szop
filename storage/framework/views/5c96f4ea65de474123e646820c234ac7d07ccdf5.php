<!doctype html>
<html lang="pl">
    <head>
<?php if(App::environment('prod')): ?>
<?php echo $__env->yieldContent('gtag'); ?>
<?php endif; ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo e(mix('css/frontend/app.css')); ?>">
        <script defer src="https://use.fontawesome.com/releases/v5.12.0/js/all.js"></script>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('description', 'ręcznie tworzone wody toaletowe i kolońskie. naturalne składniki. dobra jakość'); ?>">
        <meta name="keywords" content="<?php echo $__env->yieldContent('keywords', 'woda toaletowa, woda kolońska, polska woda kolońska, polska woda toaletowa, naturalna woda kolońska, lawenda dla panów, gardenia'); ?>">
        <link rel="canonical" href="https://woda-kolonska.pl/">
        <?php echo $__env->make('frontend.includes.favicon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.includes.open_graph_basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('open_graph_optional'); ?>

<?php $__env->startSection('ldjson'); ?>
        <?php echo $__env->make('frontend.page.includes.ld_json_local_business', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.page.includes.ld_json_logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.page.includes.ld_json_faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
    </head>
    <body>
        <?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(session('alert')): ?>
        <?php echo $__env->make('frontend.includes.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
        <div class="container-fluid">
<?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('frontend.includes.nav1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    </body>
</html><?php /**PATH /var/www/html/szop/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>