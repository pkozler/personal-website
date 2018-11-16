@extends('layouts.app')

<style>
    .large-icon {
        font-size: 100px
    }
</style>

@section('navbar')

<a class="navbar-brand" href="{{ url('/') }}/#">www.petrkozler.cz</a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
  <!-- Left Side Of Navbar -->
  <!-- <ul class="navbar-nav mr-auto"></ul> -->

  <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#about">O mně</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#portfolio">Projekty</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a>
    </li>
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#message">Vzkazy</a>
    </li>
    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}"><span class="fa fa-user"></span>&nbsp;{{ __('Přihlásit se') }}</a>
    </li>
    @else
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  @endguest
</ul>
</div>

@endsection

@section('header')

<div class="row text-white text-center">
  <div class="col-lg-10 mx-auto">
    <h1 class="text-faded mb-5">Petr Kozler</h1>
    <hr>
  </div>

  <div class="col-lg-8 mx-auto">
    <h3 class="text-faded mb-5">Vítejte na mých webových stránkách!</h3>
    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">O mně</a>
  </div>
</div>

@endsection

@section('content')

@include('home.about')

@include('home.portfolio', ['img1' => asset('storage/img/portfolio/cs.png'), 'img2' => asset('storage/img/portfolio/java.png'), 'img3' => asset('storage/img/portfolio/php.png'), 'img4' => asset('storage/img/portfolio/js.png'), 'img5' => asset('storage/img/portfolio/cpp.png'), 'img6' => asset('storage/img/portfolio/sql.png'), 'img7' => asset('storage/img/portfolio/html.png'), 'img8' => asset('storage/img/portfolio/py.png')])

@include('home.link')

@include('home.contact')

{{--@include('home.message')--}}

@endsection

@section('foot')

    <script src="{{ asset('storage/js/secret.js') }}"></script>

@endsection
