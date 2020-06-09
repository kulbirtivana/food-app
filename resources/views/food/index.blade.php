@extends('layout')

@section('title')
@endsection

@section('content')

@if (session()->get('success'))
<div role="alert">
	{{session()->get('success')}}
</div>
@endif


{{--<form action="{{route('search')}}" method="post" role="search">
{{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
        placeholder="Search food here"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>--}}

 @if((strpos($_SERVER['REQUEST_URI'],'search') !== false))

            <div class="container">
                @if(isset($details))
                <div class="container">
                <div class="card">
                    <div class="card-header">List of Available Foods related to your search -{{ $query }} are</div>

                        <div class="container">
                                    <div class="row">
                                        @foreach($foods as $food)
                                
                                        <div class="col-4">
                                                  <h3>{{$food->foodname }}</a></h3>
                                                        <div class="foodphoto">

                                                        @if((strpos($food->photo, 'http://', 0)===false) && (strpos($food->photo, 'https://', 0)===false))

                                                            <img src="{{ asset('img/'.$food->photo) }}" alt="{{$food->foodname }}'s Name"
                                                                class="rounded-0"
                                                                width=200>
                                                        @else

                                                            <img src="{{ ($food->photo) }}" alt="{{$food->foodname }}'s Name"
                                                                class="rounded-0"
                                                                width=200>
                                                        @endif
                                                        </div>
                                                        <ul>
                                                    <li>
                                                    {{ $food->ingredient }}
                                                    </li>
                                                    <li>            
                                                            <a class="btn btn-primary" href="{{route('cart.add', ['id'=>$food->id]) }}">Add to Cart</a>
                                                    </li>

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
                                    </div>

                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endif
            </div>
@else
    <div class="container">
        <div class="card">
            <div class="card-header">List of Available Foods</div>

                <div class="container">
                            <div class="row">
                                @foreach($foods as $food)
                        
                                <div class="col-4">
                                     {{--<a href="{{ route('profiles.show', $food->profile_id) }}" class="text-dark" class="nav-link"></a>--}} 

                        		          <h3>{{$food->foodname }}</h3>
                                                <div>

                                                @if((strpos($food->photo, 'http://', 0)===false) && (strpos($food->photo, 'https://', 0)===false))

                                                    <img src="{{ asset('img/'.$food->photo) }}" alt="{{$food->foodname }}'s Name"
                                                        class="rounded-0"
                                                        width=200>
                                                @else

                                                    <img src="{{ ($food->photo) }}" alt="{{$food->foodname }}'s Name"
                                                        class="rounded-0"
                                                        width=200>
                                                @endif
                                                </div>
                                                <ul style="list-style: none;">
                                			<li>
                                            {{ $food->ingredient }}
                                        	</li>
                                            <li>
                                                ${{($food->price)}}
                                            </li>
                                           

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

                                                 <li>            
                                                    <a class="btn btn-primary" href="{{route('cart.add', ['id'=>$food->id]) }}">Add to Cart</a>
                                            </li>

                                                {{--<small>{{ $food->posted_at }}</small> --}}

                                            @endauth
                                	           </li>
                                        </ul>
                            </div>

                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
@endif

    {{--<div class="row">
        <div class="col-12 text-enter">
        {{ $foods->links() }}
        </div>
    	</div>--}}

    	@endsection

	</div>



