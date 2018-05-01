<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Log Movie</title>
<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel=stylesheet>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<style>
body {
  margin: 0;
  padding: 0;
  font-family: Quicksand;
}

nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100px;
  padding: 10px 100px;
  box-sizing: border-box;
  transition: .3s;
}

nav.black {
    background: rgba(0,0,0,0.8);
    height: 100px;
    padding: 10px 100px;
}

nav .logo{
    padding: 22px 20px;
    height: 80px;
    float: left;
    font-size: 24px;
    transition: .3s;
}

nav.black .logo{
    color: #fff;
}

nav ul{
    list-style: none;
    float: right;
    padding: 0;
    margin: 0;
    display: flex;
}

nav ul li{
    list-style: none;
}

nav ul li a{
    line-height: 80px;
    color: #151515;
    padding: 12px 30px;
    font-size: 18px;
    text-decoration: none;
    text-transform: uppercase;
    transition: .3s;
}

nav.black ul li a{
    color: #fff;
}

nav ul li a:focus{
    outline: none;
}

nav ul li a.active{
    background: #E2472F;
    color: #fff;
    border-radius: 6px;
}

.text-head{
    font-size: 80px;
    color: #fff;
    border-radius: 10px;
    background: rgba(0,0,0,0.8);
}

.content{

}
.content p{
    width: 9000px;

    text-align: justify;
    font-size: 20px;
    line-height: 30px;
}
</style>
</head>
<body>

<div class="wrapper">
    <div>
        @yield('header')
    </div>

    <section class="content">
        @yield('content')
    </section>

    <nav>
        <div class="logo"><a href="/homepage">LogMovie</a></div>
        <ul>
            <li><a href="/movies">Movie</a></li>
            <li><a href="/news">News</a></li>
            @guest
              <li><a class="active" href="/login">Log In</a></li>
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if(Auth::user()->role === "user")
                  <a href="/timelines/{{Auth::user()->id}} ">My Blog</a>
                  @elseif(Auth::user()->role === "mod")
                    <a href="/mod ">Mod</a>
                    @elseif(Auth::user()->role === "admin")
                      <a href="/">Admin</a>
                  @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </nav>
</div>

<footer class="page-footer font-small indigo pt-0" style="background-color:lightgrey">
    <div class="footer-copyright py-3 text-center">
    <div>
                    <a class="fb-ic">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a class="tw-ic">
                        <i class="fab fa-twitter-square"></i>
                    </a>
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-square"></i>
                    </a>
                    <a class="li-ic">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a class="ins-ic">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pin-ic">
                        <i class="fab fa-pinterest-square"></i>
                    </a>
                </div>
        LOG MOVIE
    </div>
</footer>


<script type="text/javascript">
    $(window).on('scroll', function(){
        if($(window).scrollTop()){
            $('nav').addClass('black');
        }
        else{
            $('nav').removeClass('black');
        }
    })
</script>

</body>
</html>
