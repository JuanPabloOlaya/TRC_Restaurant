@extends('menu')

@section('textoAqui')
<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="{{ route('login') }}" method="POST" class="shadow p-3 mb-5 bg-white rounded" id="form-login">
                @csrf
                <div class="form-group row">
                    <img src="{{ asset('css/svg/person.svg') }}" class="rounded mx-auto d-block" width="150" height="150" alt="...">
                </div>
                <h1 class="center">Login</h1>
                <br>
                <div class="form-group row">
                    <div class="col">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-outline-dark btn-lg btn-block">
                            {{ __('Log In') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="btn btn-outline-primary btn-lg btn-block">
                            <a href="{{ route('register') }}">{{ __('Sign In')}}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
