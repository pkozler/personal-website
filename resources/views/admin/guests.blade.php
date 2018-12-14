@extends('layouts.admin.cms')

@section('page', 'Kniha návštěv')

@section('main')

    <div class="card mb-3">
        <div class="card-header">
            <p>Seznam posledních zaznamenaných přístupů ve formátu:
            <pre>{{ '<datum>' }}<span class="text-black-50">_</span>{{ '<čas>' }}<span class="text-white-50">_</span>{{ '<IPv6>' }}</pre> </p>
        </div>

        <div class="card-body">
            <pre>{!! nl2br(e($logData)) !!}</pre>
        </div>
    </div>

@endsection
