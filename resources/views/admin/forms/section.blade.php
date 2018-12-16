@extends('layouts.admin.cms')

@section('page', "Úprava popisu sekce")

@section('main')

<div class="card my-3 mx-3">

    <div class="card-header">

        <div class="row">
            <div class="col-10">
                <p class="lead mb-0"><strong> {{ "Sekce #{$section->id}" }} </strong></p>
            </div>

            <div class="col-2 text-right">
                <a class="btn btn-outline-secondary" href="{{ route('admin.sections') }}"><i class="fas fa-window-close fa-fw"></i></a>
            </div>
        </div>

    </div>

    <div class="card-body">

        {!! Form::model($section, ['route' => ['admin.section.update', $section]]) !!}

        {{ Form::bsText('attr_id', 'Textové ID sekce v HTML kódu stránky', $section->attr_id, ['required', 'autofocus']) }}

        {{ Form::bsText('nav_title', 'Název sekce v položce menu', $section->nav_title, ['required']) }}

        {{ Form::bsText('heading', 'Nadpis obsahu sekce', $section->heading) }}

        {{ Form::bsTextArea('paragraph', 'Hlavní obsah sekce', $section->paragraph) }}

        {{ Form::bsText('next_label', 'Popis odkazu do další sekce', $section->next_label) }}

        {{ Form::bsText('bg_image_path', 'Cesta k obrázku pro umístění na pozadí', $section->bg_image_path) }}

        <hr>

        {{ Form::bsSubmit('Aktualizovat', ['class' => 'btn btn-primary btn-lg']) }}

        {!! Form::close() !!}

    </div>

</div>

@endsection
