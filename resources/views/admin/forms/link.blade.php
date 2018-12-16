@extends('layouts.admin.cms')

@section('page', !$link ? 'Nový odkaz' : 'Úprava odkazu')

@section('main')

<div class="card my-3 mx-3">

    <div class="card-header">

        <div class="row">
            <div class="col-10">
                <h3> @if($link) {{ "Odkaz #{$link->id}" }} @else Nový odkaz @endif </h3>
            </div>

            <div class="col-2 text-right">
                <a class="btn btn-outline-secondary" href="{{ route('admin.links') }}"><i class="fas fa-window-close fa-fw"></i></a>
            </div>
        </div>

    </div>

    <div class="card-body">

        @if ($link)
            {!! Form::model($link, ['route' => ['admin.link.update', $link]]) !!}
        @else
            {!! Form::open(['route' => ['admin.link.store']]) !!}
        @endif

        {{ Form::bsText('attr_ref', 'Hypertextový odkaz', $link->attr_ref ?? '', ['required', 'autofocus']) }}
        {{ Form::bsText('text_val', 'Popis odkazu', $link->text_val ?? '', ['required']) }}
        {{ Form::bsText('attr_id', 'Textové ID odkazu', $link->attr_id ?? '') }}
        {{ Form::bsText('attr_icon', 'Ikona nad odkazem', $link->attr_icon ?? '') }}

        <hr>

        @if ($link)
            {{ Form::bsSubmit('Upravit') }}
        @else
            {{ Form::bsSubmit('Vytvořit') }}
        @endif

        {!! Form::close() !!}

    </div>

</div>

@endsection
