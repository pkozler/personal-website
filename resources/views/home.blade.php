@extends('layouts.app')

@section('title')
    @include('partials.brand') - webová prezentace
@endsection

@section('head')
    {{--<!-- Custom fonts -->--}}
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet'>


    <!-- Custom CSS -->
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{--<!-- Anti-spam -->--}}
    {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
@endsection

@php
    $sectionList = \App\Section::all();
    $homeTemplates = ['welcome', 'about', 'services', 'portfolio', 'reference', 'contact'];
    $templateCount = count($homeTemplates);
@endphp

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

                    @foreach($sectionList as $section)
                        @if ($loop->first) @continue @endif
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#{{ $section->attr_id }}">{{ $section->nav_title }}</a>
                        </li>
                    @endforeach

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
                                <a class="dropdown-item" href="{{ route('log') }}"><i class="fas fa-history"></i> Záznamy</a>
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

@php
    $githubLink = \App\Link::search('github')->get()->get(0);
@endphp

@section('content')

    @foreach($homeTemplates as $idx => $template)
        @php($nextIdx = ($idx + 1) % $templateCount)
        @include('home.' . $template, ['section' => $sectionList->get($idx), 'nextSection' => $sectionList->get($nextIdx)])
    @endforeach

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
    <!-- Custom JS -->
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
