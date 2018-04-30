@extends('layouts.master')

@section('header')

@endsection

@section('content')
<br><br><br><br>
	<div class="body_main container" style="">

	    <div class="input-group custom-search-form">
	      <input class="" id="myInput" type="text" placeholder="Search movie's name...">
	      <span class="input-group-btn">
	        <button class="btn btn-default-sm" type="submit">
	        <i class="fa fa-search">Search</i>
	        </button>
	      </span>
	    </div>

	    <div class="text-content" style="background-color:rgba(192,192,192,0.3);">
	      <h3>
	        <div class="row" style="background: orange;padding-left: 50px">
	          <div class="col-sm-6">
	              <mark style="background: white;padding: 0px">
	                Movies
	              </mark>
	          </div>
	          <div class="col-sm-6" style="text-align: right;">

	          </div>
	        </div>
	      </h3>
	      <div class="row" id="myTable" style="margin-left: 5em;">
	        @foreach ($movies as $movie)
	          <div class="card" style="width:250px; margin-left: 3em; margin-top: 3em">
	            <img class="card-img-top" src="{{ $movie->cover_image }}" alt="Card image" style="width:100%; height: 300px">
	            <div class="card-body" ><h4 class="card-title">{{ $movie->name }}</h4>
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


		<br><br>
	</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable .card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>
