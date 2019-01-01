@extends('layouts.admin.main')

@section('form_name')

    @if($image)
        {{ "Úprava obrázku #{$image->id}" }}
    @else
        {{ "Nový obrázek" }}
    @endif

@endsection

@section('form_inputs')

    @if ($image)
        {!! Form::model($image, ['route' => ["admin.$contentType.update", $image], 'files' => true]) !!}
    @else
        {!! Form::open(['route' => ["$contentType.store"], 'files' => true]) !!}
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
