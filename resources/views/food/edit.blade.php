@extends('layout')

@section('title')
Edit Food
@endsection

@section('content')
<p>Use this form to edit a food item</p>

{{--@include('partials.errors')--}}

<form method="post" action="{{ route('food.update', $food->id) }}">
	@csrf
	@method('PATCH')

	<label for ="foodname">
		<strong>Name of your food item</strong>
		<input type="text" id="foodname" name="foodname">
	</label>
<br>

	<label for ="ingredients">
		<strong>Enter the ingredients detail</strong>
		<textarea class="form-control" name="Enter the name of your food item" id="ingredients" cols="30" rows="10">{{ $food->ingredients }}</textarea>
	</label>

	<div class="form-group row">
        <label for="photo" class="form-control">{{ __('Add image of your food')}}</label>

        <div class="col-md-6">
            <input type="file" class="form-control" name="photo" accept="image/*" onchange="readURL(this)">{{$food->photo}}
        </div>
     </div>


		<input type="submit" Value="Update Food Item">
	</form>

	  <form action="{{ route('food.destroy', $food->id) }}" method="post">
                @csrf 
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete Food">
@endsection
