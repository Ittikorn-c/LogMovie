@extends('layout.master')
@section('page-title')
Edit User Infomation
@endsection

@section('content')
<form action="/admin/users/{{ $user->id }}" method="post" >
@method('PUT')
@csrf
	{{ csrf_field() }}

<div >
	<label> Name </label>
	<input type="text" name="name" value="{{ old('uname') ?? $user->name}}" class="form-control"/>
</div>
<br>
<div>
	<label>E-Mail: </label>
	<input type="text" name="email" value="{{ old('email') ?? $user->email}}" class="form-control"/>
</div>
<br>
<button class="btn btn-primary" type="submit">Save Change</button>
</form>
@endsection