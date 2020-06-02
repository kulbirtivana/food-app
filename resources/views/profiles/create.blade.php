@extends('layout')

@section('title')
Supplier's can register here
@endsection

@section('content')

<h2> Fill out the following form to create a supplier's profile</h2>
@include('partials.errors')
<form method="get" action="{{'profiles.store' }}" enctype="multipart/form-data">
	<div class="form-group container h-100">

	@csrf
	<label for="username">
		<strong>Name:</strong>
		<input type="text" id="username" name="username">
	</label>
<br>
<label for="phone">
		<strong>Phone:</strong>
		<input type="text" id="phone" name="phone">
	</label>
<br>
<label for="address">
		<strong>Address:</strong>
		<input type="text" id="address" name="address">
	</label>
<br>
<label for="city">
		<strong>City:</strong>
		<input type="text" id="city" name="city">
	</label>
<br>
<label for="city">
		<strong>Province:</strong>
		<input type="text" id="province" name="province">
	</label>
<br>
<label for="zip">
		<strong>Zip:</strong>
		<input type="text" id="zip" name="zip">
	</label>
<br>
 <div class="form-group row">
        <label for="picture" class="form-control">Upload your image</label>

        <div class="col-md-6">
            <input type="file" class="form-control" name="picture" accept="image/*" onchange="readURL(this)">
        </div>

	<label for="bio">
		<strong>About Supplier</strong><textarea class="form-control" name="Bio" id="bio" cols="30" rows="10"></textarea>
	</label>
<br>
<input type="submit" value="Submit the Supplier Information">
</form>

@endsection
