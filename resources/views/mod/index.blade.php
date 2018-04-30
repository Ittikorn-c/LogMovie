@extends('layouts.master')

@section('header')

@endsection
<style media="screen">
  .delete:link, .delete:visited {
    background-color: #fa8072;
    color: white;
    width: 80px;
    padding: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }
  .delete:hover, .delete:active {
    background-color: red;
  }
  .edit:link, .edit:visited{
    background-color: #c0d6e4;
    color: white;
    width: 80px;
    padding: 8px 0;
    text-align: center;
    text-decoration: none;
    display: inline-block;
  }
  .edit:hover, .edit:active {
    background-color: blue;
  }
  .name:hover{
    text-decoration: none;
  }
  .mainbody {
    margin-top: 15%;
    margin-bottom: 5%;
    border: 1px solid #e1e2ec;
    border-radius: 10px;
  }
</style>
@section('content')
<div class="container mt-3">
  <!-- Nav tabs -->
  <div class="mainbody">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#movies">Movies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#news">News</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="movies" class="container tab-pane active"><br>
      <a href="/movies/create"><button type="button" class="btn bth-dark" name="button">Create Movie</button></a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Name</th>
            <th scope="col">Genres</th>
            <th scope="col">Runtime</th>
            <th scope="col">Budget</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($movies as $movie)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><img style="max-width: 100px;" src="/{{ $movie->cover_image }}"></td>
              <td><a class='name' href="/movies/{{ $movie->id }}">{{ $movie->name }}</a></td>
              <td>
                @foreach ($movie->gen as $g)
                  {{ $g->genres }}
                  @if(!$loop->last)
                       /
                  @endif
                @endforeach
              </td>
              <td>{{ $movie->runtime }}</td>
              <td>{{ $movie->budget }}</td>
              <td>
                <form action="/movies/{{ $movie->id }}/edit" method="get">
                  <button class="btn btn-primary">Edit</button>
                </form>
                <form action="/movies/{{ $movie->id }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="news" class="container tab-pane fade"><br>
      <a href="/news/create"><button type="button" class="btn bth-dark" name="button">Create News</button></a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Reference</th>
            <th scope="col">Created at</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($news as $new)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td><a class='name' href="/news/{{ $new->id }}">{{ $new->title }}</a></td>
              <td>{{ $new->references }}</td>
              <td>{{ $new->created_at }}</td>
              <td>
                <form action="/news/{{ $new->id }}/edit" method="get">
                  <button class="btn btn-primary">Edit</button>
                </form>

                <form action="/news/{{ $new->id }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
@endsection
