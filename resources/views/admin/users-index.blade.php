@extends('layout.master')
@section('page-title')
Users
@endsection

@section('content')
<br>

<br>
<a href="{{ url('/admin/users/create')}}">
  <button type="button" class="btn btn-primary" >Add User</button>
</a>
<br>
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
  <form action="/admin/users/{{$user->id}}" method="post">
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>
        <a href="{{ url('/admin/users/' . $user->id) }}">
          {{ $user->name }}
        </a>
      </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->role }}</td>

      @csrf
      @method('DELETE')
      <td><button  type="submit"  class="btn btn-danger btn-md">Delete</button></td>
    </tr>
  </form>
    @endforeach
  </tbody>
</table>



@endsection