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
                        <th>Název</th>
                        <th>Detail</th>
                        <th>Ilustrace</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($noteList as $note)
                        <tr>
                            <td class="bg-light"><strong>{{ str_limit($note->title, 32) }}</strong></td>
                            <td>{{ str_limit($note->description, 128) }}</td>
                            <td class="text-secondary">{{ $note->figure }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.note.edit', ['note' => $note]) }}"><i class="fa fa-pencil-alt"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($note, ['route' => ['admin.note.destroy', $note]]) !!}
                                    {{ Form::button('<i class="fa fa-ban"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="bg-light" colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.note.create') }}"><i
                                    class="fa fa-pencil-alt"></i> nová položka</a></td>
                        <td colspan="4"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
