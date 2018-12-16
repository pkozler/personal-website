@extends('layouts.admin.cms')

@section('page', !$note ? 'Nový text' : 'Úprava textu')

@section('main')

<div class="card my-3 mx-3">

    <div class="card-header">

        <div class="row">
            <div class="col-10">
                <h3> @if($note) {{ "Text #{$note->id}" }} @else Nový text @endif </h3>
            </div>

            <div class="col-2 text-right">
                <a class="btn btn-outline-secondary" href="{{ route('admin.notes') }}"><i class="fas fa-window-close fa-fw"></i></a>
            </div>
        </div>

    </div>

    <div class="card-body">

        @if ($note)
            {!! Form::model($note, ['route' => ['admin.note.update', $note]]) !!}
        @else
            {!! Form::open(['route' => ['admin.note.store']]) !!}
        @endif

        {{ Form::bsText('title', 'Typ položky v nadpisu', $note->title ?? '', ['required', 'autofocus']) }}
        {{ Form::bsTextArea('description', 'Detaily položky v odstavci', $note->description ?? '', ['required']) }}
        {{ Form::bsText('figure', 'Ilustrace k typu položky', $note->figure ?? '') }}

        <hr>

        @if ($note)
            {{ Form::bsSubmit('Upravit') }}
        @else
            {{ Form::bsSubmit('Vytvořit') }}
        @endif

        {!! Form::close() !!}

    </div>

</div>

@endsection
