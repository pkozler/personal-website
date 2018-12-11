@extends('layouts.admin.cms')

@section('page', 'obsah obrázků')

@section('main')

    @include('partials.admin.flash')

    @foreach ($imageList as $image)
        <div class="card mb-3">
            <a class="btn btn-outline-info text-dark" href="{{ route('admin.image', ['id' => $image->id]) }}">

                <div class="card-header">
                </div>

                <div class="card-body">
                </div>

            </a>
        </div>
    @endforeach

@endsection
