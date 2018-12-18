@extends('layouts.admin.cms')

@section('page', !$image ? 'Nový obrázek' : 'Úprava obrázku')

@section('main')

<div class="card my-3 mx-3">

    <div class="card-header">

        <div class="row">
            <div class="col-10">
                <h3> @if($image) {{ "Obrázek #{$image->id}" }} @else Nový obrázek @endif </h3>
            </div>

            <div class="col-2 text-right">
                <a class="btn btn-outline-secondary" href="{{ route('admin.images') }}"><i class="fas fa-window-close fa-fw"></i></a>
            </div>
        </div>

    </div>

    <div class="card-body">

        @if ($image)
            {!! Form::model($image, ['route' => ['admin.image.update', $image], 'files' => true]) !!}
        @else
            {!! Form::open(['route' => ['admin.image.store'], 'files' => true]) !!}
        @endif

        {{ Form::bsText('label_name', 'Název projektu', $image->label_name ?? '', ['required', 'autofocus']) }}
        {{ Form::bsText('label_category', 'Kategorie projektu', $image->label_category ?? '') }}
        {{ Form::bsFile('path', 'Screenshot projektu', $image->path ?? '', ['required']) }}

        <hr>

        @if ($image)
            {{ Form::bsSubmit('Upravit') }}
        @else
            {{ Form::bsSubmit('Vytvořit') }}
        @endif

        {!! Form::close() !!}

    </div>

</div>

@endsection
