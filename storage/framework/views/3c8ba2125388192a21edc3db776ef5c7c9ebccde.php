<?php $__env->startSection('title', 'dostawa'); ?>
<?php $__env->startSection('description', 'koszty dostawy. sposób pakowania przesyłki'); ?>
<?php $__env->startSection('keywords', 'koszty dostawy, pakowanie przesyłki'); ?>

<?php $__env->startSection('content'); ?>
            <div class="container">
            <div class="row mt-5 mb-3"><div class="col-sm"><h1>dostawa</h1></div></div>
            <div class="row row-cols-1 row-cols-md-2">
<?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card">
<?php if($delivery->img): ?>
                        <img src="<?php echo e(asset('storage/img')); ?>/<?php echo e($delivery->img); ?>" class="card-img-top" alt="<?php echo e($delivery->display_name); ?>">
<?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($delivery->display_name); ?></h5>
                            <p class="card-text">
<?php if($delivery->description ): ?>
                                
<?php endif; ?>
                                <table class="table">
                                    <tbody>
<?php $__currentLoopData = $delivery->methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($method->display_name); ?></th>
                                            <td>
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">zawartość</th>
                                                            <th scope="col">cena</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php $__currentLoopData = $method->costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($cost->description); ?></td>
                                                            <td><?php echo e($cost->cost); ?> zł</td>
                                                        </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </p>
                        </div>
                    </div>
                </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row mt-5 mb-2"><div class="col-sm"><h2>sposób płatności</h2></div></div>
            <div class="row">
                <div class="col-sm"><?php echo e($methodOfPayment); ?></div>
            </div>
            <div class="row mt-5 mb-2"><div class="col-sm"><h2>pakowanie</h2></div></div>
            <div class="row">
                <div class="col-sm">
                    przesyłka dostarczana jest w kopercie bąbelkowej.
                    każda butelka zapakowana jest w papier i dodatkowo owijana gumką, która amortyzuje uderzenia i otarcia.
                    ryzyko rozbicia lub uszkodzenia jest minimalne.
                </div>
            </div>
            <div class="row mt-5 mb-2"><div class="col-sm"><h2>czas realizacji</h2></div></div>
            <div class="row">
                <div class="col-sm">
                    paczka najczęściej jest wysyłana w dniu gdy należność pojawi się na koncie lub na dzień następny.
                    do całkowitego czasu oczekiwania należy doliczyć czas poczty polskiej, w którym dostarcza przesyłkę.
                </div>
            </div>
            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/szop/resources/views/frontend/page/delivery.blade.php ENDPATH**/ ?>