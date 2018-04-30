@extends('layouts.empty')

@section('title', 'LogMovie - Sing Up')

@section('content')
    <div class="">
        <div class="d-flex justify-content-center lm-register">
            <div class="col-lg-6 d-none d-md-block left-side">
                <h3 class="logo">
                    LOGMOVIE
                </h3>
                <h2 class="pitch">
                    WHY SIGN UP?
                </h2>
                <div class="text-container">
                    <ul>
                        <li>Keep Personal collection of movies list</li>
                        <li>View your favourite movie info</li>
                        <li>Get curated movies lists by our community</li>
                    </ul>
                </div>
                <div class="image-container">
                    <img src="{{url('/image/static/Drawing.png')}}" alt="abstract">
                </div>
            </div>
            <div class="col-lg-6 lm-card-form right-side">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center pb-3">
                        <h4 class="font-weight-bold">Sign Up</h4>
                        <div class="link-container">
                            or
                            <a href="{{route('login')}}" class="lm-sm-link"> sign in</a>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input id='name' name="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
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
                            <div class="d-flex justify-content-between">
                                <label class="d-flex justify-content-between" for="password">
                                    Password
                                </label>
                                <span id="show-password" class="show-password"><i
                                            class="fa fa-eye"></i></span>
                            </div>
                            <input id='password' name="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   autocomplete="false" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Your password must be 8-20 characters long.
                            </small>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                        </div>

                        <div class="form-group pt-3">
                            <button type="submit" class="btn btn-warning full-width">
                                Create free Account
                            </button>
                        </div>
                    </form>
                    <div class="awesome-divider-div">
                        <div class="awesome-divider" data-label="or"></div>
                    </div>

                    <a href="{{url('/auth/google')}}" class="btn btn-primary text-white full-width">
                        Sign in with Google
                    </a>

                    <p class="text-center text-secondary small pt-4">By signing up, you agree to the
                        <a class="btn-link " href="#">Terms of Use</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        let showPassword = $('#show-password');
        let opacity = showPassword.css('opacity');
        showPassword.click(function () {
            let password = $('#password');
            if (password.attr('type') === 'password') {
                password.attr('type', 'text');
                showPassword.css("opacity", "1");
            } else {
                password.attr('type', 'password');
                showPassword.css("opacity", opacity);
            }
        })
    </script>
@endsection
