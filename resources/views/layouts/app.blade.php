<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">

    body{
      background:linear-gradient(#a6a6a6, #fff) no-repeat;
      /* url("{{asset('image/abstract-antique-backdrop-164005.jpg')}}") repeat-y; */
      background-size: cover;
      /* background-blend-mode:saturation; */
      height: 100vh;
      font-weight:bold;
    }

    .navbar{
      background:#404040;
      border-bottom:2px solid ;
    }
    .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text, .navbar-default .navbar-brand{
      color:white;
    }
    .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover{
    color: #ccc;
    background-color: transparent;
    }
    .full-height {
        height: 100vh;
    }

    .panel{
      background:#b3b3b3;
      color:#fff;
      border:1px solid #cccccc;
    }
    .panel-default>.panel-heading, .panel-default>.panel-footer{
      background:#fff;
      color:#666;
    }
    .modal-content{
      background:#a6a6a6;
    }

    .navbar-nav>li>a.profile-image {
    padding-top: 10px;
    padding-bottom: 10px;
    }
    a.profile-image>img{
      width:30px;
      height:30px;
    }

    .btn{
      font-weight:bold;
    }

    .panel{
      border:4px solid #fff;
    }
    </style>
    @yield('css')
</head>
<body>
<div class="desaturate">
    <div id="app full-height">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <form class="navbar-form navbar-left" method="get" action="/viewbarangs">
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control" placeholder="Cari Barang..." required>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                  </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="glyphicon glyphicon-user"></i> Register</a></li>
                        @else
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        @if (Auth::user()->level!=1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Barang <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/viewbarang') }}">Lihat Barang</a></li>
                                <li>
                                    <a href="{{ url('/listbeli') }}">
                                        Lihat Keranjang Belanja
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/listcheckout') }}">
                                        Lihat Barang dipesan
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-expanded="false">
                                  @if($userdet->avatar!='')
                                  <img src="/profileimage/{{$userdet->avatar}}" class="img-circle">
                                  @else
                                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeBAMAAADJHrORAAAAG1BMVEXMzMyWlpa3t7eqqqrFxcW+vr6xsbGjo6OcnJwtaz+fAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAOElEQVQYlWNgGHaAyURdAUaC+U4tDTASDEwFBNhUQSSEy+rW0sBSACIhfDYjdQU2VRBJLxfTEAAAv8sIm/VDSJMAAAAASUVORK5CYII=" class="img-circle">
                                  @endif
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/viewuser') }}"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="glyphicon glyphicon-log-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
</div>
    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted ||
                         ( typeof window.performance != "undefined" &&
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>
    @yield('js')
</body>
</html>
