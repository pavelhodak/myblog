<!-- images here -->
<?php foreach($images as $image): ?>
    <a class="fancybox" rel="group" href="<?php echo e($image); ?>">
        <img src="<?php echo e($image); ?>" height="120">
    </a>
<?php endforeach; ?>