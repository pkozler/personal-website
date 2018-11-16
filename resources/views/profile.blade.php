@extends('layouts.logged')

@section('title')
	<h3>Profil</h3><hr/>
@endsection

@section('content')

<ul>
	<li><strong>Jméno: </strong>{{ Auth::user()->name }}</li>
	<li><strong>E-mail: </strong>{{ Auth::user()->email }}</li>
	<li><strong>Registrovaný od: </strong>{{ Auth::user()->created_at }}</li>
	<li><strong>Role: </strong>{{ Auth::user()->role }}</li>
</ul>

<h5>Odeslané vzkazy:</h5>

@foreach (Auth::user()->messages() as $message)
	<hr/>
    <p><strong>{{ $message->title }}</strong><em>{{ $message->created_at }}</em></p>
    <p>{{ $message->text }}</p>
@endforeach

@endsection
