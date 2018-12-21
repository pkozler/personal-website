@extends('layouts.admin.cms')

@section('page', 'Popisy sekcí')

@section('main')

    @include('partials.admin.flash')

    @foreach ($sectionList as $section)
        <div class="card mb-3 my-3 mx-3">
            <a class="btn btn-outline-primary text-dark px-0 py-0" href="{{ route('admin.section.edit', ['section' => $section]) }}">

                <div class="card-header text-center">
                        <h3> {{ $section->nav_title }} </h3>
                </div>

                <div class="card-body text-center">
                        <h3 class="card-title">{{ str_limit($section->heading, 32) }}</h3>
                        <p class="card-text">{{ str_limit($section->paragraph, 64) }}</p>
                        <p><strong>{{ $section->next_label }}</strong></p>
                </div>

            </a>
        </div>
    @endforeach

@endsection
