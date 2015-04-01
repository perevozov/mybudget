@extends('app')

@section('content')

	<h1>Articles</h1>
	<hr/>

	@foreach($articles as $article)
	<div class="article">
		<a href="{{ action('ArticlesController@show', $article->id) }}"><h2>{{ $article->title }}</h2></a>
		<div class="body">{{ $article->body }}</div>
	</div>

	@endforeach

	<hr/>

	<a class="btn btn-default" href="{{ action('ArticlesController@create') }}">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add article
	</a>
@endsection