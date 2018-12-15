@extends('layouts.admin.cms')

@section('page', 'Seznam fotografií')

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
                        <th>Projekt</th>
                        <th>Kategorie</th>
                        <th>Obrázek</th>
                        <th colspan="2"></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($imageList as $image)
                        <tr>
                            <td>{{ str_limit($image->label_name, 64) }}</td>
                            <td class="text-secondary">{{ str_limit($image->label_category, 64) }}</td>
                            <td class="text-monospace"><strong>{{ str_limit($image->path) }}</strong></td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('admin.image.edit', ['image' => $image]) }}"><i class="fa fa-pencil-alt"></i></a></td>
                            <td>
                                <div>
                                    {!! Form::model($image, ['route' => ['admin.image.destroy', $image]]) !!}
                                    {{ Form::button('<i class="fa fa-ban"></i>', ['class' => 'btn btn-outline-danger']) }}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="bg-light" colspan="1"><a class="btn btn-outline-success" href="{{ route('admin.image.create') }}"><i
                                    class="fa fa-pencil-alt"></i> nová položka</a></td>
                        <td colspan="4"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection
