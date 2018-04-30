<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>MINIMAL - Free Bootstrap 3 Theme</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

   <!--  Custom styles for this template -->
    <!-- <link href="assets/css/main.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
 -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <script src="/js/jquery.min.js"></script>

    

    
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
        
    <!-- Menu -->
    <nav class="menu" id="theMenu">
        <div class="menu-wrap">
            <h1 class="logo"><a href="index.html#home">Minimal</a></h1>
            <i class="icon-remove menu-close"></i>
            <a href="#home" class="smoothScroll">Home</a>
            <a href="#about" class="smoothScroll">About</a>
            <a href="#portfolio" class="smoothScroll">Portfolio</a>
            <a href="#contact" class="smoothScroll">Contact</a>
            <a href="#"><i class="icon-facebook"></i></a>
            <a href="#"><i class="icon-twitter"></i></a>
            <a href="#"><i class="icon-dribbble"></i></a>
            <a href="#"><i class="icon-envelope"></i></a>
        </div>
        
        <!-- Menu button -->
        <div id="menuToggle"><i class="icon-reorder"></i></div>
    </nav>

     <section class="bg-like">
        <div class="col-lg-12 text-center">
            <br>
                <h1 class="section-heading text-uppercase">@yield('page-title')</h1>
                <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
        </div>
        <div class="container">
    <!--         <div class="jumbotron">
                <div class="lead">
                    Main Header
                    @yield('jumbotext')
                </div>
            </div> -->
              @yield('content')
        </div>      
    </section>


    


    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script> -->
    <script src="/js/main.js"></script>
     @stack('script')
</body>
</html>
