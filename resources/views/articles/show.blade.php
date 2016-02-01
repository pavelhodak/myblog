@extends('app')
@section('content')
    <h1>{{ $article->title }}</h1>
    @include('articles.back_to_index')
    @if(Auth::user()->id==$article->user_id)
        <a href="{{ action('ArticlesController@edit', [$article->id]) }}">Edit</a>
        <a href="{{ action('ArticlesController@delete', [$article->id]) }}">Delete</a>
    @endif
    <hr/>
    <article>
        {{ $article->body }}
    </article>

@stop