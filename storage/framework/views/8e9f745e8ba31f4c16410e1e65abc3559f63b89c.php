<?php $__env->startSection('title', 'produkty'); ?>
<?php $__env->startSection('description', 'produkty'); ?>
<?php $__env->startSection('keywords', 'naturalne wody kolońskie, naturalne wody toaletowe, naturalne perfumy'); ?>

<?php $__env->startSection('content'); ?>
<?php if(isset($basket)): ?>
            <?php echo $__env->make('frontend.includes.basket', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php if($products->count() > 0): ?>
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>produkty</h1></div></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                <div class="card border-light">
                    <a href="<?php echo e(route('frontend.product.show', $product)); ?>" title="<?php echo e($product->name); ?>"><img src="<?php echo e(asset(config('settings.storage.products_storage_path')) . '/' . $product->img); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>"></a>
                    <div class="card-body">
                        <h2 class="card-title"><a href="<?php echo e(route('frontend.product.show', $product)); ?>" title="<?php echo e($product->name); ?>"><?php echo e($product->name); ?></a></h2>
                        <h3 class="card-text"><?php echo e($product->category->name); ?> <?php echo e($product->concentration->name); ?></h3>
                        <p class="card-text"><span class="text-muted"><?php echo $product->description; ?></span></p>
                        <p class="card-text"><span class="text-muted"><a href="<?php echo e(route('frontend.product.show', $product)); ?>" title="<?php echo e($product->name); ?>">pokaż <i class="fas fa-angle-right"></i></a></span></p>
                    </div>
                </div>
                </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
<?php else: ?>
            <h2 class="col text-center">brak produktów</h2>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/product/index.blade.php ENDPATH**/ ?>