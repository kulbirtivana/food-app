<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Food App</title>

        <meta name="description" content="HomeMadeFood : s">
         <link rel="shortcut icon" type="image/png" href="{{URL('images/LaraTweet-Logo.png')}}">
        <meta name=”robots” content="index, follow">

        <link rel="shortcut icon" type="image/png" href="{{URL('img/food-app-logo-3.png')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .register{
                background-color: #9CBF3D;
                color:white;
                padding: 10px;
                font-size: 18px;
                text-decoration: none;

            }

            .uses{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                list-style: none;
                font-size: 17px;

            }
            .uses li{
                width:50%;
            }

            .uses img{
                height:100px;
                width:100px;
            }
            @media screen and (max-width: 500px)
            {
                .foodphoto img{
                    height:100px;
                    width:100px;

                } 
            }
            
        </style>
    </head>
    <body>
            
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <figure  >
                <a href="{{ route( 'food.index') }}"><img class=".img-responsive" hspace="18" alt="logo" src="{{ asset('img/food-app-logo-3.png')}}"></a>
            </figure>
            <br>
            <h2>FoodApp</h2>
        </li>

        <li class="nav-item active">
            <a class="navbar-brand" href="{{ route( 'food.index') }}">
                        Home
            </a>
        </li>
        @auth

        <li class="nav-item active">
            <a class="navbar-brand" href="{{ route( 'food.create') }}">
            Add new Food
            </a>
        </li>

        <li class="nav-item">
        <a class="navbar-brand" href="{{ route( 'profiles.create') }}">
            Supplier/Vendor
            </a>
        </li>

        <li class="nav-item">
        <a class="navbar-brand" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        <form id="logout-form" action="{{ route('logout') }}"       method="POST" style="display: none;">
                {{ csrf_field() }}
        </form>
        </li>

        <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
        </li>
        @endauth
        @guest
        <li class="nav-item">
        <a class="navbar-brand" href="{{ route( 'login') }}">
            Login
            </a>
        </li>

        <li class="nav-item">
        <a class="navbar-brand" href="{{ route( 'register') }}">
            Register
            </a>
        </li>
        @endauth
    </ul>

    <div class="form-inline my-2 my-lg-0">
        <form action="{{route('search')}}" method="post" role="search">
        {{ csrf_field() }}
        <div class="input-group">
      <input class="form-control mr-sm-2" type="text" name="q" placeholder="Search Food Here"><span class="input-group-btn">
       <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
        </button>
    </span>
        </div>
        </form>
    </div>
</nav>


   <div class="content">

                <div>
                    
                    <figure class="mainbanner">
                        <img class=".img-responsive" class="container-fluid" src="{{ asset('img/main-food-1.jpg')}}">
                    </figure>
                </div>               
                <p class="social" ><h2>Fresh Pre Me4 y j 4ade Food</h2></p>
                    <div><a class="register" href="{{ route('food.index') }}">Check the available foods</a></div><br>
                </div>
                    
                </div>



    <section class="use">
        <p>
            <div class="uses">
                <li>Submit a New Food<br><img src="img/brand-awareness.jpeg" alt="brand awareness" title="submit new food"> </li>
                <li>Available Foods<br><img src="img/generate-leads.jpeg" alt="Available Foods" title="Available Foods"></li>
                <br>
                            </div>

             <div><a class="register1" href="{{ route('register') }}">Register Here</a></div>
        </p>
    </section>


    </body>
</html>
