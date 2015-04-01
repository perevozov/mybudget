<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document title</title>
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
	@yield('footer')
</body>
</html>