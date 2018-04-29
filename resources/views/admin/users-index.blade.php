@extends('layouts.master')
@section('page-title')
Users
@endsection

@section('content')
<br>
<form action="post" class="">
  <input type="text" name="name" class="form-control" placeholder="Search">
  <br>
  <input type="radio" name="type" value="all" > All
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="type" value="mod" > Mod
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="radio" name="type" value="user"> User
</form>

<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Access Type</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/users/' . $user->id) }}">
          {{ $user->name }}
        </a>
      </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>
    
    </tr>
    @endforeach
  </tbody>
</table>



@endsection