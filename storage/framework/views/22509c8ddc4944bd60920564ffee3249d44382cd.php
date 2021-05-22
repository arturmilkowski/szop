            <div class="row">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo e(url('/')); ?>"><?php echo e(config('app.name', 'szop')); ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">logowanie</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('password.request')); ?>">zapomniałem hasła</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">zakładanie konta</a></li>
                </ul>
            </div>
<?php /**PATH /var/www/html/szop/resources/views/includes/nav.blade.php ENDPATH**/ ?>