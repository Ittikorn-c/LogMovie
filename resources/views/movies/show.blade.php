@extends('layouts.master')

@section('header')
    <style>
        section.sec1{
            
            width: 100%;
            height: 100vh;
            background-image: url(../{{ $movie->cover_image }});
            background-size: cover;
            background-position: center;
        }

        .reviewbox{
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }
        .review-content{
            float: right;
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 25%;
            height: 100%   
        }
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 40px;
        border: 1px solid black;
        }

        .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
        }

        .rating label:last-child {
        position: static;
        }

        .rating label:nth-child(1) {
        z-index: 10;
        }

        .rating label:nth-child(2) {
        z-index: 9;
        }

        .rating label:nth-child(3) {
        z-index: 8;
        }

        .rating label:nth-child(4) {
        z-index: 7;
        }

        .rating label:nth-child(5) {
        z-index: 6;
        }

        .rating label:nth-child(6) {
        z-index: 5;
        }

        .rating label:nth-child(7) {
        z-index: 4;
        }

        .rating label:nth-child(8) {
        z-index: 3;
        }

        .rating label:nth-child(9) {
        z-index: 2;
        }

        .rating label:nth-child(10) {
        z-index: 1;
        }

        .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        }

        .rating label .icon {
        float: left;
        color: transparent;
        }

        .rating label:last-child .icon {
        color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
        color: #09f;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
        }

        .reviewinput{
            width: 100%;
        }

        .sidebar-box{
            max-height: 200px;
            position: relative;
            overflow: hidden;
        }

        .sidebar-box .read-more{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            margin: 0;
            padding: 10px 0;
            
            background-image: linear-gradient(to bottom, transparent, lightgray);
        }

       /* show 3 items */
    .carousel-inner .active,
    .carousel-inner .active + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item,
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item  {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item,
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -25%;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

    .modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

.mySlides {
  display: none;
  background-color: black;
}

.cursor {
  cursor: pointer
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.checked {
  color: orange;
}
</style>
<section class="sec1">
        @if($errors->any())
            <div style="height:100px">
            
            </div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="text-head w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
        {{ $movie->name }} 
        <br>
        <i class="fa fa-star checked"></i>
        {{ $rate }}
    </div>
</section>
@endsection

@section('content')
<div id="reviewBox" class="reviewbox">
    <div class="review-content">
    <span class="close">&times;</span>
        <h1>Review</h1>
        <div class="card" style="width:100%">
            <img class="card-img-top" src="../{{ $movie->cover_image }}" alt="Card image" style="width:100%; float:left">
            <div class="card-body" style="float:right">
                <h4 class="card-title">{{ $movie->name }}</h4>
            </div>
        </div>
        <hr>
        <h3>YOUR RATING</h3>
        <form class="rating">
        <label>
            <input type="radio" name="stars" value="1" />
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
        </label>
        <label>
            <input type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="6" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="7" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="8" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="9" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        <label>
            <input type="radio" name="stars" value="10" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
        </label>
        </form>
        <form action="/userreviews" method="post">
        <input hidden type="text" id="rate" name="rate" value="">
        <input hidden type="text" id="movie_id" name="movie_id" value="{{ $movie->id }}">
        <input hidden type="text" id="user_id" name="user_id" value="2">
        {{ csrf_field() }}
        <h3>YOUR REVIEW</h3>
        <input type="text" name="header" class="reviewinput" placeholder="Write a headline for your review here" width="100%">
        <br>
        <textarea name="review" class="reviewinput" cols="30" rows="10" placeholder="Write your review here" width="100%"></textarea>
        <br>
        <button type="submit">Submit</button>
        </form>
    </div>
</div>

<div class="container">
<hr>
<div class="row">
    <h1>Video</h1>
    <p><iframe width="1100" height="600" src={{$movie->vdo}}></iframe></p>
</div>
<hr>
<div class="row">
    <h1>Photos</h1>
    <div class="container-fluid">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            @foreach($pics as $pic)
                @if($loop->iteration == 1)
                    <div class="carousel-item col-md-3 active" onclick="openModal();currentSlide({{ $loop->iteration }})">
                        <img class="img-fluid mx-auto d-block" src="../{{ $pic->image }}" style="height: 300px ; width: auto">
                    </div>
                @endif
                <div class="carousel-item col-md-3" onclick="openModal();currentSlide({{ $loop->iteration }})">
                    <img class="img-fluid mx-auto d-block" src="../{{ $pic->image }}" style="max-height: 300px; width: auto">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-lg text-muted"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-lg text-muted"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">
    @foreach($pics as $pic)
        <div class="mySlides">
        <center><img src="../{{ $pic->image }}"></center>
        </div>
    @endforeach
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
</div>
</div>
<hr>
<div class="row">
    <h1>People who liked this also liked...</h1>
</div>
<hr>
<div class="row sidebar-box">
    <h1>Storyline</h1>
    <p>{{ $movie->storyline }}</p>
    <p class="read-more"><a href="#" class="button">Read More</a></p>
</div>
<hr>
<div class="row">
    <h1>Box Office</h1>
    <p>Budget: {{ $movie->budget }}</p>
    <p>Opening Weekend USA: ${{ $movie->opening }}</p>
    <p>Gross USA: ${{ $movie->gross }}</p>
    <p>Cumulative Worldwide Gross: ${{ $movie->cumulative }}</p>
</div>
<hr>
<div class="row">
    <h1>Technical Specs</h1>
    <p>Runtime: {{ $movie->runtime }} min</p>
    <p>Color: {{ $movie->color }}</p>
    <p>Aspect Ratio: {{ $movie->aspect_ratio }}</p>
</div>
<hr>
<div class="row">
    <h1>User Reviews</h1>
    @if($review !== 0)
    <p>                      
    @for($i = 0; $i < $review->rate; $i++)
        <span class="fa fa-star checked"></span>
    @endfor
    @for($i = 0; $i < 10 - $review->rate; $i++)
        <span class="fa fa-star"></span>
    @endfor
    <strong>{{ $review->header }}</strong></p>
    <p>{{ $review->updated_at }} | By <a href="#">{{ $review->user->name }}</a> - <a href="/timelines/{{ $review->user->id }}">See all my reviews</a></p>
    
    <div style="word-wrap: break-word;">
        {{ $review->review }}
    </div>
    <form id="likeform" name="likeform" action="/likereviews" method="post">
    <input hidden type="text" id="review_id" name="review_id" value="{{ $review->id }}">
    {{ csrf_field() }}
    <p><a href="javascript:{}" onclick="document.getElementById('likeform').submit();"><i class="far fa-heart"></i></a> Like: {{ $review->countLike() }}</p>
    </form>
    @else
    <p>None</p>
    @endif
    <button id="reviewBtn" class=" w3-button w3-teal w3-round-large">Review this title</button>
</div>
<br>
</div>
<script>
// Get the modal
var reviewbox = document.getElementById('reviewBox');

// Get the button that opens the modal
var reviewbtn = document.getElementById("reviewBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
reviewbtn.onclick = function() {
    reviewBox.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    reviewBox.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == reviewBox) {
        reviewBox.style.display = "none";
    }
}

$(':radio').change(function() {
  console.log('New star rating: ' + this.value);
  document.getElementById("rate").value = this.value;
});

var $el, $ps, $up, totalHeight;
$(".sidebar-box .button").click(function() {
    totalHeight = 0;

    $el = $(this);
    $p = $el.parent();
    $up = $p.parent();
    $ps = $up.find("p:not('.read-more')");
    
    $ps.each(function() {
        totalHeight += $(this).outerHeight()+100;
    });
$up
    .css({
        "height": $up.height(),
        "max-height": 9999
    })
    .animate({
        "height": totalHeight
    })

$p.fadeOut();

return false;
});
$('#carouselExample').on('slide.bs.carousel', function (e) {
    
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $('.carousel-item').length;
        
        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                }
                else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
    });

    function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
@endsection