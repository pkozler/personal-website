@extends('layouts.admin.auth')

@section('form_card', 'card-login')

@section('page', 'Přihlášení uživatele')

@section('auth_form')
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf

        <div class="form-group">
            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail') }}" required="required" autofocus="autofocus">
                <label for="inputEmail">{{ __('E-mail') }}</label>
            </div>

            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Heslo') }}" required="required">
                <label for="inputPassword">{{ __('Heslo') }}</label>
            </div>

            @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('Pamatovat heslo') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ __('Přihlásit se') }}</button>
    </form>
@endsection

@section('foot_nav')
    {{--<a class="d-block small mt-3" href="{{ route('register') }}">{{ __('Založit účet') }}</a>--}}
    {{--<a class="d-block small mt-3" href="{{ route('password.email') }}">{{ __('Zapomenuté heslo') }}</a>--}}
@endsection
