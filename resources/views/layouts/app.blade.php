<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="{{ config('app.name', 'Laravel') }}">
	<meta name="author" content="Petr Kozler">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Petr Kozler - osobní stránky</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('storage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

	<!-- Custom fonts for this template -->
	<link href="{{ asset('storage/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- Plugin CSS -->
	<link href="{{ asset('storage/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
	<link href="{{ asset('storage/css/creative.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('storage/css/app.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">

    @yield('head')

	<script src='https://www.google.com/recaptcha/api.js' type="text/javascript"></script>
</head>
<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">www.petrkozler.cz</a>
			@yield('navbar')
		</div>
	</nav>

	<header class="masthead text-center text-white d-flex">
		<div class="container my-auto">
			@yield('header')
		</div>
	</header>

	@yield('content')

	<footer class="footer bg-dark">
		<div class="container">
			<div class="row">
                <div class="col-md-12 text-center">
                    <span class="text-faded" id="copyright">&copy; 2018 Petr Kozler</span>
                </div>
            </div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="{{ asset('storage/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('storage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Plugin JavaScript -->
	<script src="{{ asset('storage/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('storage/vendor/scrollreveal/scrollreveal.min.js') }}"></script>
	<script src="{{ asset('storage/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

	<!-- Custom scripts for this template -->
	<script src="{{ asset('storage/js/creative.min.js') }}"></script>
	<script src="{{ asset('storage/js/app.js') }}"></script>
    @yield('foot')

</body>
</html>
