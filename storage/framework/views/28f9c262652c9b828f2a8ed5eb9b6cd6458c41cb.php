<?php $__env->startSection('content'); ?>
    <h1>Articles</h1>
    <?php if(Auth::user() && Auth::user()->is_admin): ?>
        <a href="<?php echo e(action('ArticlesController@create')); ?>">New Article</a>
    <?php endif; ?>
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    <hr/>
    <?php foreach($articles as $article): ?>
        <div class="col-md-3">

            <div class="thumbnail">
                <?php if(isset($images[$article->id])): ?>
                    <img src="<?php echo e($images[$article->id]); ?>" height="120">
                <?php endif; ?>
                <div class="caption">
                    <h3><?php echo e($article->title); ?></h3>
                    <p>Price: <span class="price"><?php echo e($article->price); ?></span></p>
                    <p>
                        <a href="#" class="btn btn-primary buy-btn" id="<?php echo e($article->id); ?>" role="button">Buy</a>
                        <a href="<?php echo e(action('ArticlesController@show', [$article->id])); ?>" class="btn btn-default" role="button">Details</a>
                    </p>
                </div>
            </div>

            <h2><?php echo e($article->title); ?></h2>

        </div>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>