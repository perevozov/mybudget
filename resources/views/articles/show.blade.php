@extends('app')

@section('content')

	<h1>{{ $article->title }}</h1>
	<hr/>
	<div class="body">
		{{ $article->body }}
	</div>

	@if(!$article->tags->isEmpty())
		<h5>Tags:</h4>
		<ul>
			@foreach($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endif

@endsection