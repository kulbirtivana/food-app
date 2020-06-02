@extends('layout')

@section('title')
FoodApp
@endsection

@section('content')

@if (session()->get('success'))
<div role="alert">
	{{session()->get('success')}}
</div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header">List of Available Foods</div>

            <ul>@foreach($foods as $food)
                <div class="container">

                    <div class="row" class="col-sm">
                    <ul>
                    
             {{--<a href="{{ route('profiles.show', $food->profile_id) }}" class="text-dark" class="nav-link"></a>--}} 

		          <h3>{{$food->foodname }}</h3>
            <div class="text-center">
                {{--<img src="{{ asset('img/'.$food->photo) }}" alt="{{$food->foodname }}'s Name"
                    class="rounded-0"
                    width=200>--}}

                <img src="{{ ($food->photo) }}" alt="{{$food->foodname }}'s Name"
                    class="rounded-0"
                    width=200>
            </div>
        			<p>
                    {{ $food->ingredient }}
                	</p>
      		@auth
                <li>			
                	<a href="{{route('food.edit', $food->id) }}">Edit Food</a>
                </li>
                <li>
                <form action="{{ route('food.destroy', $food->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete Food">
                </form>

                {{--<small>{{ $food->posted_at }}</small> --}}

            @endauth
	</li>
        </ul>
@endforeach
    </div>

</div>

{{--<div class="row">
    <div class="col-12 text-enter">
    {{ $foods->links() }}
    </div>
	</div>--}}

	@endsection

	</div>



