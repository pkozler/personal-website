@extends('layouts.app')

@section('title')
    @yield('page') | @include('partials.brand')
@endsection

@section('head')

    <!-- Custom styles for this template -->
    <link href="{{ asset('storage/css/sb-admin.min.css') }}" rel="stylesheet">

@endsection

@section('top') class="bg-dark" @endsection

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand  mr-1" href="#"><span class="text-secondary">@include('partials.brand')</span></a>

        <div class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            @yield('navlinks')

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
            </li>
        </ul>

    </nav>
@endsection

@section('content')
    <div class="container">
        <div class="card @yield('form_card') mx-auto mt-5">
            <div class="card-header"> @yield('page')</div>
            <div class="card-body">
                @yield('auth_form')

                <div class="text-center">
                    @yield('foot_nav')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer', '')

@section('bottom')

    <!-- Custom scripts for this template -->
    <script src="{{ asset('storage/js/sb-admin.min.js') }}"></script>

@endsection
