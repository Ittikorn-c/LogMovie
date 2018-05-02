@extends('layouts.profile')

@section('main')
    <div class="col-md-8 ml-md-3 my-md-5 p-5 box-shadow bg-white rounded align-self-baseline">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form name="edit-profile" method="post" action="{{route('profile.update', Auth::id())}}">
            @csrf
            @method('PUT')
            <h4 class="mb-4 font-weight-light">General Info</h4>
            <div class="mb-3">
                <label for="birthday">Date of Birth <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                    <input id="birthday" class="form-control" type="date" name="birthday"
                           value="{{$user->profile->birthday? $user->profile->birthday->format("Y-m-d"): null}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="location">location <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                    <input id="location" class="form-control" type="text" name="location"
                           value="{{$user->profile->location}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="gender">Gender <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                    <select name="gender" id="gender" class="form-control" autocomplete="off">
                        @foreach(['not specified', 'male', 'female', 'non-binary'] as $gender)
                            <option {{$gender == $user->profile->gender? "selected=selected":""}}
                                    value="{{$gender == 'not specified'? null : $gender}}">{{$gender}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="available_at">Also available At <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input class="form-control" placeholder="eg. facebook.com/example or email" type="text"
                           name="available_at"
                           value="{{$user->profile->available_at}}">
                </div>
            </div>
            <hr>
            <h4 class="mb-4 font-weight-light">Other</h4>
            <div class="mb-3">
                <label for="about_me">About Me <span class="text-muted">(Optional)</span></label>
                <textarea id="about_me" class="form-control" rows="5"
                          name="about_me">{{$user->profile->about_me? $user->profile->about_me : ''}}</textarea>
                <small class="text-secondary"><span id="chr"></span> character lefts of 200</small>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>

        </form>
        <div class="mb-3 text-muted py-3 stripe">
            Your information helps your friends to know you more >.<.
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            let textarea = $("#about_me");
            let chr = $("#chr");
            chr.text(Math.max(200 - textarea.val().length, 0));
            textarea.on('keyup', function () {
                chr.text(Math.max(200 - textarea.val().length, 0));
            });
        });
    </script>
    @if (session('success'))
        <script>swal("Success!", "{{session('success')}}", "success");</script>
    @endif
@endpush
