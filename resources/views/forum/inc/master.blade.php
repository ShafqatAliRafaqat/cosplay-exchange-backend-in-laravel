<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosplay :: Forum</title>

    <!-- Bootstrap -->
    <link href="{{ asset('forum/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom -->
    <link href="{{ asset('forum/css/custom.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/drama.png')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('forum/font-awesome-4.0.3/css/font-awesome.min.css') }}">

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{ asset('forum/css/style.css') }}" media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('forum/rs-plugin/css/settings.css') }}" media="screen" />
    @yield('styles')

</head>
<body>

<div class="container-fluid">

    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>
                <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('front/img/swords-third.jpg') }}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center" data-bgrepeat="no-repeat">
                    <!-- LAYERS -->
                </li>
            </ul>
        </div>
    </div>
    <!-- //Slider -->

    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{ url('/') }}"><img src="{{ asset('front/img/logo_final.png') }}" alt="" style="width: 171px;height: 67px;"  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                </div>
                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <form action="{{ route('member.forum.search') }}" method="post" class="form">
                            @csrf
                            @method('POST')
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics" name="topic"></div>
                            <div class="pull-right"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <form action="03_new_topic.html" method="post" class="form">
                            <!-- <a href="{{ route('member.post.create') }}" class="btn btn-primary">Start New Topic</a> -->
                        </form>
                    </div>
                    <!--                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>-->
                    <div class="avatar pull-left dropdown" style="margin-left: 6%">
                        <a data-toggle="dropdown" href="#"><img class="profileImage " style="box-shadow: 0px 0px 8px 8px rgb(186 18 254)" src="{{ asset('uploads/'.Auth::user()->profile->img) }}" alt="" /></a> <b data-toggle="dropdown" class="caret" style="
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #000000;
    margin-left: 8px;cursor: pointer;
"></b>
                        <div class="status {{ \Illuminate\Support\Facades\Auth::user()->isOnline()?'green':'red' }}">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('member.post.index') }}">My Posts</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="{{ url('/') }}">Cosplay-Exchange</a></li>
                            <li role="presentation">

                            <a a role="menuitem" tabindex="-3" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>

                        </ul>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')




    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-9 col-sm-5 ml-3 ">
                    <p>Copyrights {{ \Carbon\Carbon::now()->year }}, Cosplay-Exchange.</p>
                    <p>
                        <small style="font-size: 20%;color: white !important;"> Made with <i class="fa fa-heart"></i> by
                        <a href="javascript:void(0);">TheWebIcon</a></small> 
                    </p>
                </div>
                <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                    <ul class="socialicons">
                        <li><a href="https://www.facebook.com/groups/cosplayexchange/"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="https://www.instagram.com/cosplayexchange/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="mailto:tradeyourcosplay@gmail.com"><i class="fa fa-mail-reply"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCsiM1s-AgUYPvrrrSvKQGQg"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- get jQuery from the google apis -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>


<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{ asset('forum/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('forum/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ asset('forum/js/bootstrap.min.js') }}"></script>


<!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
<script type="text/javascript">

    var revapi;

    jQuery(document).ready(function() {
        "use strict";
        revapi = jQuery('.tp-banner').revolution(
            {
                delay: 15000,
                startwidth: 1200,
                startheight: 278,
                hideThumbs: 10,
                fullWidth: "on"
            });

    });	//ready

</script>
@include('sweetalert::alert')
@yield('scripts')

<!-- END REVOLUTION SLIDER -->
</body>
</html>

