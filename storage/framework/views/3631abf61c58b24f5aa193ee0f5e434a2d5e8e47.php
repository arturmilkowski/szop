            <div class="row">
                <div class="col-sm">
                    <hr>
                    <small>
<?php if(App::environment() == 'local' || App::environment() == 'testing'): ?>
                        env: <strong><?php echo e(App::environment()); ?></strong> &bull;
                        action: <strong><?php echo e(Route::currentRouteAction()); ?></strong> &bull; route name: <strong><?php echo e(Route::currentRouteName()); ?></strong>
<?php if(auth()->guard()->check()): ?>
                        &bull; user: <strong><?php echo e(Auth::user()->name); ?></strong> &bull; uprawnienia: <strong><?php echo e(Auth::user()->role->display_name); ?></strong>
<?php endif; ?>
<?php else: ?>
                        <div class="float-left text-black-50">2020 &mdash; <?php echo e(config('settings.company_name')); ?></div>
                        <div class="float-right text-black-50">wersja 0.0.1</div>
<?php endif; ?>
                    </small>
                </div>
            </div>
<?php /**PATH /var/www/html/szop/resources/views/backend/includes/footer.blade.php ENDPATH**/ ?>