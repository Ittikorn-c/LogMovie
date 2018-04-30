@extends('layouts.master')

@section('header')
  <style>
    section.sec1{

        width: 100%;
        height: 100vh;
        background-image: url(header_home3.png);
        background-size: cover;
        background-position: center;
  }

  .inlineBlock {
    display: inline-block;
  }
  h2 {
    display: block;
    font-size: 1.5em;
    font-weight: bold;
  }
  h3 {
    /*border-bottom:  3px solid black;*/
  }
  .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
  }
  .text-head{
    font-size: 80px;
    color: #fff;
    text-align: center;
    border: 1px solid #ccc;
    position: absolute;
    top: 50%;
    width: 100%;
}
  </style>
  <section class="sec1">
      <div class="text-head" style="background-color: black; opacity: 0.9">
          LOG MOVIE
      </div>
  </section>
@endsection
@section('content')
<br>
  <div class="body_main container" style="">

    <div class="text-content" style="background-color:rgba(192,192,192,0.3);">
      <h3>
        <div class="row" style="background: orange;padding-left: 50px">
          <div class="col-sm-6">
              <mark style="background: white;padding: 0px">
                Movies
              </mark>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a class="" href="movies" style="font-size: 80%;display: inline;color: white">See all..</a>
          </div>
        </div>
      </h3>
      <div class="row" id="myTable" style="margin-left: 5em;">
        @foreach ($movies as $movie)
          <div class="card" style="width:250px; margin-left: 3em; margin-top: 3em">
            <img class="card-img-top" src="{{ $movie->cover_image }}" alt="Card image" style="width:100%; height: 300px">
            <div class="card-body">
              <h4 class="card-title">{{ $movie->name }}</h4>
              <br>
            </div>
            <h4 class="card-footer"><a href="movies/{{ $movie->id }}" class="btn btn-primary">See more...</a></h4>
          </div>
        @endforeach
        <br>
      </div>
      <br>
    </div>
    <br>

    <div class="text-content" style="background-color:rgba(192,192,192,0.3);">
      <h3>
        <div class="row" style="background: orange;padding-left: 50px">
          <div class="col-sm-6">
              <mark style="background: white;padding: 0px">
                News
              </mark>
          </div>
          <div class="col-sm-6" style="text-align: right;">
            <a class="" href="news" style="font-size: 80%;display: inline;color: white">See all..</a>
          </div>
        </div>
      </h3>

      @foreach ($news as $news)
        <div class="container" style="text-align: center;margin-top: 3em; border-bottom: 1px solid black">
          <h4>{{ $news->title }}</h4>
          <img src="{{ $news->imgs[0]->image }}" style="height: 300px; width: 300px;"> <img src="{{ $news->imgs[1]->image }}" style="height: 300px; width: 300px;margin-left: 1em;box-shadow: 2px 2px">
          <h5>Announce date: {{ $news->created_at->format('d/m/Y H:i:s') }}</h5>
          <a href="news/{{ $news->id }}" class="btn btn-primary">Read more</a>
          <br><br>
        </div>
      @endforeach

      <br>
    </div>
  </div>


@endsection
