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
                        <th>ID</th>
                        <th>Adresa</th>
                        <th>Popis</th>
                        <th>Ikona</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($linkList as $link)
                        <tr>
                            <td class="bg-light"><strong>{{ $link->attr_id }}</strong></td>
                            <td>{{ $link->attr_ref }}</td>
                            <td>{{ $link->text_val }}</td>
                            <td class="text-secondary">{{ $link->attr_icon }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.link.edit', ['link' => $link]) }}"><i class="fa fa-pencil-alt"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($link, ['route' => ['admin.link.destroy', $link]]) !!}
                                    {{ Form::button('<i class="fa fa-ban"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="bg-light" colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.link.create') }}"><i
                                    class="fa fa-pencil-alt"></i> nová položka</a></td>
                        <td colspan="4"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
