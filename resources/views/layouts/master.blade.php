<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel=stylesheet>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    margin: 30px auto;
    text-align: justify;
    font-size: 20px;
    line-height: 30px;
}
</style>
</head>
<body>

<div class="wrapper">
    <nav>
        <div class="logo">LogMovie</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contace</a></li>
            <li><a class="active" href="#">Log In</a></li>
        </ul>
    </nav>

    <div>
        @yield('header')
    </div>
    
    <section class="content">
        @yield('content')
    </section>
</div>

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