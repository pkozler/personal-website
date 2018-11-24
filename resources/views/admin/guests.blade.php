@extends('layouts.admin.cms')

@section('screen', 'Záznamy přístupů')
@section('page', 'poslední aktivita')

@section('navlinks')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}"><i class="fas fa-sliders-h">&nbsp;</i>Administrace</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('admin.log') }}"><i class="fas fa-history">&nbsp;</i>Záznamy</a>
    </li>
@endsection

@section('main')



@endsection
