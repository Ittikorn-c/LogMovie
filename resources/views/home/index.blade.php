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
  h2.panel-heading {
    width: 100%;
  }
  @media (max-width: 767px)
  .critic-criteria-container h1.panel-heading, h2.panel-heading {
    padding-left: 25px;
  }
  .critic-criteria-container h1.panel-heading::before, h2.panel-heading::before {
    position: absolute;
    margin: auto;
  }
  .critic-criteria-container h1.panel-heading::before,
   .critic-criteria-container h1.panel-heading::after,
    h2.panel-heading::before, h2.panel-heading::after{
    background-color: black;
    content: ' ';
    min-width: 5px;
    height: 5px;
  }
  .inlineBlock {
    display: inline-block;
  }
  h2 {
    display: block;
    font-size: 1.5em;
    font-weight: bold;
}
  *:before, *:after {
    box-sizing: border-box;

  }
  </style>
  <section class="sec1">
      <div class="text-head" style="background-color: black; opacity: 0.9">
          LOG MOVIE
      </div>
  </section>
@endsection
@section('content')
  <div class="body_main">
    <div class="text-content">
      <h3>Lastest movies</h3>
      <br>  
      <div class="row">
        @foreach ($movies as $movie)
          <div class="card" style="width:250px; margin-left: 3em">
            <img class="card-img-top" src="{{ $movie->cover_image }}" alt="Card image" style="width:100%; height: 300px">
            <div class="card-body">
              <h4 class="card-title">{{ $movie->name }}</h4>
              {{ $movie->storyline }}
              <br>
              <a href="movies/{{ $movie->id }}" class="btn btn-primary">See more</a>
            </div>
          </div>
        @endforeach
      </div>
      <br>  
    </div>

    <div class="text-content">
      <h3>News</h3>
      <br>  
      <div class="row">
        @foreach ($movies as $movie)
          <div class="card" style="width:250px; margin-left: 3em">
            <img class="card-img-top" src="{{ $movie->cover_image }}" alt="Card image" style="width:100%; height: 300px">
            <div class="card-body">
              <h4 class="card-title">{{ $movie->name }}</h4>
              {{ $movie->storyline }}
              <br>
              <a href="movies/{{ $movie->id }}" class="btn btn-primary">See more</a>
            </div>
          </div>
        @endforeach
      </div>
      <br>  
    </div>
  </div>


@endsection
