@extends('layout.master')
@section('page-title')

@endsection

@section('content')
<br>
<h1>Name : {{$user->name}}</h1>
<br>
<table class="table">

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Movie Name</th>
      <th scope="col">Review</th>
  
    </tr>
  </thead>
  <tbody>
    @foreach($reviews as $review)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
      
          {{ $review->name }}

      </td>
      <td>{{ $review->review }}</td>

    
    </tr>
    @endforeach
  </tbody>
</table>



@endsection