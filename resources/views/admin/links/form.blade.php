@extends('layouts.admin.main')

@section('form_name')

    @if($link)
        {{ "Úprava odkazu #{$link->id}" }}
    @else
        {{ "Nový odkaz" }}
    @endif

@endsection

@section('form_inputs')

    @if ($link)
        {!! Form::model($link, ['route' => ["admin.$contentType.update", $link]]) !!}
    @else
        {!! Form::open(['route' => ["$contentType.store"]]) !!}
    @endif

    {{ Form::bsText('attr_ref', 'Hypertextový odkaz', old('attr_ref'), ['required', 'autofocus']) }}

    {{ Form::bsText('text_val', 'Popis odkazu', old('text_val'), ['required']) }}

    {{ Form::bsText('attr_id', 'Textové ID odkazu', old('attr_id')) }}

    {{ Form::bsText('attr_icon', 'Ikona nad odkazem', old('attr_icon')) }}

    <hr>

    @if ($link)
        {{ Form::bsSubmit('Upravit') }}
    @else
        {{ Form::bsSubmit('Vytvořit') }}
    @endif

    {!! Form::close() !!}

@endsection
