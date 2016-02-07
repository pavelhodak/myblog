<?php $__env->startSection('content'); ?>
    <h1>Edit: <?php echo $article->title; ?></h1>
    <?php echo $__env->make('articles.back_to_show_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--<a>Remove Images</a>-->

    <hr/>
    <?php echo $__env->make('articles.gallery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo Form::model($article, ['method'=>'PATCH', 'action' => ['ArticlesController@update', $article->id], 'files' => true]); ?>


    <?php echo $__env->make('articles.form', ['submitButtonText'=>'Update Article'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::close(); ?>


    <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>