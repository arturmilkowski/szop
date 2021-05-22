<?php $__env->startSection('title', 'blog'); ?>
<?php $__env->startSection('description', 'blog'); ?>
<?php $__env->startSection('keywords', 'wody kolońskie, wody toaletowe, perfumy'); ?>

<?php $__env->startSection('content'); ?>
<?php if($posts->count() > 0): ?>
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>blog</h1></div></div>
            <div class="row row-cols-xs-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col mb-4">
                    <div class="card my-post-card">
<?php if($post->img): ?>
                        <a href="<?php echo e(route('frontend.blog.posts.show', $post)); ?>" title="<?php echo e($post->title); ?>">
                            <img src="<?php echo e(asset('storage') . config('settings.storage.posts_storage_path') . '/' . $post->img); ?>" class="card-img-top" alt="<?php echo e($post->title); ?>">
                        </a>
<?php endif; ?>
                        <div class="card-body">
                            <h2 class="card-title"><a href="<?php echo e(route('frontend.blog.posts.show', $post)); ?>" title="przeczytaj całość"><?php echo e($post->title); ?></a></h2>
                            <p class="card-text"><?php echo $post->intro; ?></p>
                            <p class="card-text"><small class="text-muted">data publikacji: <time><?php echo e($post->created_at->format('Y-m-d')); ?></time></small></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo e(route('frontend.blog.posts.show', $post)); ?>"  title="przeczytaj cały wpis">
                                czytaj dalej <i class="fas fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
<?php else: ?>
            <h2 class="text-center">brak wpisów</h2>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/blog/post/index.blade.php ENDPATH**/ ?>