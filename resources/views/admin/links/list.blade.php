@extends('layouts.admin.main')

@section('list_name', 'Seznam odkazů')

@section('list_keys')
    <th>Ikona</th>
    <th>ID</th>
    <th>Adresa</th>
    <th>Popis</th>
    <th colspan="2"></th>
@endsection

@section('list_values')

    @foreach($linkList as $link)
        <tr>
            <td><div style="font-size: 50px"><i class="{{ $link->attr_icon }}"></i></div></td>
            <td>{{ str_limit($link->attr_id) }}</td>
            <td>{{ str_limit($link->attr_ref) }}</td>
            <td>{{ str_limit($link->text_val) }}</td>

            <td>
                <a class="btn btn-outline-warning" href="{{ route("admin.$contentType.edit", ['link' => $link]) }}"><i class="fa fa-pen"></i></a></td>
            <td>
                <div>
                    {!! Form::model($link, ['route' => ["admin.$contentType.destroy", $link]]) !!}
                    {{ Form::button('<i class="fa fa-eraser"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'onclick' => "return confirm('Odstranit odkaz #{$link->id}?');"]) }}
                    {!! Form::close() !!}
                </div>
            </td>
        </tr>
    @endforeach

    <tr>
        <td colspan="1"><a class="btn btn-outline-success" href="{{ route("admin.$contentType.create") }}"><i
                    class="fa fa-plus"></i> Nová položka</a></td>
        <td colspan="5"></td>
    </tr>

@endsection
