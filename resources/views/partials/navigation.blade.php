
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



<!-- <form action="{{route('search')}}" method="post" role="search">
{{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
        placeholder="Search food here"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form> -->



<!-- <nav class="navbar navbar-light bg-light">
    
    <ul class="navbar-nav">

        <li class="nav-item" class="mx-auto">
            <figure  >
                <img class=".img-responsive" hspace="18" alt="logo" src="{{ asset('img/food-app-logo.png')}}">
            </figure>
        </li>

        <li class="nav-item">
            <a class="navbar-brand" href="{{ route( 'food.index') }}">
            Home
            </a>
        </li>
        @auth
        <li class="nav-item">
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
</nav> -->