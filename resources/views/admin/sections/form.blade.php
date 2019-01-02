@extends('layouts.admin.content.form')

@section('form_name')

    {{ "Popis sekce #{$section->id}" }}

@endsection

@section('form_inputs')

    {!! Form::model($section, ['route' => ["admin.$contentType.update", $section], 'method' => 'POST']) !!}
    @method('PUT')

    {{ Form::bsText('attr_id', 'Textové ID sekce v HTML kódu stránky', old('attr_id'), ['required', 'autofocus']) }}

    {{ Form::bsText('nav_title', 'Název sekce v položce menu', old('nav_title'), ['required']) }}

    {{ Form::bsText('heading', 'Nadpis obsahu sekce', old('heading')) }}

    {{ Form::bsTextArea('paragraph', 'Hlavní obsah sekce', old('paragraph')) }}

    {{ Form::bsText('next_label', 'Popis odkazu do další sekce', old('next_label')) }}

    <hr>

    {{ Form::bsSubmit('Aktualizovat', ['class' => 'btn btn-primary btn-lg']) }}

    {!! Form::close() !!}

@endsection
