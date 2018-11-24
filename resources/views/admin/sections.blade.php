@extends('layouts.admin.cms')

@section('screen', 'Administrační rozhraní')
@section('page', 'základní nastavení')

@section('navlinks')
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('admin') }}"><i class="fas fa-sliders-h">&nbsp;</i>Administrace</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.log') }}"><i class="fas fa-history">&nbsp;</i>Záznamy</a>
    </li>
@endsection

@section('main')

    <!-- Area Chart Example-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Seznam sekcí</div>
        <div class="card-body">

            @if (!$sections)
                <p>Zatím žádná data...</p>
            @else
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Odkaz</th>
                            <th>Název</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($sections as $section)
                            <tr>

                                <td>{{ $section->id }}</td>
                                <td>{{ $section->id_attr }}</td>
                                <td>{{ $section->nav_title}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
        {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
    </div>
    </div>

@endsection
