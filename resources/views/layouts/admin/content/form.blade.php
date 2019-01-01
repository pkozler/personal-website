@extends('layouts.admin.main')

@section('subtitle')
    @yield('form_name')
@endsection

@section('heading')
    <div class="row">
        @hasSection('form_name')
            <div class="col-10">
                <h3>
                    @yield('form_name')
                </h3>
            </div>

            <div class="col-2 text-right">
                @include('partials.admin.cancel', ['listRoute' => route("admin.$contentType.index")])
            </div>
        @endif
    </div>
@endsection

@section('main')
    @yield('form_inputs')
@endsection
