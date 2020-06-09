@extends('layout')
@section('title')
	Create Food Form
	@endsection

	@section('content')
	<p>Enter the details about your food</p>

	@include('partials.errors')

	<div class="container-fluid">
    	<div class="row h-100 justify-content-center align-items-center">

			<form method="post" action="{{ route('food.store')}}" enctype="multipart/form-data">
			@csrf
			<label for ="foodname">
				<strong>Name of your food item</strong>
				<input type="text" id="foodname" name="foodname">
			</label>

			<br>
			<label for ="ingredients">
				<strong>Enter the ingredients detail</strong>
				<textarea class="form-control" placeholder="Enter the name of your food item" id="ingredients" name="ingredients" cols="30" rows="10"></textarea>
			</label>
			<br>

			 <label for ="price">
				<strong>Price</strong>
				<input type="text" id="price" name="price">
			</label>


			<div class="form-group row">
		        <label for="photo" class="form-control">Add image of your food</label>

		        <div class="col-md-6">
		            <input type="file" class="form-control" name="photo" accept="image/*" onchange="readURL(this)">
		        </div>

		        </div>
	
		<!-- <input type="submit" Value="Publish Tweet">
		 --> <div class="form-group container h-100">
		        <input class="btn btn-primary btn-customized align-bottom" type="submit" value="Publish your Food">
  			</div>

			</form>
		</div>
	</div>
	@endsection