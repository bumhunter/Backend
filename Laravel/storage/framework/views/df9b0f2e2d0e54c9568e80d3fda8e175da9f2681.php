<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <title><?php echo $__env->yieldContent('page-title'); ?></title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">itProger</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/public/">Главная</a>
        <a class="p-2 text-dark" href="/public/about-us">Про нас</a>
        <a class="p-2 text-dark" href="/public/articles">Все статьи</a>
        <a class="p-2 text-dark" href="/public/articles/create">Создать статью</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Войти</a>
</div>
<div class="container">
    <?php echo $__env->make('blocks.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#app-ckeditor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/resources/views/layout/main.blade.php ENDPATH**/ ?>