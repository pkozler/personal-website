@extends('layouts.admin.cms')

@section('page', 'obsah sekcí')

@section('main')

    @include('partials.admin.flash')

    @foreach ($sectionList as $section)
        <div class="card mb-3 my-3 mx-3">
                <a class="btn btn-outline-info text-dark bg-light" href="{{ route('admin.section.edit', ['section' => $section]) }}">

            <div class="card-header">
                    <p class="lead"><strong>{{ $section->nav_title }}</strong> | <em>{{ $section->attr_id }}</em></p>
            </div>

            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title">{{ str_limit($section->heading, 32) }}</h3>
                    <p class="card-text">{{ str_limit($section->paragraph, 64) }}</p>
                    <p><strong>{{ $section->next_label }}</strong></p>
                    <p><em>{{ $section->bg_image_path }}</em></p>
                </div>
            </div>

            </a>
        </div>
    @endforeach

@endsection
