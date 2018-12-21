@extends('layouts.admin.cms')

@section('main')

    <div class="alert alert-info">
        {{ session('status') }}
    </div>

    <div class="card mb-3">

        <div class="card-header">
            <h3>Seznam dovedností</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" width="100%" cellspacing="0">

                    <thead class="thead-light">
                    <tr>
                        <th>Ilustrace</th>
                        <th>Název</th>
                        <th>Detail</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td><div style="font-size: 50px"><i class="{{  }}"></i></div></td>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('') }}"><i class="fa fa-pen"></i></a></td>
                            <td>
                                <div>
                                </div>
                            </td>
                        </tr>

                    <tr>
                        <td colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.note.create') }}"><i
                                    class="fa fa-plus"></i> Nová položka</a></td>
                        <td colspan="4"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
