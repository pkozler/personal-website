@extends('layouts.app')

@section('head')

{{--<link href='{{ asset('storage/fonts/wikimedia-at.svg') }}' type='image/svg+xml'>--}}

@endsection

@section('navbar')

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
      <a class="nav-link js-scroll-trigger" href="#portfolio">Dovednosti</a>
    </li>
  <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#screenshots">Ukázky</a>
  </li>
    <li class="nav-item">
      <a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a>
    </li>
    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}"><span class="fa fa-sign-in"></span></a>
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
      <h1 class="text-uppercase">
          <strong>Petr Kozler</strong>
      </h1>
    <hr>
  </div>

  <div class="col-lg-8 mx-auto">
    <h3 class="text-faded mb-5">Vítejte na mých webových stránkách!</h3>
    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Zobrazit profil</a>
  </div>
</div>

@endsection

@section('content')

@include('home.about')


@include('home.portfolio')
@include('home.link', ['img1f' => asset('storage/img/portfolio/fullsize/1.png'), 'img2f' => asset('storage/img/portfolio/fullsize/2.png'), 'img3f' => asset('storage/img/portfolio/fullsize/3.png'), 'img4f' => asset('storage/img/portfolio/fullsize/4.png'), 'img5f' => asset('storage/img/portfolio/fullsize/5.png'), 'img6f' => asset('storage/img/portfolio/fullsize/6.png'), 'img7f' => asset('storage/img/portfolio/fullsize/7.png'), 'img8f' => asset('storage/img/portfolio/fullsize/8.png'), 'img9f' => asset('storage/img/portfolio/fullsize/9.png'), 'img1t' => asset('storage/img/portfolio/thumbnails/1.png'), 'img2t' => asset('storage/img/portfolio/thumbnails/2.png'), 'img3t' => asset('storage/img/portfolio/thumbnails/3.png'), 'img4t' => asset('storage/img/portfolio/thumbnails/4.png'), 'img5t' => asset('storage/img/portfolio/thumbnails/5.png'), 'img6t' => asset('storage/img/portfolio/thumbnails/6.png'), 'img7t' => asset('storage/img/portfolio/thumbnails/7.png'), 'img8t' => asset('storage/img/portfolio/thumbnails/8.png'), 'img9t' => asset('storage/img/portfolio/thumbnails/9.png')])

@include('home.contact')

{{--@include('home.message')--}}

@endsection

@section('foot')

    {{--<script src="{{ asset('storage/js/secret.js') }}"></script>--}}

@endsection
