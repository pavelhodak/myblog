<?php $__env->startSection('content'); ?>
    <h1><?php echo e($article->title); ?></h1>
    <?php echo $__env->make('articles.back_to_index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(Auth::user()->id==$article->user_id): ?>
        <a href="<?php echo e(action('ArticlesController@edit', [$article->id])); ?>">Edit</a>
        <a href="<?php echo e(action('ArticlesController@delete', [$article->id])); ?>">Delete</a>
    <?php endif; ?>
    <hr/>
    <article>
        <?php echo e($article->body); ?>

    </article>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>