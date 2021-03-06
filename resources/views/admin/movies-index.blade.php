@extends('layout.master')
@section('page-title')
Movies
@endsection

@section('content')
<br>

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
        <a href="{{ url('/movies/' . $movie->id) }}">
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