<?php $__env->startSection('noindex'); ?>
<meta name="robots" content="noindex">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'logowanie lub rejestracja'); ?>

<?php $__env->startSection('content'); ?>
            <div class="row mt-5">
                <div class="col-sm text-center">
                    <h2><a href="<?php echo e(route('login')); ?>" title="logowanie">zaloguj się <i class="fas fa-sign-in-alt"></i></a></h2>
                </div>
                <div class="col-sm text-center">
                    <h2><a href="<?php echo e(route('register')); ?>" title="rejestracja">zarejestruj się <i class="fas fa-user-plus"></i></a></h2>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/login_register/index.blade.php ENDPATH**/ ?>