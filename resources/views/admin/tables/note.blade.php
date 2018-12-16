@extends('layouts.admin.cms')

@section('page', 'Seznam textů')

@section('main')

    @include('partials.admin.flash')

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
                    @foreach($noteList as $note)
                        <tr>
                            <td><div style="font-size: 50px"><i class="{{ $note->figure }}"></i></div></td>
                            <td>{{ str_limit($note->title) }}</td>
                            <td>{{ str_limit($note->description) }}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('admin.note.edit', ['note' => $note]) }}"><i class="fa fa-pen"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($note, ['route' => ['admin.note.destroy', $note]]) !!}
                                    {{ Form::button('<i class="fa fa-eraser"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach

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
