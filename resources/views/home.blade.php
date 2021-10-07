<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.cosplay-exchange.com/site2/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2020 13:24:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('homepage/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">
</head>
<body>


<!-- Topbar -->
<div class="container-fluid pt-2 pb-2 bg-black text-center text-uppercase auc-topbar-text">
    <span class="text-white">
        @if(Auth::check())
    </span><a class="text-cyan text-decoration-none" href="{{ route('member.area') }}">Member Area!</a>
            @else
            Already a member?</span> <a class="text-cyan text-decoration-none" href="{{ route('login') }}">Sign In</a>
    @endif
</div>
<!-- /Topbar -->

<!-- Banner -->
<div class="container-fluid p-0">
    <div class="auc-header-banner-wrapper position-relative">
        <div class="auc-header-banner">
            <img src="{{ asset('homepage/images/logo-black.png') }}" alt="">
        </div>
        <div class="auc-header-text-wrapper text-white text-uppercase text-center position-absolute">
            <p class="text-white h mb-4">TRADE OLD COSPLAYS FOR NEW</p>
            <h1 class="mb-4">Cosplay exchange</h1>

            <a href="{{ route('register') }}" class="text-decoration-none">Try It Free</a>
        </div>
    </div>
</div>
<!-- /Banner -->

<!-- Content -->
<div class="container-fluid content p-0 text-center text-white pt-5">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1">
            <h1 class="text-uppercase h3 font-weight-bold line-height-1 mt-3 mb-5">Exchange your cosplay costumes with thousands of cosplayers across america.<br>Save $$$ thousands, only $15/month to trade costumes as often as you like!</h1>
        </div>
    </div>

    <div class="row content">
        <div class="col-lg-12">
            <h2 class="text-uppercase font-weight-bold mt-5 h3 auc-top-bottom-borders pt-2 pb-2">4 simple steps</h2>
        </div>
    </div>

    <div class="row content">
        <div class="col-lg-10 offset-lg-1">
            <div class="icons-wrapper text-center mt-5 pt-5 mb-5">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <img class="w-50" src="{{ asset('homepage/images/1uploadiconj.png') }}" alt="">
                        <p class="h3 line-height-1 font-weight-bolder text-capitalize">Upload your cosplay</p>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <img class="w-50" src="{{ asset('homepage/images/2notificationicon.png') }}" alt="">
                        <p class="h3 line-height-1 font-weight-bolder text-capitalize">Receive notification of interest + ship</p>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <img class="w-50" src="{{ asset('homepage/images/3coinsicon.png') }}" alt="">
                        <p class="h3 line-height-1 font-weight-bolder text-capitalize">Receive cosplay coins</p>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <img class="w-50" src="{{ asset('homepage/images/4nextcosplay.png') }}" alt="">
                        <p class="h3 line-height-1 font-weight-bolder text-capitalize">Select your next cosplay</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row content textual-content-1">
        <div class="col-lg-10 offset-lg-1">
            <div class="mt-5 mb-4 pt-3">
                <h1 class="text-uppercase text-italic heading-large font-weight-bold">Building a cosplay costume community</h1>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
            <div class="mb-5 mt-1 pt-3 pb-3">
                <h2 class="font-weight-bold text-capitalize line-height-1">By becoming a member, you immediately become part of the most engaged community of cosplayers and costume enthusiasts in america.</h2>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-1 col">
            <div class="mt-5 pt-5">
                <h2 class="font-weight-bold text-capitalize line-height-1 text-center">Access thousands of cosplay costumes</h2>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
            <div class="mb-5 mt-1 pt-3">
                <p class="text-capitalize font-size-lg">As a cosplay exchange memeber, you can use your cosplay coins to look through the widest range of high quality costumes that other cosplayers looking to exchange.</p>
                <p class="text-capitalize font-size-lg">With HD photos, videos, full description and more, it is just a matter of time before you find the perfect costume for your next event!</p>
                <p class="text-capitalize font-size-lg">If the costume you want costs more than your available cosplay coins, you can use our secure square and PayPal payment methods to top up your balance!</p>
            </div>
        </div>
        <div class="col-lg-10 offset-lg-1">
            <div class="mt-5 mb-5 pt-3">
                <h2 class="font-weight-bold text-uppercase line-height-1">Anime - Superhero - Villains - TV/Shows - Steam punk - Princess - Mermaid</h2>
            </div>
        </div>
    </div>

    <div class="row  content">
        <div class="col-lg-4 col-md-12 mb-1">
            <div id="carousel1Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('homepage/images/carousel/AdobeStock_145579310.jpg') }}" class="d-block w-100 h-100" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel1Controls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel1Controls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-1">
            <div id="carousel2Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('homepage/images/carousel/elves.jpg') }}" class="d-block w-100 h-100" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel2Controls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel2Controls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 mb-1">
            <div id="carousel3Controls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('homepage/images/carousel/steampunk-880409_12802.jpg') }}" class="d-block w-100 h-100" alt="">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel3Controls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel3Controls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row textual-content-1">
        <div class="col-lg-12">
            <div class="mt-5 mb-5 pt-3">
                <h2 class="font-weight-bold text-uppercase line-height-1">The most affordable way to cosplay</h2>
                <p class="font-size-lg mb-0">For just $15 per month, you receive unlimited access to a wide range of second-hand cosplay costumes and accessories from around the country!</p>
                <p class="font-size-lg mt-0">With the opportunity to exchange the costumes that you have already used for the ones you want, you can save thousands of dollars per year using the Cosplay Exchange.</p>
            </div>
        </div>
    </div>

</div>
<!-- /Content -->

<!-- bg -->
<div class="container-fluid p-0 mt-4 mb-5">
    <div class="auc-content-banner-wrapper">
        <div class="auc-content-banner position-relative">
            <div class="auc-content-text-wrapper position-absolute">
                <div class="overlay-content">
                    <h1 class="text-capitalize font-weight-bold">Search thousands of costumes for your next cosplay.</h1>
                </div>
                <h2 class="h1 text-capitalize text-white">Trade in your old cosplay for a new pre owned one!</h2>
            </div>
        </div>
    </div>
</div>
<!-- /bg -->

<!-- Content -->
<div class="container-fluid p-0 mt-5 mb-5 textual-content-1">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/blurred-background-casual-close-up-2014867.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/AdobeStock_171547372.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/adult-concert-cosplay-950775.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <h2 class="h3 font-weight-bold text-uppercase text-white text-center line-height-2">Copslay exchange  makes it faster, easier and more affordable than ever for you to turn your old costumes into an exciting new one for your next party or convention!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

<!-- Content -->
<div class="container-fluid p-0 mt-5 mb-5 textual-content-1">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="pt-5">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <h2 class="h3 font-weight-bold text-uppercase text-white text-center line-height-2">With a passion for creative incredible costumes, accessories and more, you will be amazed at how easy it is to find the right costume for any convention</h2>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/judeus-samson-rAomxXulMNM-unsplash.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/superman.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-sm-4">
                        <img  class="w-100 h-100" src="{{ asset('homepage/images/gambit.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->

<!-- Content -->
<div class="container-fluid price-section-wrapper p-0 mt-5">
    <div class="container price-detail-wrapper pl-5 pr-5">
        <p class="text-uppercase">Only for</p>
        <div class="heading-4x text-white text-center">$15</div>
        <p class="text-uppercase">per month</p>
        <div class="call-to-action-btn-wrapper text-center position-relative">
            <a  class="call-to-action-btn btn bg-white btn-lg text-uppercase ml-auto mr-auto" href="{{ route('register') }}">Get started for free</a>
        </div>

    </div>

</div>
<!-- /Content -->

<!-- Content -->
<div class="container-fluid p-0 mb-5">
    <div class="swords-background-warpper position-relative">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <p class="sword-image-forground-text text-white">Discover why cosplayers around the country are joining Cosplay Exchange for all their costume needs by becoming a member!</p>
            </div>
        </div>
    </div>
</div>
<!-- /Content -->
<!-- Footer -->
<footer class="mt-5 pt-5 text-center">
    <div class="container">
        <div class="logo-wrapper">
            <img src="{{ asset('homepage/images/logo-purple-bg.png') }}" alt="">
        </div>
        <nav class="footer-navbar">
            <ul>
                <li>
                    <a href="#">Terms & Conditions</a>
                </li>
                <li>
                    <a href="#">Privacy Policy</a>
                </li>
                <li>
                    <a href="#">Rules</a>
                </li>
            </ul>
        </nav>
        <p class="text-center">&copy; 2019 Copyright Cosplay-Exchange</p>
    </div>
</footer>
<!-- /Footer -->




<!-- Scripts -->
<script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
<script src="{{ asset('homepage/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('homepage/js/script.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>
