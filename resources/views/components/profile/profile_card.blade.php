<div class="card box-shadow ">
    <div class="card-header bg-white">
        <div class="card-img-top text-center py-3 ">
            <a class="d-block"><img
                        src="{{asset('storage/avatars/' . $user->profile->avatar)}}"
                        style="max-width: 150px; max-height: 150px; width: 100%; border-radius: 50%; border: 4px solid white"></a>
            <form enctype="multipart/form-data" id="avatar-form" class="form-inline" method="post" action="{{route('updateAvatar')}}">
                @csrf
                <input id="avatar" style="opacity: 0; position: absolute; top: 60px; left: 80px; height: 100px; width: 100px" type="file"
                       accept=".jpg, .png" name="avatar">
            </form>
            <div class="text-center text-danger font-weight-bold mt-3 text-truncate">
                {{$user->name}}
            </div>
        </div>
    </div>
    @if(Auth::id() == $user->id)
        <div class="card-header text-center">
            <a class="btn btn-warning " href="#"> Follow
            </a>
            <button type="button" id="logout" class="btn btn-warning "> Logout</button>

            <form id="logout-form" action="{{route('logout')}}" method="POST">
                @csrf
            </form>

        </div>
    @endif


    <nav class="card-body p-0">
        <a class="about" data-toggle="collapse" data-target="#about-submenu">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fa fa-globe"></i> About
                </div>
                <i class="fa fa-chevron-down"></i>
            </div>
        </a>
        <div id="about-submenu" class="collapse">
            <ul class="submenu list-unstyled">
                <li>
                    <i class="fa fa-birthday-cake"></i>{{$user->profile->birthday? $user->profile->getFormattedDay():''}}
                </li>
                <li><i class="fa fa-home text-truncate"></i>{{$user->profile->location}}</li>
                <li><i class="fa fa-user-circle"></i>{{$user->profile->gender}}</li>
                <li><i class="fa fa-eye"></i>{{$user->profile->available_at}}</li>
            </ul>
        </div>

        <a class="card-button" href="{{route('profile.show', Auth::id())}}">
            <i class="fa fa-newspaper"></i> Overview
        </a>
        <a class="card-button" href="{{route('movielist')}}">
            <i class="fa fa-book"></i> Movie Lists </a>
        <a class="card-button" href="#">
            <i class="fa fa-users"></i> Friends </a>

        @if(Auth::id() == $user->id)
            <a class="card-button" href="{{route('profile.edit', Auth::id())}}">
                <i class="fa fa-pencil-alt"></i> Profile
            </a>
            <a class="card-button" href="{{route('account.edit', Auth::id())}}">
                <i class="fa fa-cog"></i> Account </a>
        @endif
    </nav>

    <script>
        document.getElementById("avatar").onchange = function () {
            document.getElementById("avatar-form").submit();
        };

        document.getElementById("logout").onclick = function () {
            document.getElementById("logout-form").submit();
        };
    </script>
</div>