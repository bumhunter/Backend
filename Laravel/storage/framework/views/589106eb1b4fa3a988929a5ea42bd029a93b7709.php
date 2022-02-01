<?php $__env->startSection('page-title'); ?>
    Статья на сайте
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <a href="/public/articles" class="btn btn-warning">Назад</a><br>

    <h1><?php echo e($article->title); ?></h1>

    <div>
        <p><?php echo $article->text; ?></p>
        <p>Дата создания: <?php echo e($article->created_at); ?></p>
    </div>
    <?php if(!Auth::guest()): ?>
        <?php if(Auth::user()->id == $article->user_id): ?>
            <hr>
            <a href="/public/articles/<?php echo e($article->id); ?>/edit" class="btn btn-warning">Редактировать</a>

            <br><br>
            <?php echo Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST']); ?>

            <?php echo e(Form::hidden('_method', 'DELETE')); ?>

            <?php echo e(Form::submit('Удалить запись', ['class' => 'btn btn-danger'])); ?>

            <?php echo Form::close(); ?>

        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/resources/views/articles/show.blade.php ENDPATH**/ ?>