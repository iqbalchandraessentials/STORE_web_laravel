<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ url('style/main.css')}}" rel="stylesheet" />
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="{{ url('images/dashboard-store-logo.svg')}}" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{route('dashboard')}}"
              class="list-group-item list-group-item-action {{(request()->is('dashboard') ? 'active' : '' )}}"
              >Dashboard</a
            >
            <a
              href="{{route('dashboard-product')}}"
              class="list-group-item list-group-item-action {{(request()->is('dashboard/product') ? 'active' : '' )}}"
              >My Products</a
            >
            <a
              href="{{route('dashboard-transaction')}}"
              class="list-group-item list-group-item-action {{(request()->is('dashboard/transaction') ? 'active' : '' )}}"
              >Transactions</a
            >
            <a
              href="{{route('dashboard-setting')}}"
              class="list-group-item list-group-item-action {{(request()->is('dashboard/store') ? 'active' : '' )}}"
              >Store Settings</a
            >
            <a
              href="{{route('dashboard-account')}}"
              class="list-group-item list-group-item-action {{(request()->is('dashboard/account') ? 'active' : '' )}}"
              >My Account</a
            >
          </div>
        </div>

        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>
  
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto d-none d-lg-flex">
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
                      src="{{url('images/icon-user.png')}}"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                    Hi,  {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('home')}}">Back to Store</a>
                    <a class="dropdown-item" href="{{route('dashboard-account')}}"
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
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Hi,  {{ Auth::user()->name }} </a>
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
            </div>
          </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-content-wrapper -->
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="{{ url('/vendor/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
