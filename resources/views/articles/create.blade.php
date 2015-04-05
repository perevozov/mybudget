@extends('app')

@section('content')

	<h1>Create a new article</h1>
	<hr/>

	{!! Form::open(['url' => 'articles']) !!}
		@include('articles.form', ['submitButtonCaption' => 'Create article'])
	{!! Form::close() !!}

@endsection