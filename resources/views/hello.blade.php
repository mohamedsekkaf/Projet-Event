<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Event</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">

        <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">

        <link rel="stylesheet" href="{{asset('css/aos.css')}}">

        <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    </head>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

        <div class="site-wrap">

            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>

            <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-11 col-xl-2">
                            <h1 class="mb-0 site-logo"><a href="{{url('/')}}" class="text-black h2 mb-0">Event<span
                                        class="text-primary">.</span> </a></h1>
                        </div>
                        <div class="col-12 col-md-10 d-none d-xl-block">
                            <nav class="site-navigation position-relative text-right" role="navigation">

                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                                    <li><a href="{{url('/')}}" class="nav-link">Welcome</a></li>
                                    @guest
                                    <li><a href="{{url('/login')}}" class="nav-link">Login</a></li>
                                    <li>
                                        <a href="{{url('/register')}}" class="nav-link">Register</a>
                                    </li>
                                    @else
                                    <li><a href="{{Route('logout')}}">Logout</a></li>
                                    @endguest
                                   
                                    <li><a href="#user-section">Users</a></li>
                                    <li><a href="#information-section">Information</a></li>
                                    <li><a href="#team-section">Our Team</a></li>
                                </ul>
                            </nav>
                        </div>


                        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3"
                            style="position: relative; top: 3px;"><a href="#"
                                class="site-menu-toggle js-menu-toggle text-black"><span
                                    class="icon-menu h3"></span></a></div>

                    </div>
                </div>

            </header>


            <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade"
                data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center text-center">

                        <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">

                            <div class="row justify-content-center mb-4">
                                <div class="col-md-8 text-center">
                                    <h1>Welcome to Web Site </span></h1>
                                    <p class="lead mb-5">Gestion Event By <a href="#" target="_blank">EstsB</a>
                                    </p>
                                    @guest
                                    <div><a href="{{route('login')}}" class="btn btn-primary btn-md">Login</a></div>
                                    @else
                                        <div><a href="{{url('home')}}" class="btn btn-primary btn-md">Home</a></div>
                                    @endguest
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <br><br>
<!--             <section class="user-section" id="user-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <strong style="font-size:20px;text-align:center">
                                <h2>Number user</h2>
                            </strong>

                        </div>
                    </div>
                </div>
            </section> -->



            <section class="site-section testimonial-wrap" id="information-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h2 class="text-black h1 site-section-heading text-center">Information</h2>
                        </div>
                    </div>
                </div>
                <div class="slide-one-item home-slider owl-carousel">
                    <div>
                        <div class="testimonial">

                            <blockquote class="mb-5">
                                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                                    reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                                    illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;
                                </p>
                            </blockquote>

                            <figure class="mb-4 d-flex align-items-center justify-content-center">
                                <div><img src="images/person_3.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                                <p>John Smith</p>
                            </figure>
                        </div>
                    </div>
                    <div>
                        <div class="testimonial">

                            <blockquote class="mb-5">
                                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                                    reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                                    illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;
                                </p>
                            </blockquote>
                            <figure class="mb-4 d-flex align-items-center justify-content-center">
                                <div><img src="images/person_2.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                                <p>Christine Aguilar</p>
                            </figure>

                        </div>
                    </div>

                    <div>
                        <div class="testimonial">

                            <blockquote class="mb-5">
                                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                                    reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                                    illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;
                                </p>
                            </blockquote>
                            <figure class="mb-4 d-flex align-items-center justify-content-center">
                                <div><img src="images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                                <p>Robert Spears</p>
                            </figure>


                        </div>
                    </div>

                    <div>
                        <div class="testimonial">

                            <blockquote class="mb-5">
                                <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                                    reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                                    illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;
                                </p>
                            </blockquote>
                            <figure class="mb-4 d-flex align-items-center justify-content-center">
                                <div><img src="images/person_5.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                                <p>Bruce Rogers</p>
                            </figure>

                        </div>
                    </div>

                </div>
            </section>


            <div class="site-section border-bottom" id="team-section">
                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <div class="col-md-7 text-center">
                            <h2 class="text-black h1 site-section-heading">Our Team</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 " data-aos="fade" data-aos-delay="100">
                            <div class="person text-center">
                                <img src="image_user/sekkafourteam.png" alt="Image" class="imageourteam">
                                <h3>Mohammed sekkaf</h3>
                                <p class="position text-muted">Developper</p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at
                                    consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos
                                    est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.
                                </p>
                                <ul class="ul-social-circle">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 " data-aos="fade" data-aos-delay="200">
                            <div class="person text-center">
                                <img src="image_user/yassineourteam.png" alt="Image" class="imageourteam">
                                <h3>Yassine chabnoune</h3>
                                <p class="position text-muted">Developper</p>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at
                                    consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos
                                    est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.
                                </p>
                                <ul class="ul-social-circle">
                                    <li><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                    <li><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="site-footer">
                <div class="container">
                    <div class="row">

                        <div class="row  text-center">
                            <div class="col-md-12">
                                <div class="border-top ">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                        </script> All rights reserved | designed <i class="icon-heart text-danger"
                                            aria-hidden="true"></i> by <a href="https://colorlib.com"
                                            target="_blank">Sekkaf</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>

        </div> <!-- .site-wrap -->

        <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('js/aos.js')}}"></script>
        <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
        <script src="{{asset('js/jquery.sticky.js')}}"></script>

        <script src="js/typed.js"></script>
        <script>
        var typed = new Typed('.typed-words', {
            strings: ["Web Apps", " WordPress", " Mobile Apps"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        });
        </script>

        <script src="js/main.js"></script>



    </body>

</html>