            <footer class="row">
                <div class="col-sm">
<?php if(App::environment() == 'local' || App::environment() == 'testing'): ?>
                        env: <strong><?php echo e(App::environment()); ?></strong> &bull;
                        action: <strong><?php echo e(Route::currentRouteAction()); ?></strong> &bull; route name: <strong><?php echo e(Route::currentRouteName()); ?></strong>
<?php if(auth()->guard()->check()): ?>
                        &bull; user: <strong><?php echo e(Auth::user()->name); ?></strong> &bull; uprawnienia: <strong><?php echo e(Auth::user()->role->display_name); ?></strong>
<?php endif; ?>
<?php else: ?>
                        2020
                        &mdash;
                        <?php echo e(config('settings.company_name')); ?>

                        &mdash;
                        <a href="<?php echo e(route('frontend.pages.cookie')); ?>" title="informacje o plikach cookie">informacje o ciastkach</a>
                        &mdash;
                        <a href="<?php echo e(route('frontend.pages.privacy_policy')); ?>" title="polityka prywatności">polityka prywatności</a>
                        &mdash;
                        <a href="<?php echo e(route('frontend.pages.rodo')); ?>" title="prawa przysługujące z tytułu rodo">rodo</a>
<?php endif; ?>
                </div>
            </footer>
<?php /**PATH /var/www/html/szop/resources/views/frontend/includes/footer.blade.php ENDPATH**/ ?>