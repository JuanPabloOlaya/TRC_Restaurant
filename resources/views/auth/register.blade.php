@extends('menu')

@section('textoAqui')
<div class="container-fluid">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="{{ route('register') }}" method="POST" class="shadow p-3 mb-5 bg-white rounded">
                @csrf
                <div class="form-group row">
                    <img src="{{ asset('css/svg/person.svg') }}" class="rounded mx-auto d-block" width="150" height="150" alt="...">
                </div>
                <br>
                <h1 class="center">{{ __('Sign In') }}</h1>
                <br>
                <div class="form-group row">
                    <div class="col">
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="rol">{{ __('Rol') }}</label>
                        <select name="rol" class="form-control @error('rol') is-invalid @enderror" required autocomplete="rol">
                            <option value="">Seleccione...</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Domiciliario">Domiciliario</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection
