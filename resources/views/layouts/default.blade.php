<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	@yield('header')

	<div class="container">
		@yield('content')
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	@yield('script')
</body>
</html>
