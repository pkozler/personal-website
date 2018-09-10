@extends('layouts.logged')

@section('title')
	<h3>Profil</h3><hr/>
@endsection

@section('content')

<ul>
	<li><strong>Jméno: </strong>{{ Auth::user()->name }}</li>
	<li><strong>E-mail: </strong>{{ Auth::user()->email }}</li>
	<li><strong>Role: </strong>{{ Auth::user()->role }}</li>
	<li><strong>Registrovaný od: </strong>{{ Auth::user()->created_at }}</li>
</ul>

<p><strong>Odeslané vzkazy:</strong></p>



@endsection
