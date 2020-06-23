<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event</title>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <script src="{{asset('/js/jquery.js')}}"></script>
        <script src="{{asset('/js/popper.js')}}"></script>
        <script src="{{asset('/js/bootstrap.js')}}"></script>
        <script src="{{asset('/js/js.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-dd shadow-sm fixed-top" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                   <b><strong>HOME</strong> </b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown active" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <strong><i>
                                <?php
                                echo strtoupper(Auth::user()->name);
                                ?>
                                </i></strong>
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <table>
                                    <tr>
                                        <td>
                                            <a class="nav-link" href="{{url('/AjouterPost')}}"><strong>Add Post</strong></a>
                                        </td>
                                        <td><span> <a href="{{url('/AjouterPost')}}"><img class="img-edit" src="{{asset('image/add.png')}}" alt=""></a></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="a-edit" href="{{url('/profile')}}/{{Auth::user()->name}}"><span
                                                    class="edit-pofile"><strong>Edit Profile</strong></a>
                                        </td>
                                        <td> </span>
                                        <a href="{{url('/profile')}}/{{Auth::user()->name}}">
                                        <img class="img-edit" src="{{asset('/image/edit1.png')}}" alt=""></a></td>
                                    </tr>

                                    <tr>
                                        <td >
                                            <a href="{{ url('/logout') }}" >
                                                     <span class="edit-pofile a-edit">
                                                <strong>Logout</strong></span>
                                            </a>
                                        </td>
                                        <td style="text-align:right" ><a href="{{ url('/logout') }}" ><img class="img-logout" src="{{asset('/image/logout.png')}}" alt=""></a></td>
                                    </tr>
                                </table>

                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield("content")
        <div class="container">
            <div class="row">
                <div style="text-align:center;background-color:#e6e6e6;border-radius:50%;" class="col-12">
                 DESIGNED BY SEKKAF AND CHABNOUNE
                </div>
            </div>
        </div>
    </body>

</html>