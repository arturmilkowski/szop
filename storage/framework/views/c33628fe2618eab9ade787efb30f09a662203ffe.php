        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?php echo e(route('frontend.pages.index')); ?>" title="strona główna">
                <img src="<?php echo e(asset('storage/img/woda_kolonska_logo.svg')); ?>" weight="79" height="36" alt="woda-kolonska.pl">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.index'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.index')); ?>" title="strona główna">strona główna <?php if($currentRouteName == 'frontend.pages.index'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.product'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.product.index')); ?>" title="produkty">produkty <?php if($currentRouteName == 'frontend.product'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.blog'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.blog.posts.index')); ?>" title="blog">blog <?php if($currentRouteName == 'frontend.blog'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.about'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.about')); ?>" title="o firmie">o firmie <?php if($currentRouteName == 'frontend.pages.about'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.question'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.question')); ?>" title="najczęściej zadawane pytania i odpowiedzi">pytania <?php if($currentRouteName == 'frontend.pages.question'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.delivery'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.delivery')); ?>" title="koszty i sposoby dostawy">dostawa <?php if($currentRouteName == 'frontend.pages.delivery'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.term_condition'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.term_condition')); ?>" title="regulamin sklepu">regulamin <?php if($currentRouteName == 'frontend.pages.term_condition'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                    <li class="nav-item <?php if($currentRouteName == 'frontend.pages.contacts'): ?> active <?php endif; ?>">
                        <a class="nav-link" href="<?php echo e(route('frontend.pages.contacts.create')); ?>" title="kontakt">kontakt <?php if($currentRouteName == 'frontend.pages.contacts'): ?><span class="sr-only">(current)</span><?php endif; ?></a>
                    </li>
                </ul>
<?php if(auth()->guard()->check()): ?>
                <a class="btn btn-sm btn-outline-secondary mr-1" href="<?php echo e(route('home')); ?>" role="button" title="konto">konto <i class="fas fa-user-cog"></i></a>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('logout')); ?>" role="button" title="wylogowanie" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    wyloguj <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" class="form-inline" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </form>
<?php else: ?>
                <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('frontend.login_register.index')); ?>" role="button" title="zaloguj się lub załóż konto">zaloguj <i class="fas fa-sign-in-alt"></i></a>
<?php endif; ?>
            </div>
        </nav>
<?php /**PATH /var/www/html/szop/resources/views/frontend/includes/nav.blade.php ENDPATH**/ ?>