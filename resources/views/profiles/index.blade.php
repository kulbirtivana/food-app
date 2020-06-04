@extends('layout')

@section('title')
Food Suppliers
@endsection

@section('content')

@if(session()->get('success'))
<div role="alert">
	{{ session()->get('success')}}
</div>

@endif

<p>List of All Food Suppliers</p>
@foreach($profiles as $profile)
<div class="card" style="width: 36rem;">

	<div class="card-body">
	    <div class="row">
		    <div>
			    @if((strpos($profile->picture, 'http://', 0)===false) && (strpos($profile->picture, 'https://', 0)===false))

		           <img src="{{ asset('img/'.$profile->picture) }}" alt="{{$profile->username }}'s Name"
		                class="rounded-0" width=200>
	            @else

	                <img src="{{ ($profile->picture) }}" alt="{{$profile->picture }}'s Name"
	                    class="rounded-0"
	                    width=200>
	            @endif
	        </div>	       
					    	<h3>
								{{ $profile->username }}
							</h3>

							<br>

							 {{$profile->address}}
                       		 <p>
                            	{{ $profile->city}}, {{ $profile->province}}, {{ $profile->zip}}
                            <br>

                                                 
                            {{ $profile->bio}}
                            <br />
                        	<br>

							    <strong>{{ $profile->phone}}</strong>
                            <br /></p>
           

		</div>
	</div>
</div>
@endforeach
@endsection