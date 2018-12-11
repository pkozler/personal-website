@extends('layouts.admin.cms')

@section('page', 'obsah článků')

@section('main')

    @include('partials.admin.flash')

    @foreach ($noteList as $note)
        <div class="card mb-3">
            <a class="btn btn-outline-info text-dark" href="{{ route('admin.note', ['id' => $note->id]) }}">

                <div class="card-header">
                </div>

                <div class="card-body">
                </div>

            </a>
        </div>
    @endforeach

@endsection
