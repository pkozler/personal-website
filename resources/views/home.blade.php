@extends('layouts.app')

@section('title')
    @include('partials.brand') - webová prezentace
@endsection

@section('head')
    <!-- Custom fonts for this template -->
    <link href="{{ asset('storage/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{ asset('storage/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('storage/css/creative.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/css/app.css') }}" rel="stylesheet">

    {{--<script src='https://www.google.com/recaptcha/api.js' type="text/javascript"></script>--}}
@endsection

@section('top') id="page-top" @endsection

@section('navbar')
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">@include('partials.brand')</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#profile">O mně</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#skills">Dovednosti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#projects">Ukázky</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contacts">Kontakt</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><span class="fa fa-sign-in"></span></a>
                        </li>
                    @else
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="fa fa-user"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin') }}"><i class="fas fa-sliders"></i> Administrace</a>
                                <a class="dropdown-item" href="{{ route('admin.log') }}"><i class="fas fa-history"></i> Záznamy</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Odhlásit se</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')

        @include('home.welcome')
        @include('home.about')
        @include('home.services')
        @include('home.portfolio')
        @include('home.reference')
        @include('home.contact')

@endsection

@section('footer')
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-faded">
                    <span id="copyright">@include('partials.copyright')</span>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('bottom')
    <!-- Plugin JavaScript -->
    <script src="{{ asset('storage/vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('storage/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('storage/js/creative.min.js') }}"></script>
    <script src="{{ asset('storage/js/app.js') }}"></script>
@endsection
