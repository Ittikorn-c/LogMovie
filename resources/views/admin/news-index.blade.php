@extends('layout.master')
@section('page-title')
News
@endsection

@section('content')
<br>

<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Reference</th>
    </tr>
  </thead>
  <tbody>
    @foreach($news as $new)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/news/' . $new->id) }}">
          {{ $new->title }}
        </a>
      </td>
      <td>{{ $new->references }}</td>

    
    </tr>  
    @endforeach
  </tbody>
</table>



@endsection