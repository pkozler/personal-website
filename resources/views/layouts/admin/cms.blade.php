@extends('layouts.app')

@section('title')
    @yield('screen') | @include('partials.brand') - @yield('page')
@endsection

@section('head')

    <!-- Plugin CSS -->
    <link href="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('storage/css/sb-admin.min.css') }}" rel="stylesheet">

@endsection

@section('top') id="page-top" @endsection

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <button class="btn btn-link text-secondary" id="sidebarToggle" href="#">
            <span class="navbar-brand text-info">@include('partials.brand')</span>
            {{--<i class="fas fa-bars"></i>--}}
        </button>
        <span class="fa-divide text-dark"></span>
        {{--<span class="text-white mr-auto">@yield('screen')</span>--}}

        <ul class="navbar-nav mr-auto ml-md-0">
            @yield('navlinks')
        </ul>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fw fa-home">&nbsp;</i>Domů</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-info" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
@endsection

@section('content')

<div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="login.html">Login</a>
                <a class="dropdown-item" href="register.html">Register</a>
                <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.html">404 Page</a>
                <a class="dropdown-item" href="blank.html">Blank Page</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>
    </ul>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><strong>@yield('screen')</strong></li>
                <li class="breadcrumb-item active"><strong>@yield('page')</strong></li>
            </ol>

            @yield('main')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>@include('partials.copyright')</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

@endsection

@section('footer')
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
{{--<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>--}}
                {{--<button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">×</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
                {{--<a class="btn btn-primary" href="login.html">Logout</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@endsection

@section('bottom')

    <!-- Plugin JavaScript -->
        <script src="{{ asset('storage/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('storage/vendor/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('storage/vendor/datatables/dataTables.bootstrap4.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ asset('storage/js/sb-admin.min.js') }}"></script>

@endsection