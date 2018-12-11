@extends('layouts.app')

@php
    $adminActive = starts_with(\Illuminate\Support\Facades\Route::currentRouteName(), 'admin');
    $logActive = starts_with(\Illuminate\Support\Facades\Route::currentRouteName(), 'log');
@endphp

@section('title')
    {{ $logActive ? 'Záznam aktivity' : 'Administrace' }} | @include('partials.brand') - @yield('page')
@endsection

@section('head')
    @include('partials.admin.style')
@endsection

@section('top') id="page-top" @endsection

@section('navbar')
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <button {{ $adminActive ?: 'disabled' }} class="btn btn-link text-secondary" id="sidebarToggle" href="#">
            <span class="navbar-brand text-info">@include('partials.brand')</span>
            {{--<i class="fas fa-bars"></i>--}}
        </button>
        <span hidden class="fa-divide text-dark"></span>
        {{--<span class="text-white mr-auto">@yield('screen')</span>--}}

        <ul class="navbar-nav mr-auto ml-md-0">
            <li class="nav-item">
                <a class="nav-link {{ $logActive ?: 'active' }}" href="{{ route('admin') }}"><i class="fas fa-sliders-h">&nbsp;</i>Administrace</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $adminActive ?: 'active' }}" href="{{ route('log') }}"><i class="fas fa-history">&nbsp;</i>Záznamy</a>
            </li>
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
        @if ($logActive)
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('log') }}">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Výpis</span>
                </a>
            </li>
        @elseif ($adminActive)
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-list-ol"></i>
                    <span>Náhled sekcí</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Popisy</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Úvodní sekce:</h6>

                    @php($sectionMenu = \App\Section::all())
                    @foreach ($sectionMenu as $sectionItem)
                        <a class="dropdown-item text-info" href="{{ route('admin.section', ['id' => $sectionItem->id]) }}">{{ $sectionItem->nav_title }}</a>

                        @if ($loop->first)
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Ostatní sekce:</h6>
                        @endif
                    @endforeach
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.notes') }}">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Články</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.images') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Obrázky</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.links') }}">
                    <i class="fas fa-fw fa-link"></i>
                    <span>Odkazy</span></a>
            </li>
        @endif

    </ul>

    <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><strong>{{ $logActive ? 'Záznam aktivity' : 'Administrace' }}</strong></li>
                @if ($adminActive)
                    <li class="breadcrumb-item active"><strong>@yield('page')</strong></li>
                @endif
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

{{--<!-- Logout Modal-->--}}
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
    @include('partials.admin.script')
@endsection
