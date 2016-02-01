<?php $__env->startSection('title'); ?>
Add New Post
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script type="text/javascript" src="<?php echo e(asset('/js/tinymce/tinymce.min.js')); ?>"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    });
</script>
<form action="/new-post" method="post">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    <div class="form-group">
        <input required="required" value="<?php echo e(old('title')); ?>" placeholder="Enter title here" type="text" name = "title"class="form-control" />
    </div>
    <div class="form-group">
        <textarea name='body'class="form-control"><?php echo e(old('body')); ?></textarea>
    </div>
    <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
    <input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>