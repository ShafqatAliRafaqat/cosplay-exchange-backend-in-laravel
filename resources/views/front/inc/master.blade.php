<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosplay Exchange</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/drama.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Linearicon Font -->
    <link rel="stylesheet" href="{{ asset('front/plugins/linearicon/css/lnr-icon.css') }}">
    <!-- FontAwesome Free Font -->
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/css/font-awesome.min.css') }}">
    <!-- Slick slider CSS -->
    <link rel="stylesheet" href="{{ asset('front/plugins/slick/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/slick/css/slick-theme.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/pink.css') }}" id="color">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('front/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('front/js/respond.min.js') }}"></script>
    <![endif]-->
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/1bcaba73a443201e2a5affc89/bd467ff908983bcb1b1639be3.js");</script>
    @yield('styles')

</head>
<body>
<!-- Home Wrapper -->
<div class="home-wrapper">
    <header>
        <!-- Top Header Section -->
      @include('front.inc.topheader')
        <!-- /Top Header Section -->

        <!-- Main header Section -->
        <div class="main-header-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main-menu menu-section w-100 d-inline-block d-md-block">
                           @include('front.inc.navbar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /Header -->

    <!-- Slider-wrapper -->

    @yield('content')


    <!-- Footer -->
    <footer>
        <div class="top-footer py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 text-left xs-text-center">
                        <img class="img img-fluid" src="{{ asset('front/img/logo_finall.png') }}" alt="Footer Logo" style="width: 70%" />
                    </div>
                    <div class="col-md-6 text-center">
                        <ul class="my-4 my-md-0">
                            <li class="list-inline-item"><img class="img img-fluid" src="{{ asset('front/img/pay1.png') }}" alt="Payment Method" /></li>
                            <li class="list-inline-item"><img class="img img-fluid" src="{{ asset('front/img/Paypal.png') }}" alt="Payment Method" style="height:40px" /></li>
{{--                            <li class="list-inline-item"><img class="img img-fluid" src="{{ asset('front/img/pay3.png') }}" alt="Payment Method" /></li>--}}
                            <li class="list-inline-item"><img class="img img-fluid" src="{{ asset('front/img/pay4.png') }}" alt="Payment Method" /></li>
{{--                            <li class="list-inline-item"><img class="img img-fluid mt-2 mt-sm-0" src="{{ asset('front/img/pay5.png') }}" alt="Payment Method" /></li>--}}
                        </ul>
                    </div>
                    <div class="col-md-3 text-right">
                        <div class="social-widget">
                            <ul class="lh-0 xs-text-center">
                                <li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="d-inline-block" href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="middle-footer py-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-md-5 mb-lg-0">
                        <div class="company-info-widget mb-4 mb-md-0">
                            <h5 class="text-theme">About</h5>
                                                 <p class="pt-4">We have designed the most optimal cosplay trading platform in America. By becoming a member, you immediately become part of the most engaged community of cosplayers and costume enthusiasts in America.</p>
                            <p class="pt-3 pb-0">Just $15 per month gives you unlimited access and costume trading abilities all across the country. Get your next costume by trade and save thousands!
</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-md-5 mb-lg-0">
                        <div class="mb-4 mb-md-0">
                            <h5 class="text-theme">Cosplay Exchange</h5>
                            <ul class="pt-4 footer-list-style">
                                <li><a class="text-footer" href="{{ route('home') }}"><i class="lnr lnr-chevron-right mr-2"></i>Home</a></li>
                                <li><a class="text-footer" href="{{ route('cosplay.costume.index') }}"><i class="lnr lnr-chevron-right mr-2"></i>Costumes</a></li>
                                <li><a class="text-footer" href="{{ route('contact') }}"><i class="lnr lnr-chevron-right mr-2"></i>Contact Us</a></li>
                                <li><a class="text-footer" href="{{ route('faq') }}"><i class="lnr lnr-chevron-right mr-2"></i>Questions And Answers</a></li>
                                <li><a class="text-footer" href="{{ route('member.forum.index') }}"><i class="lnr lnr-chevron-right mr-2"></i>Forum</a></li>
                                <li><a class="text-footer" href="{{ route('login') }}"><i class="lnr lnr-chevron-right mr-2"></i>Login</a></li>
                                <li class=" mb-0"><a class="text-footer mb-0" href="{{ route('register') }}"><i class="lnr lnr-chevron-right mr-2"></i>Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media screen and (max-width: 768px) {

                .copyright p span{
                    display: block;
                }
            }
        </style>
        <div class="bottom-footer text-center py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 copyright">
                        <p>
                            <span>Copyright ©<script>document.write(new Date().getFullYear());</script>. <a href="{{ route('home') }}" style="color: #3E1779"> Cosplay-sdfExchange</a></span>
                            <span> All rights reserved </span>
                        </p>
                        <p><small style="font-size: 20%;">This system is made with <i class="lnr lnr-heart"  style="color: #3E1779" aria-hidden="true"></i>by <a href="javascript:void(0);"  style="color: #3E1779">TheWebIcon</a></small></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->
</div>

<!-- jQuery -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Slick Js-->
<script src="{{ asset('front/plugins/slick/js/slick.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('front/js/script.js') }}"></script>
@include('sweetalert::alert')
@yield('scripts')
</body>
</html>
