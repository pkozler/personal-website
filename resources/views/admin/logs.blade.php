@extends('layouts.admin.main')

@section('heading')
    <h6>Seznam posledních zaznamenaných přístupů ve formátu:</h6>
    <pre>{{ '<datum>' }}<span class="text-black-50">_</span>{{ '<čas>' }}<span class="text-black-50">_</span>{{ '<IPv6>' }}</pre></p>
@endsection

@section('main')
    <pre>{!! nl2br(e($logData)) !!}</pre>
@endsection
