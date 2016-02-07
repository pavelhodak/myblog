@extends('app')
@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    @include('articles.back_to_show_link')
    <!--<a>Remove Images</a>-->

    <hr/>
    @include('articles.gallery')
    {!! Form::model($article, ['method'=>'PATCH', 'action' => ['ArticlesController@update', $article->id], 'files' => true]) !!}

    @include('articles.form', ['submitButtonText'=>'Update Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop