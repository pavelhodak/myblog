<?php $__env->startSection('content'); ?>
    <h1>Delete: <?php echo $article->title; ?></h1>
    <?php echo $__env->make('articles.back_to_show_link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <hr/>
    <?php echo Form::model($article, ['method'=>'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]); ?>

    <?php echo Form::submit('Confirm deletion', ['class'=>'btn btn-danger form-control']); ?>

    <?php echo Form::close(); ?>


<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>