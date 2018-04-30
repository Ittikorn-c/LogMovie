@extends('layout.master')
@section('page-title')
Movie Infomation
@endsection

@section('content')


<div >
	<label> Name : </label>
	<input type="text" name="name" value="{{$movie->name}}" class="form-control"/ readonly>
</div>
<br>
<div>
	<label>budget : </label>
	<input type="text" name="budget" value="{{$movie->budget}}" class="form-control"/ readonly>
</div>

<br>
<div>
	<label>Genre : </label>
	<input type="text" name="genres" value="{{$movie->genre->genres}}" class="form-control"/ readonly>
</div>

<br>
<div>
	<label>Story: </label>
	<textarea name="story" row="20" cols="80" class="form-control" readonly>
		{{ $movie->storyline }}
	</textarea>
</div>
<br>
<a href="{{ url('/movies/' . $movie->id) }}">
<button class="btn btn-primary">Edit</button>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button class="btn btn-primary">Review</button>
@endsection