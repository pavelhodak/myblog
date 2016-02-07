<div class="form-group">
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body','Body:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at','Publish on:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::input('number', 'price', null, ['min'=> 0, 'step'=>0.01, 'class'=>'form-control']) !!}
</div>

@include('articles.upload_images')

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>