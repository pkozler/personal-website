@extends('layouts.admin.main')

@section('list_name', 'Seznam textů')

@section('list_keys')
    <th>Ilustrace</th>
    <th>Název</th>
    <th>Detail</th>
    <th colspan="2"></th>
@endsection

@section('list_values')

    @foreach($noteList as $note)
        <tr>
            <td><div style="font-size: 50px"><i class="{{ $note->figure }}"></i></div></td>
            <td>{{ str_limit($note->title) }}</td>
            <td>{{ str_limit($note->description) }}</td>

            <td>
                <a class="btn btn-outline-warning" href="{{ route("admin.$contentType.edit", ['note' => $note]) }}"><i class="fa fa-pen"></i></a></td>
            <td>
                <div>
                    {!! Form::model($note, ['route' => ["admin.$contentType.destroy", $note]]) !!}
                    {{ Form::button('<i class="fa fa-eraser"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'onclick' => "return confirm('Odstranit text #{$note->id}?');"]) }}
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach

    <tr>
        <td colspan="1"><a class="btn btn-outline-success" href="{{ route("admin.$contentType.create") }}"><i
                    class="fa fa-plus"></i> Nová položka</a></td>
        <td colspan="4"></td>
    </tr>

@endsection
