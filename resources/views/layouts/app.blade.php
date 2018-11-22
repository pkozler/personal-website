<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ config('app.name', 'Personal Website') }}">
	<meta name="author" content="Petr Kozler">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Petr Kozler | @yield('title')</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('storage/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    @yield('head')

</head>
<body id="page-top">

    @yield('navbar')
	@yield('content')
    @yield('footer')

	<!-- Bootstrap core JavaScript -->
	<script src="{{ asset('storage/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    @yield('bottom')

</body>
</html>
