<?php $__env->startSection('page-title'); ?>
    Обновление статьи
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1>Обновление статьи</h1>
    <?php echo Form::open(['action' => ['ArticlesController@update', $article->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Название статьи')); ?>

        <?php echo e(Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Введите заголовок'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('text', 'Сама статья')); ?>

        <?php echo e(Form::textarea('text', $article->text, ['id' => 'app-ckeditor', 'placeholder' => 'Введите саму статью'])); ?>

    </div>
    <?php echo e(Form::hidden('_method', 'PUT')); ?>

    <?php echo e(Form::file('main_image')); ?>

    <br><br>
    <?php echo e(Form::submit('Обновить', ['class' => 'btn btn-success'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/resources/views/articles/edit.blade.php ENDPATH**/ ?>