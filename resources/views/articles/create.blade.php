@extends('app')

@section('content')

	<h1>Create a new article</h1>
	<hr/>
	{!! Form::open(['url' => 'articles']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Article body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => '123123']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('published_at', 'Published from:') !!}
		{!! Form::input('date','published_at', null, ['class' => 'form-control', 'placeholder' => 'dd.mm.yyyy']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Add article', ['class' => 'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@endsection