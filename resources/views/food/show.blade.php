@extends('layout')

@section('title')

@endsection
@section('content')

<div class="container">
 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                	@include('partials.errors')

                    <h2>{{$food->foodname}}</h2>
                    <p>

                        @if((strpos($food->photo, 'http://', 0)===false) && (strpos($food->photo, 'https://', 0)===false))

                            <img src="{{ asset('img/'.$food->photo) }}" alt="{{$food->foodname }}'s Name" class="rounded-0" width=200>
                        @else

                            <img src="{{ ($food->photo) }}" alt="{{$food->foodname }}'s Name"
                                class="rounded-0"
                                width=200>
                            </div>

                        @endif
                    <p>{{ $food->ingredients }}</p>
                    </p>

                    <ul style="list-style: none;">
                                                    <li>
                                                    {{ $food->ingredient }}
                                                    </li>
                                                     <li>
                                                        Price: ${{($food->price)}}
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
                    
            </div>

        </div>
    </div>
</div>

@endsection