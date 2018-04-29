@extends('layouts.master')
@section('page-title')
User Infomation
@endsection

@section('content')


<div >
	<label> Name </label>
	<input type="text" name="name" value="{{$user->name}}" class="form-control"/>
</div>
<br>
<div>
	<label>E-Mail: </label>
	<input type="text" name="email" value="{{$user->email}}" class="form-control"/>
</div>

<br>
<div>
	<label>Role: </label>
	<input type="text" name="role" value="{{$user->role}}" class="form-control"/>
</div>
<br>
<a href="{{ url('/users/' . $user->id) }}/edit">
<button class="btn btn-primary">Edit</button>
</a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{ url('/users/' . $user->id) }}/review">
<button class="btn btn-primary">Review</button>
</a>
@endsection