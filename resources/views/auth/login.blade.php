@extends('layouts.empty')

@section('title', 'LogMovie - Sign in')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="lm-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="lm-logo">L</div>
                        <div class="heading d-flex justify-content-between align-items-center">
                            <h4 class="font-weight-bold">Sign In</h4>
                            <div class="link-container">
                                <div>
                                    or
                                    <a href="{{route('register')}}" class="lm-sm-link">create an account</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id='email' name="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id='password' name="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   value="{{ old('password') }}" required autofocus>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>


                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>


                            </div>
                            <a class="lm-sm-link" href="{{ route('password.request') }}">
                                Trouble signing in?
                            </a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning full-width">
                                Sign in
                            </button>
                        </div>
                    </form>
                    <div class="awesome-divider-div">
                        <div class="awesome-divider" data-label="or"></div>
                    </div>

                    <a type="submit" class="btn btn-primary text-white full-width">
                        Sign in with Google
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection