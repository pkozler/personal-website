@extends('layouts.admin.main')

@section('heading')
    <h3>Nastavení účtu:</h3>
@endsection

@section('main')

    @include('partials.admin.flash')

            @if ($account)
                <dl class="row">
                    <dt class="col-sm-3">Nickname</dt>
                    <dd class="col-sm-9">{{ $account->name }}</dd>

                    <dt class="col-sm-3">E-mail</dt>
                    <dd class="col-sm-9">{{ $account->email }}</dd>

                    <dt class="col-sm-3">Aktivovaný přístup</dt>
                    <dd class="col-sm-9">{{ $account->is_admin ? 'ano' : 'ne' }}</dd>

                    <dt class="col-sm-3">Naposledy změněno</dt>
                    <dd class="col-sm-9">{{ Carbon\Carbon::parse($account->updated_at)->format('d-m-Y H:i:s') }}</dd>
                </dl>
            @else
                <p class="text-primary">Není k dispozici...</p>
            @endif

@endsection
