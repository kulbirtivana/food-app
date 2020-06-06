<nav class="navbar navbar-light bg-light" role="navigation">
    
    <ul class="navbar-nav">

        <li class="nav-item" class="mx-auto">
            <figure  >
                <img class=".img-responsive" hspace="18" alt="logo" src="{{URL('/twitter-logo.png')}}">
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
</nav>