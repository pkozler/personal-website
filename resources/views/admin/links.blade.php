@extends('layouts.admin.cms')

@section('page', 'obsah odkazů')

@section('main')

    @include('partials.admin.flash')

    @foreach ($linkList as $link)
        <div class="card mb-3">
            <a class="btn btn-outline-info text-dark" href="{{ route('admin.link', ['id' => $link->id]) }}">

                <div class="card-header">
                </div>

                <div class="card-body">
                </div>

            </a>
        </div>
    @endforeach

@endsection
