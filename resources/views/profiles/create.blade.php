@extends('layout')

@section('title')
Register Here
@endsection

@section('content')

<h2 class="text-center"> Fill out the following form to create a supplier's profile</h2>
{{--@include('partials.errors')--}}

<div class="container-fluid">
    <div class="row h-100 justify-content-center align-items-center">
		<form method="post" action="{{ route('profiles.store')}}" enctype="multipart/form-data">
			<div class="form-group container h-100">

			@csrf
			<div class="form-group container h-100">
			<label for="username">
				<strong>Name:</strong>
				<input type="text" id="username" name="username">
			</label>
			</div>

		<div class="form-group container h-100">
		<label for="phone">
				<strong>Phone:</strong>
				<input type="text" id="phone" name="phone">
			</label>
		</div>

		<div class="form-group container h-100">
		<label for="address">
				<strong>Address:</strong>
				<input type="text" id="address" name="address">
			</label>
		</div>

		<div class="form-group container h-100">
		<label for="city">
				<strong>City:</strong>
				<input type="text" id="city" name="city">
			</label>
		</div>

		<div class="form-group container h-100">
		<label for="city">
				<strong>Province:</strong>
				<input type="text" id="province" name="province">
			</label>
		</div>

		<div class="form-group container h-100">
		<label for="zip">
				<strong>Zip:</strong>
				<input type="text" id="zip" name="zip">
			</label>
		</div>
		 <div class="form-group row">
		        <label for="picture" class="form-control">Upload your image</label>

		        <div class="col-md-6">
		            <input type="file" class="form-control" name="picture" accept="image/*" onchange="readURL(this)">
		        </div>
			
			<div class="form-group container h-100">
			<label for="bio">
				<strong>About Supplier</strong><textarea class="form-control" name="bio" id="bio" cols="30" rows="10"></textarea>
			</label>
			</div>
		<br>
		<div class="form-group container h-100">
		<input class="btn btn-primary btn-customized align-bottom" type="submit" value="Submit the supplier information">
		</div>
		</form>
	</div>
</div>

@endsection
