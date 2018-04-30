@extends("layouts/master")

@section("header")

@endsection
<style media="screen">
  .main-content {
    margin-top: 15%;
    margin-bottom: 5%;
    padding: 40px;
    border: 1px solid #e1e2ec;
  }
  #imgcover {
    max-width: 100%;
    border: 5px solid black;
  }
  #title {
    font-size: 40px;
    color: black;
  }
  #by{
    color: #808080;
  }
  #day {
    color: #b5b5b5;
  }
  #detail{
    text-indent: 50px;
    margin: 50px 20px 0 20px;
    font-size: 18px;
  }
  /* The grid: Four equal columns that floats next to each other */
  .column_1 {
      float: left;
      width: 25%;
      padding: 10px;
  }

  /* Style the images inside the grid */
  .column_1 img {
      opacity: 0.8;
      cursor: pointer;
  }

  .column_1 img:hover {
      opacity: 1;
  }

  /* Clear floats after the columns */
  .row_1:after {
      content: "";
      display: table;
      clear: both;
  }

  /* The expanding image container (positioning is needed to position the close button and the text) */
  .container_1 {
      position: relative;
      display: none;
  }
  #expandedImg {
    max-width: 100%;
    border: 5px solid black;
  }
  .more {
    background-color: #C8C8C8;
    margin-top: 31%;
    margin-bottom: 5%;
    padding: 20px;
    padding-top: 30px;
    border: 1px solid #e1e2ec;
    overflow: auto;
  }
  #more {
    text-decoration: underline;
    font-weight: bold;
    margin-bottom: 25px;
    color: #303030;
  }
  .overflow {
    width: 100%;
    padding: 2px 5px;
    /* BOTH of the following are required for text-overflow */
    white-space:nowrap;
    overflow:hidden;
    text-overflow: ellipsis;
  }
  .morebox {
    text-align: 16px;
    margin: 1%;
    padding: 10px;
    padding-top: 0;
    background-color: #f1f1f1;
  }
  .day {
    color: #808080;
  }
  .more a:hover {
    text-decoration: none;
    color: #808080;
  }
  #back {
    margin-top: 50px;
    margin-bottom: 30px;
  }
</style>
@section("content")
<div class="container">
  <div class="row content">
    <div class="col-sm-8">
      <div class="main-content">
        <h1 id='title'>{{ $news->title }}</h1>
        <h3 id="by">by {{ $news->references }}</h3>
        <h6 id='day'>{{ $newsday }}</h6>
        <hr>
        <img id='imgcover' src="/{{ $imagesnewscover->image }}" alt="">
        <!-- The expanding image container -->
        <div class="container container_1">
          <!-- Expanded image -->
          <img src="/{{ $imagesnewscover->image }}" id="expandedImg" style="width:100%">
        </div>
        <!-- The grid: four columns -->
        <div class="row row_1">
          @foreach ($imagesnews as $imagesnew)
              <div class="column column_1">
                <img src="/{{ $imagesnew->image }}" onclick="openImg(this)" style="max-width:100%;">
              </div>
          @endforeach
        </div>
        <div id="detail" style="word-wrap: break-word" >{{ $news->detail }}</div>
        <center><a href="/news"><button id='back' type="button" class="btn btn-outline-dark">Back</button></a></center>
      </div>
    </div>
    <div class="col-sm-4 sidenav">
      <div class="more">
        <a href="/news"><h5 id="more">More News</h5></a>
        @foreach ($morenews as $morenew)
          <a class="linknews" href="/news/{{ $morenew->id }}">
          <h5>{{ $morenew->title }}</h5>
          <div class="day">{{ $morenew->updated_at }}</div></a>
          <hr>
        @endforeach
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function openImg(imgs) {
    $('#imgcover').hide();
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
  }
</script>

@endsection
