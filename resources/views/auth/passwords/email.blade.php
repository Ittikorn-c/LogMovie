@extends('layouts.empty')

@section('title', 'LogMovie - Trouble Sign In')

@section('header')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="lm-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="lm-logo">L</div>
                        <div class="heading d-flex justify-content-center align-items-center">
                            <h3 class="font-weight-bold">Trouble Signing In ?</h3>
                        </div>
                        <div class="text-secondary py-3">
                            Don't worry, Just enter your email address and we'll send you a link
                            with which you can reset your password.
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
                            <button type="submit" class="btn btn-warning full-width">
                                Send Reset Link
                            </button>
                        </div>
                    </form>

                    <div class="link-container">
                        <div>
                            or
                            <a href="{{route('login')}}" class="lm-sm-link">go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
