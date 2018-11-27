@extends('layouts.admin.cms')

@section('screen', 'Administrační rozhraní')
@section('page', 'základní nastavení')

@section('main')

    @isset($success)
        <div class="alert alert-info" role="alert">{{ $success }}</div>
    @endisset

    @php($sectionList = \App\Section::all())
    @foreach ($sectionList as $section)
            <div class="card mb-3"><a class="btn btn-outline-info" href="{{ route('admin.section', ['id' => $section->id]) }}">

                <div class="card-header">
                        <p class=" lead"><strong>{{ $section->nav_title }}</strong> | <em>{{ $section->attr_id }}</em></p>
                </div>

                <div class="card-body">
                    <div class="text-center text-dark">
                        <h3 class="card-title">{{ str_limit($section->heading, 32) }}</h3>
                        <p class="card-text">{{ str_limit($section->paragraph, 64) }}</p>
                        <p><strong>{{ $section->next_label }}</strong></p>
                        <p class="text-secondary"><em>{{ $section->bg_image_path }}</em></p>
                    </div>
                </div>

                </a>
            </div>
    @endforeach

@endsection
