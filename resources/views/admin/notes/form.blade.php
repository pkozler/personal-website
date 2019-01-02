@extends('layouts.admin.content.form')

@section('form_name')

    @if($note)
        {{ "Úprava textu #{$note->id}" }}
    @else
        {{ "Nový text" }}
    @endif

@endsection

@section('form_inputs')

    @if ($note)
        {!! Form::model($note, ['route' => ["admin.$contentType.update", $note], 'method' => 'POST']) !!}
        @method('PUT')
    @else
        {!! Form::open(['route' => ["admin.$contentType.store"]]) !!}
    @endif

    {{ Form::bsText('title', 'Typ položky v nadpisu', old('name'), ['required', 'autofocus']) }}

    {{ Form::bsTextArea('description', 'Detaily položky v odstavci', old('description'), ['required']) }}

    {{ Form::bsText('figure', 'Ilustrace k typu položky', old('figure')) }}

    <hr>

    @if ($note)
        {{ Form::bsSubmit('Upravit') }}
    @else
        {{ Form::bsSubmit('Vytvořit') }}
    @endif

    {!! Form::close() !!}

@endsection
