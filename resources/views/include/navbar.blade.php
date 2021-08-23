<nav
class="
  navbar navbar-expand-lg navbar-light navbar-store
  fixed-top
  navbar-fixed-top
"
data-aos="fade-down"
>
<div class="container">
  <a class="navbar-brand" href="">
    <img src="{{ url('images/logo.svg')}}" alt="" />
  </a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">Home </a>
      </li>
      <li class="nav-item {{ request()->is('category*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/category') }}">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Rewards</a>
      </li>
      @guest
      <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
      </li>
      <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
        <a
        class="btn btn-success nav-link px-4 text-white"
        href="{{ url('/login') }}">Sign In</a>
      </li>
      @endguest
    </ul>

    {{-- autenticated --}}
    <!-- Desktop Menu -->
    @auth
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img
                  src="{{url ('images/icon-user.png') }}"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                Hi, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="dropdown-item" href="{{ route('dashboard-setting') }}"
                  >Settings</a
                >
               <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                        <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
                            @csrf
                        </form>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block mt-2" href="{{route('cart')}}">
                @php $carts = \App\models\Cart::where('users_id', Auth::user()->id)->count(); 
                @endphp
                @if ($carts>0)
                <img src="{{url('images/icon-cart-filled.svg')}}" alt="" />
                <div class="badge badge-success card-badge">{{$carts}}</div>
                    @else
                <img src="{{url('images/icon-cart-empty.svg')}}" alt="" />
                @endif
              </a>
            </li>
          </ul>

          <!-- Mobile Menu -->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a class="nav-link" href="#">  Hi, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-inline-block mt-2" href="{{route('cart')}}">
                @php $carts = \App\models\Cart::where('users_id', Auth::user()->id)->count(); 
                @endphp
                @if ($carts>0)
                <img src="{{url('images/icon-cart-filled.svg')}}" alt="" />
                <div class="badge badge-success card-badge">{{$carts}}</div>
                    @else
                <img src="{{url('images/icon-cart-empty.svg')}}" alt="" />
                @endif
              </a>
            </li>
          </ul>
    @endauth

  </div>
</div>
</nav>