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

	<title>@yield('title')</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('storage/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css" rel="stylesheet">

    @yield('head')

</head>

<body @yield('top') >

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
