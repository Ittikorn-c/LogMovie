@extends('layout.master')
@section('page-title')
Create User 
@endsection

@section('content')
<form action="/admin/users" method="post" >
@csrf
	<!-- CSRF Cross-Site Request Forgery -->
{{ csrf_field() }}

<div >
	<label> Name : </label>
	<input type="text" name="name" value="{{ old('uname') }}" class="form-control"/>
</div>
<br>
<div>
	<label>E-Mail : </label>
	<input type="text" name="email" value="{{ old('email') }}" class="form-control"/>
</div>
<br>
<div>
	<label>Password : </label>
	<input type="password" name="password" value="{{ old('password') }}" class="form-control"/>
</div>
<br>
<div>
	<label>Access type : </label>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="role" value="admin" /> admin
	</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="role" value="mod" /> mod
	</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label><input type="radio" name="role" value="user" /> user
	</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
<br>
<button class="btn btn-primary" type="submit">Save Change</button>
</form>
@endsection