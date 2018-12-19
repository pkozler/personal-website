@extends('layouts.app')

@section('title')
    @include('partials.brand') | Webová prezentace
@endsection

@section('head')
    @include('partials.style')
    <link href="{{ asset('css/home/custom.css') }}" rel="stylesheet">

    {{--<!-- Anti-spam -->--}}
    {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
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

                    @foreach($sectionList as $section)
                        @if ($loop->first) @continue @endif
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#{{ $section->attr_id }}">{{ $section->nav_title }}</a>
                        </li>
                    @endforeach

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <!-- invisible anti-spam link-->
                            <a href="http://antispam.er.cz/" hidden><img src="http://as.er.cz/n.gif" width="1" height="1" border="0" alt="Antispam.er.cz" /></a>

                            <a class="nav-link" href="{{ route('login') }}"><span class="fa fa-sign-in fa-lg"></span></a>
                        </li>
                    @else
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="fa fa-user-circle fa-lg"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin') }}">Administrace</a>
                                <a class="dropdown-item" href="{{ route('log') }}">Záznamy</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlásit se</a>

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

    @foreach($sectionList as $i => $section)
        @include('home.' . $section->attr_id, [
        'section' => $section,
        'nextSection' => ($loop->last ? $sectionList->get(0) : $sectionList->get($i + 1))
        ])
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
    @include('partials.script')
    <script src="{{ asset('js/home/custom.js') }}"></script>
@endsection
