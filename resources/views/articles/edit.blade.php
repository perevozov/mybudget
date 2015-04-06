@extends('app')

@section('content')
	<h1>{{ $article->title }}</h1>
	<hr/>

	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id] ]) !!}
		@include('articles.form', ['submitButtonCaption' => 'Save changes'])
	{!! Form::close() !!}

	@include('errors.list')
@stop