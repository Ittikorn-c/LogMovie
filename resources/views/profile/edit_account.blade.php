@extends('layouts.profile')

@section('main')
    @if (session('success'))
        <script>swal("Success!", "{{session('success')}}", "success");</script>
    @endif

    <div class="col-md-8 ml-md-3 my-md-5 p-5 box-shadow bg-white rounded align-self-baseline">
        <form method="post" class="" action="">
            @csrf
            @method('PUT')
            <h4 class="mb-4 font-weight-light">Account Settings</h4>
            <div class="mb-3">
                <label for="displayName">Display Name</label>
                <div class="input-group">
                    <input id="displayName" class="form-control" type="text" name="name"
                           value="{{$user->name}}" required autofocus>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-at text-secondary"></i></span>
                    </div>
                    <input id="email" class="form-control" type="email" name="email"
                           value="{{$user->email}}" disabled="{{$user->socialAccount? 'disabled':''}}" required>
                </div>
                @if($user->socialAccount)
                    <small class="text-secondary">Disabled because your account is linked</small>
                @endif
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
        <div class="mb-3 text-muted py-3 stripe">
            We don't share your email with anyone ! ( '.' ) !
        </div>
    </div>
@endsection
