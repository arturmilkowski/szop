<?php $__env->startSection('gtag'); ?>
        <?php echo $__env->make('frontend.includes.gtag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', config('settings.company_name')); ?>
<?php $__env->startSection('content'); ?>
<?php if(isset($basket)): ?>
            <?php echo $__env->make('frontend.includes.basket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
            <?php echo $__env->make('frontend.page.includes.slogan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($products->count() > 0): ?>
            <div class="row mt-5 mb-3"><h5 class="h1 col-sm"><a href="<?php echo e(route('frontend.product.index')); ?>" title="produkty">produkty</a></h5></div>
            <div class="row row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.page.includes.product', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
<?php else: ?>
            <h2 class="col text-center">brak produktów</h2>
<?php endif; ?>
<?php if($posts->count() > 0): ?>
            <div class="row mt-5 mb-3"><h6 class="h1 col-sm"><a href="<?php echo e(route('frontend.blog.posts.index')); ?>" title="">blog</a></h6></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-5">
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('frontend.page.includes.post', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/page/index.blade.php ENDPATH**/ ?>