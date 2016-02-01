@extends('app')
@section('content')
    <h1>Delete: {!! $article->title !!}</h1>
    @include('articles.back_to_show_link')
    <hr/>
    {!! Form::model($article, ['method'=>'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]) !!}
    {!! Form::submit('Confirm deletion', ['class'=>'btn btn-danger form-control']) !!}
    {!! Form::close() !!}
