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
            <div class="card-header">{{ __('Přihlášení') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-md-right">{{ __('E-mailová adresa') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Heslo') }}</label>

                        <div class="col-md-7">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3 offset-md-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Pamatovat si mě') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4 text-md-right">
                            <a class="btn-link" href="{{ route('password.request') }}"><span class="text-primary">{{ __('Zapomenuté heslo?') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <div class="col-md-7 offset-md-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Přihlásit se') }}
                            </button>
                            <a class="btn btn-secondary" href="{{ route('register') }}">
                                {{ __('Vytvořit účet') }}
                            </a>
                            <a class="btn btn-light pull-right" href="{{ route('home') }}">
                                {{ __('Zrušit') }}
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