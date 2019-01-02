@extends('layouts.admin.content.form')

@section('form_name')

    @if($image)
        {{ "Úprava obrázku #{$image->id}" }}
    @else
        {{ "Nový obrázek" }}
    @endif

@endsection

@section('form_inputs')

    @if ($image)
        {!! Form::model($image, ['route' => ["admin.$contentType.update", $image], 'method' => 'POST', 'files' => true]) !!}
        @method('PUT')
    @else
        {!! Form::open(['route' => ["admin.$contentType.store"], 'files' => true]) !!}
    @endif

    {{ Form::bsText('label_name', 'Název projektu', old('label_name'), ['required', 'autofocus']) }}

    {{ Form::bsText('label_category', 'Kategorie projektu', old('label_category')) }}

    @php ($attributes = $image ? [] : ['required'])
    {{ Form::bsFile('path', 'Screenshot projektu', old('path'), $attributes) }}

    <hr>

    @if ($image)
        {{ Form::bsSubmit('Upravit') }}
    @else
        {{ Form::bsSubmit('Vytvořit') }}
    @endif

    {!! Form::close() !!}

@endsection
