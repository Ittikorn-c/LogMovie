@extends('layouts.empty')

@section('title', 'LogMovie - Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="lm-card-form lm-card-single">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="lm-logo">L</div>
                        <div class="heading d-flex justify-content-center align-items-center">
                            <h3 class="font-weight-bold">Reset Password</h3>
                        </div>

                        <div class="text-secondary py-3 text-center">
                            Just type in your info and it's done. Great
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
                                   required autofocus>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Password Confirmation</label>
                            <input id='password-confirm' name="password_confirmation" type="password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                   required autofocus>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning full-width">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
