<?php $__env->startSection('page-title'); ?>
    Все статьи на сайте
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1>Все статьи на сайте</h1>

    <?php if(count($articles) > 0): ?>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="well">
                <img src="/public/storage/images/<?php echo e($el->image); ?>" style="max-width:300px" class="img-thumbnail" alt="<?php echo e($el->title); ?>">
                <a href="/public/articles/<?php echo e($el->id); ?>"><h3 class="mt-3"><?php echo e($el->title); ?></h3></a>
                <p><b>Последнее обновление:</b> <?php echo e($el->updated_at); ?></p>
                <p><b>Автор:</b> <?php echo e($el->user->name); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($articles->links()); ?>

    <?php else: ?>
        <p>На данный момент статей нет</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/resources/views/articles/index.blade.php ENDPATH**/ ?>