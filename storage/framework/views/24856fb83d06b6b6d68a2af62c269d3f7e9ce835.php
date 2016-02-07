<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="<?php echo e(asset('js/jquery-2.2.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-cookie/jquery.cookie.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('js/fancybox/source/jquery.fancybox.css')); ?>" type="text/css" media="screen" />
    <script src="<?php echo e(asset('js/fancybox/source/jquery.fancybox.pack.js')); ?>"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<?php echo $__env->yieldContent('footer'); ?>
</body>
</html>