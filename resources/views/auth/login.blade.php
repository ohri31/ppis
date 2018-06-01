@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <img src="https://images.unsplash.com/photo-1519781542704-957ff19eff00?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=c351475860e8248dcd543ebbba1aa24f&auto=format&fit=crop&w=1146&q=80" style="width: 100%;" />
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header" style="background-color:lightseagreen;">{{ __('Login') }}</div>
 
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" >
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>

                    <hr style="margin-top: 30px;"/>

                    <div class="col-md-12">
                        <a class="btn btn-primary" href="{{ url('/register') }}" style="width: 100%;">
                            Register your company
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
