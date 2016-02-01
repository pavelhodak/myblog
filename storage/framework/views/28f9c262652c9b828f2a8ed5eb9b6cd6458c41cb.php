<?php $__env->startSection('content'); ?>
    <h1>Articles</h1>
    <?php foreach($articles as $article): ?>
        <article>
            <h2>
                <a href="<?php echo e(action('ArticlesController@show', [$article->id])); ?>"><?php echo e($article->title); ?></a>
            </h2>
            <div class="body">
                <?php echo e($article->body); ?>

            </div>
        </article>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>