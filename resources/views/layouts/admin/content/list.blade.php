@extends('layouts.admin.main')

@section('subtitle')
    @if(!$hasTable)
        @yield('list_name') (náhled)
    @else
        @yield('list_name')
    @endif
@endsection

@section('heading')
    <h3>
        @hasSection('list_name')
            @yield('list_name')
        @else
            {{ $pageDesc }}
        @endif
    </h3>
@endsection

@section('main')
    @if(!$hasTable)
        @yield('list_values')
    @else
        <div class="table-responsive">

            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        @yield('list_keys')
                    </tr>
                </thead>

                <tbody>
                    @yield('list_values')
                </tbody>
            </table>

        </div>
    @endif
@endsection
