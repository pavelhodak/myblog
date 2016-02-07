@extends('app')
@section('content')
    <h1>{{ $article->title }}</h1>
    @include('articles.back_to_index')

    @if(Auth::user() && Auth::user()->is_admin)
        <a href="{{ action('ArticlesController@edit', [$article->id]) }}">Edit</a>
        <a href="{{ action('ArticlesController@delete', [$article->id]) }}">Delete</a>
    @endif
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    <hr/>
    @include('articles.gallery')
    <h3>{{ $article->title }}</h3>
    <article>
        {{ $article->body }}
    </article>
    <p>Price: <span class="price">{{ $article->price }}</span></p>
    <p><a href="#" class="btn btn-primary buy-btn" id="{{ $article->id }}" role="button">Buy</a></p>


@stop