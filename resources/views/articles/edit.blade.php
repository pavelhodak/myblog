@extends('app')
@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    @include('articles.back_to_show_link')
    <hr>
    {!! Form::model($article, ['method'=>'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}

    @include('articles.form', ['submitButtonText'=>'Update Article'])

    {!! Form::close() !!}

    @include('errors.list')
@stop