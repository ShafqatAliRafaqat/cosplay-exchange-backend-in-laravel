<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::check()?Auth::id():'' }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('front/img/drama.png')}}">
    <title>Member Area</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('back/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/toastr.min.css') }}">
    <!-- CSS only -->


    @yield('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style type="text/css">
        /* Place the navbar at the bottom of the page, and make it stick */
     #footer {
      border-top: 2px solid black;
      border-bottom: 2px solid black;
      background-color: #fff;
      position: fixed;
      bottom: 0;
      width: 100%;
      left: 0;
      height: 50px;
      text-align: center;
       margin-bottom: 30px;
       display: none;
    }

    /* Style the links inside the navigation bar */
    #footer a,#footer1 a {
      float: left;
      display: block;
      color: black;

      font-weight: 900;
      font-family: cursive;

      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    /* Change the color of links on hover */
    #footer a:hover{
      background-color: #42b9f5;
      color: black;
    }

    /* Add a color to the active/current link */
    #footer a.active,#footer1 a.active {
      background-color: #4CAF50;
      color: white;
    }


      #footer1 {

      background-color: #fff;
      position: fixed;
      bottom: 0;
      margin-bottom: 30px;
      width: 100%;
      left: 0;
      height: 50px;
      text-align: center;
    }

    #center-link{
      border-radius: 50%;
    /*  border-style: ridge;*/
      border-style: solid;
      border-color: #773bee;
      border-width: 5px;
     /* border-radius: 100px 100px 100px 100px;
      -moz-border-radius: 100px 100px 100px 100px;
      -webkit-border-radius: 100px 100px 100px 100px;*/
     -webkit-box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);
     -moz-box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);
      box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);
    }

    #center-link2{
      border-radius: 50%;
    /*  border-style: ridge;*/
      border-style: solid;
      border-color: #773bee;
      border-width: 2px;
      text-align: center;

     /* border-radius: 100px 100px 100px 100px;
      -moz-border-radius: 100px 100px 100px 100px;
      -webkit-border-radius: 100px 100px 100px 100px;*/
     -webkit-box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);
     /*-moz-box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);*/
     /* box-shadow: 1px 1px 10px 15px rgba(113,104,255,1);*/
    }

    #mobile-view440 {display: none;}
    #mobile-view {display: none;}


     @media screen and (max-width: 440px) {

    #mobile-view440 {display: block;}
    #mobile-view {display: none;}

    }

    @media screen and (min-width: 440px) and (max-width: 740px) {

    #mobile-view440 {display: none;}
    #mobile-view {display: block;}
    }

   #clear {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background-color: transparent;
}
.bg_img{
    background-image:  url("{{ asset('SmokeBackground.jpg') }}");
    height: 90.7%;
  }

.div1{
  position: absolute;
  top: 25%;
  left: 32%; 
}
.div2{
  position: absolute;
  top: 20%;
  left: 45%; 
  z-index: 1;
}
.div3{
  position: absolute;
  top: 25%;
  left: 63%; 
}
.div1 img{
    border-radius: 100%;
    height: 250px;
    width: 250px;
}
.div1 i{
    font-size: 120px;
    position: absolute;
    top: 65px;
    left: -120px;
    color: #3E1779;
}
.div3 i{
    font-size: 120px;
    position: absolute;
    top: 65px;
    left: 250px;
    color: #3E1779;
}
.div2 img{
    border-radius: 100%;
    height: 300px;
    width: 320px;
}
.div3 img{
    border-radius: 100%;
    height: 250px;
    width: 250px;
}
.my-star{
  position: absolute;
  bottom: 300px;
  right: 530px;
}
.my-btn{
  position: absolute;
  bottom: 140px;
  right: 600px;
}
.my-btn button{
  width: 200px;
  height: 100px;
  font-weight: bold;
  font-size: 25px;
}
.my-btn2{
  position: absolute;
  bottom: 30px;
  right: 600px;
}
.my-btn2 button{
  width: 200px;
  height: 100px;
  font-weight: bold;
  font-size: 25px;
}
.my-star i{
  color: yellow;
  font-size: 60px;
}

