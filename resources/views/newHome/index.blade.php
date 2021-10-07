<!doctype html>
<html lang="en">
  <head>
    <title>CosPlay Exchange</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('home/img/favicon.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('home/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('home/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}">



  </head>
  <body>

    <header role="banner">
      <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                  <div class="header_top">
                    <h2 id="spin"></h2>
                  </div>
                </div>
            </div>
        </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand position-absolute" href="index.html"><img src="{{asset('home/img/logo.png')}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse position-relative" id="navbarsExample05">
            <ul class="navbar-nav mx-auto pl-lg-5 pl-0 d-flex align-items-center">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/my_Profile')}}" id="dropdown04" aria-haspopup="true" aria-expanded="false">MY PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/sales')}}">SELL</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">SHOP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/resource')}}">RESOURCES</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link signin" href="#">SIGN IN</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="container-fluid video">
      <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="{{asset('home/vid/Cosplay-exchange-Aniamtion.mp4')}}" type="video/mp4">
      </video>

    </section>
    <!-- END slider -->

    <section class="container-fluid cta-overlap">
      <div class="container">
      <div class="text">
        <h2 class="h3">SEARCH COSPLAY ACROSS AMERICA</h2>
        <div class="ml-auto btn-wrap">
          <a href="{{url('my_Profile')}}" class="btn-cta btn gold-btn">Try For Free</a>
        </div>
      </div>
    </div>
    </section>
    <!-- END section -->

    <section class="section bg-light">
      <div class="container" style="margin-bottom: -150px !important;">
        <div class="row element-animate">
          <div class="major-caousel js-carousel-0 owl-carousel">
          <div>
          <div class="row mb-0">
          <div class="col-md-6 mb-5">
            <h2 class="text-uppercase heading text-center mb-4">COSPLAYS</h2>
            <img src="{{asset('home/img/cosplays.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
          </div>

          <div class="col-md-6 mb-5">
            <h2 class="text-uppercase heading text-center mb-4">ACCESSORIES</h2>
            <img src="{{asset('home/img/accessories.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
          </div>
        </div>

        <div class="row justify-content-center mb-5 element-animate fadeInUp element-animated">
          <div class="col-md-10 text-center">
            <h2 class="text-uppercase heading-in mb-5">BUY - SELL - TRADE</h2>
            <p class="mb-3 lead-in mb-5">Exchange your cosplay costumes with thousands of cosplayers across America</p>
            <p><a href="#" class="btn black-btn">View All Cosplays</a></p>
          </div>
        </div>
            </div>
            <div>
              <div class="row no-gutters mt-5">
          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/1.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/2.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/3.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>

          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/4.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/5.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>
          <div class="col-md-4 element-animate">
            <a>
              <img src="{{asset('home/img/6.png')}}" alt="Image placeholder" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="row justify-content-center mt-5 element-animate fadeInUp element-animated">
          <div class="col-mt-20 text-center">
            <p><a href="works.html" class="btn normal-btn">View All Cosplays</a></p>
          </div>
        </div>
        </div>

        <div>
          <div class="row justify-content-center mt-5 mb-5 element-animate fadeInUp element-animated">
            <div class="col-md-8 text-center">
              <h2 class="text-uppercase heading-in3 mb-4">Meet the cosplay coin</h2>
            </div>
          </div>

          <div class="row align-items-center">
          <div class="col-md-12 mb-5 mb-md-0 element-animate fadeInUp element-animated">
            <div>
              <p class="lead-in3">Cosplay coins are non-redeemable but exchangable cosplay trading tokens (comparable to video game coins).</p>
              <p class="lead-in3">Thay are used on our platform for cosplayers to trade with eachother.</p>
            </div>
          </div>
          <div class="col-md-6 mb-5 mb-md-0 element-animate fadeInUp element-animated">
            <div>
              <p class="lead-in3">Every time you upload & sell a old cosplay you receive cosplay coins.</p>
              <p class="lead-in3">You also receive cosplay cons as part of your membership.</p>
              <p  class="pt-lg-5"><a href="#" class="btn black-btn pr-lg-5 pl-lg-5"> Membership </a></p>
            </div>
          </div>
          <div class="col-md-6 mt-5 element-animate fadeInUp element-animated">
            <img src="{{asset('home/img/coins.png')}}" alt="" class="img-fluid">
          </div>
        </div>
        </div>

        </div>
          <!-- END slider -->
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section ribbon-wrapper"></section>

    <footer class="site-footer bg-dark" role="contentinfo">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center mb-5">
              <h3 class="text-white gold-highlight">CONNECT</h3>
              <ul class="list-unstyled footer-link footer-social text-center">
                  <li class="d-inline-block"><a href="#" class="p-3 m-2 twitter"></a></li>
                  <li class="d-inline-block"><a href="#" class="p-3 m-2 facebook"></a></li>
                  <li class="d-inline-block"><a href="#" class="p-3 m-2 instagram"></a></li>
                  <li class="d-inline-block"><a href="#" class="p-3 m-2 pinterest"></a></li>
                  <li class="d-inline-block"><a href="#" class="p-3 m-2 youtube"></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mr-5">
            <h3 class="text-white">Overview</h3>
            <p class="text-white">
            We have designed the most optimal cosplay trading platform in america. By becoming a member, You immediately become part of the most engaged community of cosplayers and costume enthusiasts in america.</p>
            <p class="text-white">With very affordable subscriptions you have the option to choose from two membership types. Pay only when you sell ($5) or purchase a menthly subscription for $8 a month with absolutley no selling fees.</p>
            <p class="text-white">with either membership you will receive unlimited access and costume trading ablities all across the country. Get your next custume by trade and save thousands!
            </p>
          </div>
          <div class="col-md-3">
            <h3 class="text-white">Navigate</h3>
            <ul class="list-unstyled footer-link">
              <li class="link-area"><a href="#">Join our mailing list</a></li>
              <li class="link-area"><a href="#">Be Featured</a></li>
              <li class="link-area"><a href="{{url('subscription')}}">Subscriptions</a></li>
              <li class="link-area"><a href="{{url('profileForm')}}">My Profile</a></li>
              <li class="link-area"><a href="{{url('/resource')}}">Resources</a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3 class="text-white">&nbsp;</h3>
            <ul class="list-unstyled footer-link">
              <li class="link-area"><a href="{{url('contact_us')}}">Contact Us</a></li>
              <li class="link-area"><a href="#">Shop</a></li>
              <li class="link-area"><a href="#">Register</a></li>
              <li class="link-area"><a href="#">Sell</a></li>
              <li class="link-area"><a href="#">FAQ</a></li>
            </ul>
          </div>

        </div>

        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap mt-5">
          <p class="footer-text m-0"><img src="{{asset('home/img/logo-footer.png')}}" alt=""></p>
      </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap mt-5">
          <p class="footer-text m-0 text-white">Copyright © 2021 COSPLAY EXCHANGE. ALL RIGHTS RESERVED</p>
      </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="{{asset('home/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('home/js/popper.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
  </body>
</html>
