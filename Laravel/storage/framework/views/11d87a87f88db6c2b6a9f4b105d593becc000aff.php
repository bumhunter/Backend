<?php $__env->startSection('page-title'); ?>
    <?php echo e($header); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="jumbotron text-center">
        <h1>Главная страница</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Beatae consequatur cum, debitis ducimus error esse ex facilis ipsum maiores,
            molestiae mollitia nam quas qui quia quisquam ratione rem voluptas voluptatem.</p>
        <button class="btn btn-warning">Зарегистрироваться</button>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/resources/views/static/index.blade.php ENDPATH**/ ?>