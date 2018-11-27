@extends('layouts.admin.cms')

@section('screen', 'Záznamy přístupů')
@section('page', 'poslední aktivita')

@section('main')
    <p>{!! nl2br(e($logData)) !!}</p>
@endsection
