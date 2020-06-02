@extends('layout')

@section('title')
Update Supplier's information
@endsection

@section('content')

<h2> Fill out the following form to update a supplier's profile</h2>
@include('partials.errors')

<div class="container-fluid">
    <div class="row h-100 justify-content-center align-items-center">
		<form method="post" action="{{'profiles.store' }}" enctype="multipart/form-data">
			<div class="form-group container h-100">

				@csrf
				<label for="username">
					<strong>Name:</strong>
					<input type="text" id="username" name="username" value="{{ $profile->username}}">
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
					<input type="text" id="address" name="address" value=" {{$profile->address }}">
				</label>
			</div>

			<div class="form-group container h-100">
			<label for="city">
					<strong>City:</strong>
					<input type="text" id="city" name="city" value="{{$profile->city}}">
				</label>
			</div>

			<div class="form-group container h-100">
			<label for="province">
					<strong>Province:</strong>
					<input type="text" id="province" name="province" value="{{$profile->province}}">
				</label>
			</div>

			<div class="form-group container h-100">
			<label for="zip">
					<strong>Zip:</strong>
					<input type="text" id="zip" name="zip" value="{{$profile->zip}}">
				</label>
			</div>

			<div class="form-group container h-100">
			 <div class="form-group row">
			        <label for="picture" class="form-control">Upload your image</label>

			    <div class="col-md-6">
			            <input type="file" class="form-control" name="picture" value="{{$profile->picture}}"accept="image/*" onchange="readURL(this)">
			        </div>
			    </div>

			<div class="form-group container h-100">
				<label for="bio">
					<strong>About Supplier</strong><textarea class="form-control" name="bio" id="bio" value="{{$profile->bio}}" cols="30" rows="10"></textarea>
				</label>
			</div>

			<input type="submit" value="Update the Supplier Information">
			</form>

@endsection
