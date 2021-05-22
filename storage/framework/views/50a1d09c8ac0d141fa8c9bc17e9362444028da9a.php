<?php $__env->startSection('title', 'kontakt'); ?>
<?php $__env->startSection('description', 'możesz się ze mną skontaktować'); ?>
<?php $__env->startSection('keywords', 'woda kolońska, męska woda kolońska, lawendowa woda kolońska, perfumy, perumeria niszowa, drogeria, nowa sól'); ?>

<?php $__env->startSection('content'); ?>
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>kontakt</h1></div></div>
            <div class="row mb-5">
                <div class="col-sm">
                    <form action="<?php echo e(route('frontend.pages.contacts.store')); ?>" method="POST">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label for="subject">tytuł</label>
                            <input name="subject" value="<?php echo e(old('subject')); ?>" type="text" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="subject" aria-describedby="subjectHelp" placeholder="pole obowiązkowe" minlength="3" maxlength="160" required>
                            <small id="subjectHelp" class="form-text text-muted">tytuł</small>
<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="content">treść</label>
                            <textarea name="content" class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="content" aria-describedby="contentHelp" rows="3" placeholder="pole obowiązkowe" maxlength="1000" required><?php echo e(old('content')); ?></textarea>
                            <small id="contentHelp" class="form-text text-muted">treść</small>
<?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input name="email" value="<?php echo e(old('email')); ?>" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" aria-describedby="emailHelp" placeholder="pole obowiązkowe" minlength="5" maxlength="30" required>
                            <small id="emailHelp" class="form-text text-muted">adres tylko do mojej wiadomości. nie wysyłam maili reklamowych</small>
<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-check unwanted">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="unwanted">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">wyślij <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
                <div class="col-sm mt-3 px-lg-5">
                    <address >
                        <strong><?php echo e(config('settings.company_name')); ?></strong>
                        <br>
                        <?php echo e(config('settings.company_address.street')); ?>

                        <br>
                        <?php echo e(config('settings.company_address.zip_code')); ?> <?php echo e(config('settings.company_address.city')); ?>

                        <br>
                        <?php echo e(config('settings.company_address.voivodeship')); ?>

                        <br>
                        <i class="fas fa-mobile"></i> <?php echo e(config('settings.company_address.phone')); ?>

                    </address>
                </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/page/contact/create.blade.php ENDPATH**/ ?>