<?php $__env->startSection('page-title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1>Страница про нас</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda debitis et expedita, ipsa labore,
        laborum magni molestias nihil nisi officiis optio, placeat veniam! Deserunt earum eos itaque quisquam quod!</p>

    <?php if(count($params) > 0): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $params; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><?php echo e($el); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/resources/views/static/about.blade.php ENDPATH**/ ?>