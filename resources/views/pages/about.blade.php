@extends('app')

@section('content')

<h1>Standart about page</h1>
<p>{{ $name }}</p>

@if(isset($facts) && count($facts))
	<h3>And now, some random facts for your information:</h3>
	<ul>
		@foreach($facts as $fact)
			<li>{{ $fact}}</li>
		@endforeach
	</ul>
@endif
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

@stop

@section('footer')

<script>
	window.alert('yello')
</script>

@stop