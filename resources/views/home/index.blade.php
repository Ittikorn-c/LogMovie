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
    border-bottom:  3px solid black;
  }
  .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
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
  <div class="body_main container">
    <div class="text-content">
      <h3>Lastest movies</h3>
      <div class="row" style="margin-left: 5em">
        @foreach ($movies as $movie)
          <div class="card" style="width:250px; margin-left: 3em; margin-top: 3em">
            <img class="card-img-top" src="{{ $movie->cover_image }}" alt="Card image" style="width:100%; height: 300px">
            <div class="card-body">
              <h4 class="card-title">{{ $movie->name }}</h4>
              {{ $movie->storyline }}
              <br>
              <a href="movies/{{ $movie->id }}" class="btn btn-primary">See more...</a>
            </div>
          </div>
        @endforeach
      </div>
      <br>  
    </div>

    <div class="text-content">
      <h3>News <a href="news/" style="font-size: 70%">See all...</a></h3>

      @foreach ($news as $news)
        <div class="container" style="text-align: center;margin-top: 3em; border-bottom: 1px solid black">
          <h4>{{ $news->title }}</h4>
          
          <img src="{{ $news->newsImage[0]->image }}" style="height: 300px; width: 300px;"><img src="{{ $news->newsImage[1]->image }}" style="height: 300px; width: 300px;margin-left: 1em">
          <h5>Date: {{ $news->created_at }}</h5>
          <a href="news/{{ $news->id }}" class="btn btn-primary">Read more</a>
          <br><br>
        </div>
      @endforeach
      
      <br>  
    </div>
  </div>

@endsection
