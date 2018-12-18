    @extends('layouts.app')

    @section('title')
        @include('partials.brand') | @yield('page')
    @endsection

    {{-- TODO refaktorovat! --}}

    @section('head')
        @include('partials.style')
    @endsection

    @section('top') id="page-top" class="bg-dark" @endsection

    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container-fluid">
                <a class="navbar-brand btn disabled">@include('partials.brand')</a>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link btn disabled text-primary">@yield('page')</a>
                    </li>
                </ul>

                <!-- Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Zrušit<span class="fa fa-external-link fa-lg ml-1"></span></a>
                    </li>
                </ul>

            </div>
        </nav>
    @endsection

    @section('content')
        <section>
            <div class="container">

                <div class="row">
                    <div class="offset-lg-3 col-lg-6">

                        <div class="card @yield('form_card') mx-auto mt-5">
                            <div class="card-header"> @yield('page')</div>
                            <div class="card-body">
                                @yield('form_content')

                                <div class="text-center">
                                    @yield('foot_nav')
                                </div>
                            </div>

                            <div class="card-footer text-dark">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endsection

    @section('footer')
        <footer class="footer fixed-bottom text-center pb-1">
            <span class="text-muted">@include('partials.copyright')</span>
        </footer>
    @endsection

    @section('bottom')
        @include('partials.script')
    @endsection
