@extends('layouts.admin.cms')

@section('page', "Sekce #{$currentSection->id}")

@section('main')

    <div class="card my-3 mx-3 border-info">

            <div class="card-header text-right">

                <div class="row">
                    <div class="offset-2 col-8">
                        <h3 class="text-center">Sekce #{{ $currentSection->id }}<br><span class="text-monospace">{{ $currentSection->attr_id }}</span></h3>
                    </div>

                    <div class="col-2">
                        <a class="btn btn-outline-dark" href="{{ route('admin.sections') }}"><i class="fas fa-window-close"></i></a>
                    </div>
                </div>

            </div>

            <div class="card-body font-weight-bold ">

                {!! Form::model($currentSection, ['route' => ['admin.section.update', $currentSection]]) !!}

                {{ Form::bsText('attr_id', 'Textové ID sekce v HTML kódu stránky', $currentSection->attr_id, ['required', 'autofocus']) }}

                {{ Form::bsText('nav_title', 'Název sekce v položce menu', $currentSection->nav_title, ['required']) }}

                {{ Form::bsText('heading', 'Nadpis obsahu sekce', $currentSection->heading) }}

                {{ Form::bsTextArea('paragraph', 'Hlavní obsah sekce', $currentSection->paragraph) }}

                {{ Form::bsText('next_label', 'Popis odkazu do další sekce', $currentSection->next_label) }}

                {{ Form::bsText('bg_image_path', 'Cesta k obrázku pro umístění na pozadí', $currentSection->bg_image_path) }}

                <hr>

                {{ Form::bsSubmit('Aktualizovat', ['class' => 'btn btn-info btn-lg']) }}

                {!! Form::close() !!}

            </div>
    </div>

@endsection
