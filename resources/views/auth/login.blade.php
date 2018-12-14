@extends('layouts.admin.auth')

@section('form_card', 'card-login')

@section('page', 'Přihlášení do aplikace')

@section('auth_form')

    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf

        <div class="form-group">
            <label for="inputEmail">E-mail:</label>
            <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email@example.com" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="inputPassword">Heslo:</label>
            <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="*****" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>

        {{--<div class="form-group form-check">--}}
            {{--<label class="form-check-label">--}}
                {{--<input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Zapamatovat heslo--}}
            {{--</label>--}}
        {{--</div>--}}

        <button type="submit" class="btn btn-primary">Přihlásit se</button>
    </form>

@endsection

@section('foot_nav')
    {{--<a class="d-block small mt-3" href="{{ route('register') }}">{{ __('Založit účet') }}</a>--}}
    {{--<a class="d-block small mt-3" href="{{ route('password.email') }}">{{ __('Zapomenuté heslo') }}</a>--}}
@endsection
