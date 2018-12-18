@extends('layouts.admin.cms')

@section('page', 'Seznam obrázků')

@section('main')

    @include('partials.admin.flash')

    <div class="card mb-3">

        <div class="card-header">
            <h3>Galerie projektů</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" width="100%" cellspacing="0">

                    <thead class="thead-light">
                    <tr>
                        <th>Obrázek</th>
                        <th>Název</th>
                        <th>Kategorie</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($imageList as $image)
                        <tr>
                            <td class="text-monospace"><img class="h-25 img-thumbnail" src="{{ asset("$thumbsPath/$image->path") }}"></td>
                            <td>{{ str_limit($image->label_name) }}</td>
                            <td>{{ str_limit($image->label_category) }}</td>
                            <td>
                                <a class="btn btn-outline-warning" href="{{ route('admin.image.edit', ['image' => $image]) }}"><i class="fa fa-pen"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($image, ['route' => ['admin.image.destroy', $image]]) !!}
                                    {{ Form::button('<i class="fa fa-eraser"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.image.create') }}"><i
                                    class="fa fa-plus"></i> Nová položka</a></td>
                        <td colspan="4"></td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
