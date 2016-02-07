@extends('app')
@section('content')
    <h1>Articles</h1>
    @if(Auth::user() && Auth::user()->is_admin)
        <a href="{{ action('ArticlesController@create') }}">New Article</a>
    @endif
    <a href="/basket" class=" navbar-link navbar-text navbar-right">
        <span style="font-size:1.5em;" class="glyphicon glyphicon-shopping-cart basket"></span>
        <span class="badge pull-right count_order">0</span>
    </a>
    <hr/>
    @foreach($articles as $article)
        <div class="col-md-3">

            <div class="thumbnail">
                @if(isset($images[$article->id]))
                    <img src="{{ $images[$article->id] }}" height="120">
                @endif
                <div class="caption">
                    <h3>{{ $article->title }}</h3>
                    <p>Price: <span class="price">{{ $article->price }}</span></p>
                    <p>
                        <a href="#" class="btn btn-primary buy-btn" id="{{ $article->id }}" role="button">Buy</a>
                        <a href="{{ action('ArticlesController@show', [$article->id]) }}" class="btn btn-default" role="button">Details</a>
                    </p>
                </div>
            </div>

            <h2>{{ $article->title }}</h2>

        </div>
    @endforeach
@stop