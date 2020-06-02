@extends('layout')

@section('title')
Show Food
@endsection
@section('content')

<div class="container">
 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                	{{--@include('partials.errors')--}}

                    <h2>{{$profile->username ?? ''}}</h2>
                    <p>
                       <strong> Available Foods are: </strong>
                    <br>
                    <div class="card-body"> 
                    <p>{{ $food->ingredients }}</p>
                    </p>
                      
                    
  {{--  <a href="{{route('comments.show', $tweet->id)}}" id="reply"></a>
                 
                    <div id="app">
                        <comment-create-form submission-url="{{route('comments.store')}}" tweet-id="{{ $tweet->id }}" v-model="content">
                            @csrf
                        </comment-create-form>
                        <Giphy v-on:image-clicked="imageClicked"/>
                </div>
    --}}
            </div>

        </div>
    </div>
</div>

@endsection