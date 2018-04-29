@extends('layouts.master')
@section('page-title')
Movies
@endsection

@section('content')
<br>
<form action="post" class="">
  <input type="text" name="name" class="form-control" placeholder="Search">
  <br>
  <input type="radio" name="type" value="all" > All
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="type" value="mod" > Action
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="type" value="user"> Adventure
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="type" value="user"> Sci-Fi
</form>

<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Budget</th>
      <th scope="col">Genre</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $movie)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('admin/movies/' . $movie->id) }}">
          {{ $movie->name }}
        </a>
      </td>
      <td>{{ $movie->budget }}</td>

      <td>{{ $movie->genre->genres }}</td>
    
    </tr>
    @endforeach
  </tbody>
</table>



@endsection