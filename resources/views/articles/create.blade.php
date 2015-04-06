@extends('app')

@section('content')

	<h1>Create a new article</h1>
	<hr/>

	{!! Form::open(['url' => 'articles']) !!}
		@include('articles.form', ['submitButtonCaption' => 'Create article'])
	{!! Form::close() !!}

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection