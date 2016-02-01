<div class="form-group">
    <?php echo Form::label('title','Title:'); ?>

    <?php echo Form::text('title', null, ['class'=>'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('body','Body:'); ?>

    <?php echo Form::textarea('body', null, ['class'=>'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('published_at','Publish on:'); ?>

    <?php echo Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']); ?>

</div>