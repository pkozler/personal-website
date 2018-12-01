@extends('layouts.admin.cms')

@section('page', $currentSection->nav_title)

@section('main')

    <div class="card text-dark border-secondary bg-light mb-3">

            <div class="card-header">
                <h3>{{ $currentSection->nav_title }}</h3>
            </div>

            <div class="card-body">

                {!! Form::model($currentSection, ['route' => ['admin.section', $currentSection->id]]) !!}

                {{ Form::bsText('attr_id', 'Textové ID sekce v HTML kódu stránky', $currentSection->attr_id, ['required', 'autofocus']) }}

                {{ Form::bsText('nav_title', 'Název sekce v položce menu', $currentSection->nav_title, ['required']) }}

                {{ Form::bsText('heading', 'Nadpis obsahu sekce', $currentSection->heading) }}

                {{ Form::bsText('paragraph', 'Hlavní obsah sekce', $currentSection->paragraph) }}

                {{ Form::bsText('next_label', 'Popis odkazu do další sekce', $currentSection->next_label) }}

                {{ Form::bsText('bg_image_path', 'Cesta k obrázku pro umístění na pozadí', $currentSection->bg_image_path) }}

                <hr>

                {{ Form::bsSubmit('Uložit', ['class' => 'btn btn-info btn-block']) }}

                {!! Form::close() !!}

            </div>
    </div>

@endsection