@media (max-width: 360px){
     .bg_img{
        background-image: url("{{ asset('purplesparkles.jpg') }}");
        height: 540px;
        background-size: cover;
          }
      .div1{
        position: absolute;
        top: 40%;
        left: 10%; 
      }
      .div2{
        position: absolute;
        top: 38%;
        left: 34%;
        z-index: 1;
      }
      .div3{
        position: absolute;
        top: 40%;
        left: 63%;; 
      }
      .div1 img{
          border-radius: 100%;
          height: 100px;
          width: 100px;
      }
      .div1 i{
        font-size: 32px;
        position: absolute;
        top: 34px;
        left: -35px;
        color: #3E1779;
      }
      .div3 i{
        font-size: 32px;
        position: absolute;
        top: 34px;
        left: 99px;
        color: #3E1779;
      }
      .div2 img{
          border-radius: 100%;
          height: 120px;
          width: 120px;
      }
      .div3 img{
        border-radius: 100%;
        height: 100px;
        width: 100px;
      }
      .my-star{
        position: absolute;
        top: 450px;
        right: 95px;
      }
      .my-btn{
        position: absolute;
        top: 510px;
        right: 110px;
      }
      .my-btn button{
       width: auto;
        height: auto;
        font-weight: bold;
        font-size: 16px;
      }
      .my-btn2{
        position: absolute;
        top: 560px;
        right: 110px;
      }
      .my-btn2 button{
       width: auto;
        height: auto;
        font-weight: bold;
        font-size: 16px;
      }
      .my-star i{
        color: yellow;
        font-size: 25px;
      }
  }

    </style>


</head>

<body id="page-top" style="padding-bottom: 80px; overflow-x: hidden;" >

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
@include('member.inc.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" >

            <!-- Topbar -->
            @include('member.inc.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
           <div class="container-fluid bg_img">
               @yield('content')
           </div>
            <!-- /.container-fluid -->

        </div>
        <div id="clear"></div>
        <!-- End of Main Content -->
         <footer id="mobile-view" class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div id="footer1">
                      <div class="row">
                        <div class="col-12 col-sm-12">
                            <a class="col-1 col-sm-2" href="{{url('member/forum')}}">Feed</a>
                            <a class="col-4 col-sm-2" href="{{url('/questions&answers')}}" style="text-align: right;">Notifications</a><!-- {{url('/notification')}} -->
                            <a class="col-2 col-sm-2 offset-sm-1" id="center-link" href="{{url('member/costume/create')}}">Post</a>
                            <a  class="col-2 col-sm-2" href="{{url('cosplay/costume')}}">Shop</a>
                            <a class="col-3 col-sm-2 " href="{{ route('member.profile.edit',Auth::id()) }}">Account</a>
                        </div>
                      </div>
                    </div>
                    <!-- <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script><a class="purple" href="{{ url('/member/area') }}"> Cosplay-Exchange</a> All rights reserved <small style="font-size: 20%;">| This system is made with <i class="fas fa-heart" style="color: #FB2224" aria-hidden="true"></i> by <a class="purple" href="javascript:void(0);">TheWebIcon</a></small>
                    </span> -->

                </div>
            </div>
        </footer>
        <!-- End of Footer -->
        @if(!isset($profile))
          <footer id="mobile-view440" class="sticky-footer bg-white" >
            <div class="container my-auto">
                <div class="copyright my-auto">
                    <div id="footer1">
                      <div class="row">
                        <div class="col-12">
                           <!--  <a class="col-2" href="{{url('member/forum')}}">Feed</a>
                            <a class="col-3 col-sm-2" href="{{url('/questions&answers')}}">Noti</a>
                            <a class="col-2" id="center-link2" href="{{url('member/costume/create')}}">Post</a>
                            <a  class="col-2 col-sm-2" href="{{url('cosplay/costume')}}">Shop</a>
                            <a  class="col-3 " href="{{ route('member.profile.edit',Auth::id()) }}">Account</a> -->
                            <a class="col-3 offset-4" id="center-link2" href="{{url('member/costume/create')}}">Post</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </footer>
        @endif

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<audio id="bell" src="{{ asset('back/alert.mp3') }}" preload="auto" loop></audio>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('back/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('back/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('back/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('back/js/demo/chart-pie-demo.js') }}"></script>

@include('sweetalert::alert')
<script src="{{ asset('back/js/toastr.min.js') }}"></script>
<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script>

    toastr.options = {
        "debug": false,
        "closeButton": true,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "fadeIn": 300,
        "fadeOut": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000
    }
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c9b2806850965fa0ba0e', {
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = pusher.subscribe('cosplay-channel');
    channel.bind('costume-status', function(data) {
        toastr.info('Your costume is approved!');
    });
    channel.bind('costume-request', function(data) {
        toastr.info('Your received a new costume request!');
    });

</script>
@yield('scripts')

</body>

</html>
