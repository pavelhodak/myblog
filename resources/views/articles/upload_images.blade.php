<h2>Upload images:</h2>
<div class="form-group">
    {!! Form::file('images[]', ['multiple' => true]) !!}
    <button class="btn btn-primary add_images">One more image</button>
    <button class="btn btn-primary less_images">One less image</button>
</div>