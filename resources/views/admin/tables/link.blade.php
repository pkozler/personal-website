@extends('layouts.admin.cms')

@section('page', 'Seznam odkazů')

@section('main')

    @include('partials.admin.flash')

    <div class="card mb-3">

        <div class="card-header">
            <h3>Kontaktní informace</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" width="100%" cellspacing="0">

                    <thead class="thead-light">
                    <tr>
                        <th>Ikona</th>
                        <th>ID</th>
                        <th>Adresa</th>
                        <th>Popis</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($linkList as $link)
                        <tr>
                            <td><div style="font-size: 50px"><i class="{{ $link->attr_icon }}"></i></div></td>
                            <td>{{ str_limit($link->attr_id) }}</td>
                            <td>{{ str_limit($link->attr_ref) }}</td>
                            <td>{{ str_limit($link->text_val) }}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('admin.link.edit', ['link' => $link]) }}"><i class="fa fa-pen"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($link, ['route' => ['admin.link.destroy', $link]]) !!}
                                    {{ Form::button('<i class="fa fa-eraser"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.link.create') }}"><i
                                    class="fa fa-plus"></i> Nová položka</a></td>
                        <td colspan="5"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
