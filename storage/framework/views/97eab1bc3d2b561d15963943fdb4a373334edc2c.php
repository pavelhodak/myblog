<?php if($errors->any()): ?>)
<ul class="alert alert-danger">
    <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>