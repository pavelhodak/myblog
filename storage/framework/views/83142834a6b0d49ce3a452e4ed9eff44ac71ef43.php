<?php $__env->startSection('content'); ?>
    <h1><?php echo e($article->title); ?></h1>
    <?php echo $__env->make('articles.back_to_index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(Auth::user() && Auth::user()->is_admin): ?>
        <a href="<?php echo e(action('ArticlesController@edit', [$article->id])); ?>">Edit</a>
        <a href="<?php echo e(action('ArticlesController@delete', [$article->id])); ?>">Delete</a>
    <?php endif; ?>
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    <hr/>
    <?php echo $__env->make('articles.gallery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <h3><?php echo e($article->title); ?></h3>
    <article>
        <?php echo e($article->body); ?>

    </article>
    <p>Price: <span class="price"><?php echo e($article->price); ?></span></p>
    <p><a href="#" class="btn btn-primary buy-btn" id="<?php echo e($article->id); ?>" role="button">Buy</a></p>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>