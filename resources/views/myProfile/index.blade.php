<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="{{asset('myProfile/assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('myProfile/assets/fontawesome/css/all.css')}}"/>
        <link rel="stylesheet" href="{{asset('myProfile/assets/aos/aos.css')}}"/>
        <link rel="stylesheet" href="{{asset('myProfile/assets/css/style.css')}}"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">
</head>
<body style="overflow-x: hidden; background-size: cover; background-repeat: no-repeat; ">
<!-- ----------------------Navbar----------------------------------- -->

	<div class="sidenav mySidebar">
	<button class=" my-btnnav" id="close_nav">Close &times;</button>
        <a href="{{url('/newHome')}}"><img src="{{asset('myProfile/images/logo.png')}}"></a>
	  <a href="#">Shop</a>
	  <a href="#">Post</a>
	  <a href="#">My Listings</a>
	  <a href="{{url('favorites')}}">Favorites</a>
	  <a href="#">Cosplay Coins</a>
	  <a href="{{url('subscriptionDashboard')}}">Dashboard</a>
	  <a href="{{url('galleryPage')}}">Gallery</a>
	  <a href="#">Q & A</a>
	</div>

	<nav class="navbar navbar-expand-md bg-transparent navbar-dark">
		<button class="navbar-toggler" id="open_nav" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="margin-left: 0px; font-size: 50px; border: none; margin-left: -20px">
			<span class="navbar-toggler-icon"></span>
		</button>
		<form class="form-inline">
		    <input class="" type="text" placeholder="Search all cosplays...">
		</form>
		<div class="icons">
			<i class="fas fa-sticky-note"></i>
			<i class="fas fa-bell"></i>
			<i class="fas fa-shopping-cart"></i>
		</div>
	</nav>
	<div class="main-content">
		<div class="container-fluid bg_img"><!-- style="padding-bottom: 300px;" -->
			<div class="row">
				<div class="col-md-12 name">
					<p>Marina</p>
				</div>
				<div class="col-md-12">
					<div class="div1">
		                <i class="fas fa-angle-double-left"></i>
		                <img src="{{asset('myProfile/images/left.jpg')}}">
		              </div>
		              <div class="div2">
		                <img src="{{asset('myProfile/images/center.jpg')}}">
		              </div>
		              <div class="div3">
		                <img src="{{asset('myProfile/images/right.jpg')}}">
		                <i class="fas fa-angle-double-right"></i>
		              </div>
				</div>
				<div class="col-md-12">
					<div class="my-star" >
		                <i title="Feature Coming Soon" class="fas fa-star"></i>
		                <i title="Feature Coming Soon" class="fas fa-star"></i>
		                <i title="Feature Coming Soon" class="fas fa-star"></i>
		                <i title="Feature Coming Soon" class="fas fa-star"></i>
		                <i title="Feature Coming Soon" class="fas fa-star"></i>
		            </div>
				</div>
				<div class="col-md-12" style="margin-bottom: 100px">
					<div class="my-btn">
		                <button class="btn btn-primary">My Profile</button>
		            </div>
	                <div class="my-btn2" id="btn2" style="display: none;">
		                <button class="btn btn-primary">Dashboard</button>
		            </div>
				</div>
			</div>





            </div>
	</div>

<!-- ----------------------/Navbar----------------------------------- -->

        <script src="{{asset('myProfile/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('myProfile/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('myProfile/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('myProfile/assets/aos/aos.js')}}"></script>
        <script>
                AOS.init();
        </script>
        <script>
        	$(function(){
        		$("#open_nav").click(function(){
        			$(".mySidebar").show();
        			$("#open_nav").hide();
        		});
        		$("#close_nav").click(function(){
        			$(".mySidebar").hide();
        			$("#open_nav").show();
        		});
        		$(window).resize(function(){
				    var windowsize = $(window).width();
				    if (windowsize <= 360) {
				        $("#btn2").show();
				    }else{
				        $("#btn2").hide();
				    }
				});
				var windowsize = $(window).width();
				if (windowsize <= 360) {
				    $("#btn2").show();
				}else{
				    $("#btn2").hide();
				}
        	});
        </script>





</body>
</html>
