<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ $siteInfo['desc'] }}">
	<meta name="author" content="{{ $siteInfo['author'] }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

    <!-- Main CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('head')

</head>

<body @yield('top') >

    @yield('navbar')
	@yield('content')
    @yield('footer')

	<!-- Main JS -->
	<script src="{{ asset('js/app.js') }}"></script>

    @yield('bottom')

</body>
</html>
