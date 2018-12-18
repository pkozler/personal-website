@extends('layouts.app')

@php($pageDesc = $isAdmin ? 'Rozhraní administrace' : 'Záznamy aktivity')
@section('title')
    @include('partials.brand') | $pageDesc @yield('page')
@endsection

@section('head')
    <link href="{{ asset('css/admin/template.css') }}" rel="stylesheet">
@endsection

@section('top') id="page-top" @endsection

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a @if($isAdmin) id="sidebarToggle" class="navbar-brand btn text-light"
           @else class="navbar-brand btn text-light disabled"
           @endif style="width: 192px !important;">@include('partials.brand')</a>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-0 py-2 navbar-nav mr-auto bg-light border-dark rounded">
            <li class="breadcrumb-item text-primary">{{ $pageDesc }}</li>
            @if ($isAdmin)
                <li class="breadcrumb-item text-secondary active">@yield('page')</li>
            @endif
        </ol>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span class="fa fa-sign-out-alt fa-lg"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if($isAdmin)
                        <a class="dropdown-item" href="{{ route('log') }}">Záznamy</a>
                    @else
                        <a class="dropdown-item" href="{{ route('admin') }}">Administrace</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('home') }}">Domů</a>

                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlásit se
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </div>
            </li>

        </ul>
    </nav>
@endsection

@section('content')

    <div id="wrapper">

        <!-- Sidebar -->
        @if($isAdmin)
            <ul class="sidebar navbar-nav">

                <li class="nav-item border-dark border-bottom">
                    <a class="nav-link" href="{{ route('admin.sections') }}">
                        <i class="fas fa-fw fa-edit"></i>
                        <span>Hlavní obsah</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.notes') }}">
                        <i class="fas fa-fw fa-clipboard"></i>
                        <span>Poznámky</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.images') }}">
                        <i class="fas fa-fw fa-image"></i>
                        <span>Obrázky</span>
                    </a>
                </li>

                <li class="nav-item border-dark border-bottom">
                    <a class="nav-link" href="{{ route('admin.links') }}">
                        <i class="fas fa-fw fa-link"></i>
                        <span>Odkazy</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Nastavení účtu</span>
                    </a>
                </li>

            </ul>
        @endif

        <div id="content-wrapper">
            <div class="container-fluid">

                @yield('main')

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer" @if(!$isAdmin) style="width: 100%;" @endif >
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>@include('partials.copyright')</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.forms-wrapper -->

    </div>
    <!-- /#wrapper -->

@endsection

@section('footer')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

@endsection

@section('bottom')
    <script src="{{ asset('js/admin/template.js') }}"></script>
@endsection
