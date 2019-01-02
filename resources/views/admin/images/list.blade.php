@extends('layouts.admin.content.list')

@section('list_name', 'Seznam obrázků')

@section('list_keys')
    <th>Obrázek</th>
    <th>Název</th>
    <th>Kategorie</th>
    <th colspan="2"></th>
@endsection

@section('list_values')

    @foreach($imageList as $image)
        <tr>
            <td class="text-monospace"><img class="h-25 img-thumbnail" src="{{ asset("storage/$uploadConfig->thumbnails/$image->path") }}"></td>
            <td>{{ str_limit($image->label_name) }}</td>
            <td>{{ str_limit($image->label_category) }}</td>

            <td>
                <a class="btn btn-outline-warning" href="{{ route("admin.$contentType.edit", ['image' => $image]) }}"><i class="fa fa-pen"></i></a></td>
            <td>
                <div>
                    {!! Form::model($image, ['route' => ["admin.$contentType.destroy", $image], 'method' => 'POST']) !!}
                    @method('DELETE')
                    {{ Form::button('<i class="fa fa-eraser"></i>', ['type' => 'submit','class' => 'btn btn-outline-danger', 'onclick' => "return confirm('Odstranit obrázek #{$image->id}?');"]) }}
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
