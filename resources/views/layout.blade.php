<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
  <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="{{asset('/js/jquery.js')}}"></script>
  <script src="{{asset('/js/popper.js')}}"></script>
  <script src="{{asset('/js/bootstrap.js')}}"></script>
  <script src="{{asset('/js/js.js')}}"></script>
<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-dd shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                          <li class="nav-item"><a class="nav-link"  href="{{url('/AjouterPost')}}">Add Post</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <a class="a-edit" href="{{url('/profile')}}/{{Auth::user()->name}}"><span class="edit-pofile">Edit Profile &nbsp;&nbsp; </span><img class="img-edit" src="{{asset('/image/edit1.png')}}" alt=""></a>
                                   <br>
                                    <a class="dropdown-item a-logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <img class="img-logout" src="{{asset('/image/logout.png')}}" alt="">
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

@yield("content")
</body>
</html>