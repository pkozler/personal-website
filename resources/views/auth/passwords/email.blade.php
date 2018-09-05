@extends('layouts.app')

@section('navbar')

<a class="navbar-brand js-scroll-trigger" href="#">www.petrkozler.cz</a>
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home') }}"><span class="fa fa-home"></span>&nbsp;{{ __('Domů') }}</a>
  </li>
</ul>

@endsection

@section('header')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card bg-dark text-white">
            <div class="card-header">{{ __('Ztráta hesla') }}</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mailová adresa') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-7 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Odeslat odkaz pro obnovu') }}
                            </button>
                            <a class="btn btn-light pull-right" href="{{ route('login') }}">
                                {{ __('Zpět') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<div class="col-md-12 text-center">
    @include('common.copyright')
</div>

@endsection