@extends('layouts.admin.cms')

@section('page', 'výpis')

@section('main')
    <p>{!! nl2br(e($logData)) !!}</p>
@endsection
