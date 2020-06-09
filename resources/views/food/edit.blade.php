@extends('layout')

@section('title')
Edit Food
@endsection

@section('content')
<h1 class="text-center"> Use this form to edit a food item</h1>

@include('partials.errors')

<div class="container-fluid">
    <div class="row h-100 justify-content-center align-items-center">

		<form method="post" action="{{ route('food.update', $food->id) }}">
			<div class="form-group container h-100">

			@csrf
			@method('PATCH')

			<label for ="foodname">
				<strong>Name of your food item</strong>
				<textarea class="form-control" type="text" id="foodname" name="foodname" cols="2" rows="2">{{$food->foodname}}
			</textarea>
		<br>

			<label for ="ingredients">
				<strong>Enter the ingredients detail</strong>
				<textarea class="form-control" name="ingredients" id="ingredients" name="ingredients" cols="30" rows="10">{{ $food->ingredients }}</textarea>
			</label>
			<br>
			<label for ="price">
				<strong>Price</strong>
				<textarea class="form-control" type="text" id="price" name="price" cols="2" rows="2">{{$food->price}}
			</textarea>			</label>

			<div class="form-group row">
		        <label for="photo" class="form-control">{{ __('Add image of your food')}}</label>

		        <div class="col-md-6">
		            <input type="file" class="form-control" name="photo" accept="image/*" onchange="readURL(this)">{{$food->photo}}
		        </div>
		     </div>


				<input type="submit" Value="Update Food Item">
			</form>
			<br>

	  <form action="{{ route('food.destroy', $food->id) }}" method="post">
                @csrf 
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete Food">
        </form>

    </div>
</div>
@endsection
