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
    </style>
    <section class="sec1">
        <div class="text-head w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
            {{ $movie->name }}
            
        </div>
    </section>
@endsection

@section('content')
<div id="reviewBox" class="reviewbox">
    <div class="review-content">
    <span class="close">&times;</span>
        <h1>Review</h1>
        <div class="card" style="width:100%">
            <img class="card-img-top" src="../{{ $movie->head_pic }}" alt="Card image" style="width:30% float:left">
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
        <input type="text" id="rate" name="rate" value="">
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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>{{ $movie->name }}</h1>      
  </div>
</div>
<div class="container">
<iframe width="420" height="345" src={{$movie->vdo}}></iframe>
<hr>
<div class="row">
    <h1>Video</h1>
</div>
<hr>
<div class="row">
    <h1>Photos</h1>
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
    <h1>User Reciews</h1>
    <p>{{ $review->header }}</p>
    <p>{{ $review->review }}</p>
    <p>{{ $like }}</p>
    <form action="/likereviews" method="post">
    {{ csrf_field() }}
    <button>Like</button>
    </form>
    <button id="reviewBtn">Review this title</button>
</div>
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
</script>
@endsection