<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Cormorant Garamond' rel='stylesheet'>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{asset('designerPages/css/style.css')}}">
  </head>
    <style>
   .btn.btn-primary:hover, .btn.btn-primary:focus {
			background-color: #d441c2!important;
			background-image: linear-gradient(315deg, #d441bb 0%, #8406c5 74%)!important; 
	}
.main-body{

		padding: 40px!important;
		background-image:url('designerPages/images/Smoke-Background.jpg');
		background-position: center; 
		background-repeat: no-repeat; 
		background-size: cover;
	}
	.subscribe{
		text-align:center;
	}
	.subscribe h1{
		color:#E4179D;font-family: 'Cormorant SC', serif!important;
	}
	.main-container-sub{
		padding: 0px 131px;
	}
	.Per-transaction{
		padding: 25px;
		padding-top: 0px!important;
	}
	.Per-transaction h2{
		color:#fff;
		font-family: 'Cormorant SC', serif!important;
	}
	.per-detail{
		padding-bottom:50px;
	}
	.per-detail h6{
		color:#fff;
		font-family: 'Cormorant Garamond', serif!important;
	}
	.per-transaction-button{
		text-align:center;
	}
	.per-transaction-button button{
		border:0px;
		background-color: #d441c2;
		background-image: linear-gradient(315deg,#d441bb 0%, #e6159f 74%);
		border-radius: 0px;    
		width: 65%;
		font-size: 30px;
		padding: 7px;
		font-family: 'Cormorant SC', serif!important;
	}
	.pay-per-month{
		padding: 25px;
		padding-top: 0px!important;
	}
	.pay-per-month h2{
		color:#fff;
		font-family: 'Cormorant SC', serif!important;
	}
	.pay-per-month-detail{
		padding-bottom:23px;
	}
	.pay-per-month-detail h6{
		color:#fff;
		font-family: 'Cormorant Garamond', serif!important;
	}
	.pay-per-button{
		text-align:center;
	}
	.choose-plan{
		line-height:1;
		color:#fff;
		border:0px;background-color: #d441c2;
		background-image: linear-gradient(315deg,#d441bb 0%, #e6159f 74%);
		border-radius: 0px;    
		width: 65%;
		font-size: 30px;
		padding: 7px;
		font-family: 'Cormorant SC', serif!important;
	}
	.qa{
		text-align:center;
		padding: 2px;
		font-family: 'Cormorant SC', serif!important;
	}
	.qa h1{
		color:#fff;
	}
	.amount{
		color:#000;
		border: 2px solid #fff;border-radius: 100px;
		background-color: #fff;
		width: 150px;
		margin: 6px;
		font-family: CormorantSC-Light;font-size: 92px;
	}
	.sub-2,.amount{
		display:inline-block;
	}
	.sub-3 {
		
		color: #000;
		/* border: 2px solid #fff; */
		/* border-radius: 100px; */
		/* background-color: #fff; */
		/* width: 140px; */
		/* margin: 6px; */
		/* font-family: CormorantSC-Light; */
		font-size: 92px;
	}
	.sub-5{
		position: relative;
		top: -15px;
	}
	.profile-img{
		display:none!important;
	}
	.sub-1{
		height: 100%!important;
		width: 100%;
		background-color: #000;
	}
	
	@media only screen and (max-width: 600px) {
	.sub-5{
		position: relative;
		top: -15px;
	}
	.main-body {
    padding: 15px!important;
	}
	.profile-img{
		float:right;
		width:40px!important;
		display:block!important;
		height: 40px;
		margin: 10px;
		position: relative;
		background-color: white;
			box-shadow: 0px 1px 15px 18px #800080;
		padding: 0px;
	}
	.sub-2 {
    font-size: 45px;
    color: #fff;
    padding: 20px 40px 6px 3px;
	}
	.choose-plan{    
		width: 100%!important;
		font-size: 30px;
		padding: 11px 23px!important;
	}
	
	
	}
  </style>
  <body>
  <div id="content" class="main-body">
				<div class="container-fluid">
						<div class="row" >
							<!--	<div class="custom-menu col-sm-1">
											<button type="button" id="sidebarCollapse" class="btn btn-primary menu-togle">
									  <i class="fa fa-bars togle-menu" style="color: #000;"></i>
									  <span class="sr-only">Toggle Menu</span>
									</button> 
								</div> -->
									
										<div class="col-sm-6"> 
											<div class="search">
											<a href="index.html">		<img src="{{asset('designerPages/images/444.png')}}" class="rounded-circle profile-img" alt="Cinque Terre " width="15%" height="100%" style="display:inline-block;"> </a>
													 
											</div>
											
										</div>
										<div class="col-sm-6"> 
										
										</div>
								 
									
										
								
						</div>
						
				</div>
		
	<!--	<div class="wrapper d-flex align-items-stretch">
			
<nav id="sidebar">
				<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button> 
        </div>
	  		<h1><a href="index.html" class="logo">LOGO</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="#"><span class="mr-3"></span> </a>
          </li>
          <li>
              <a href="#"><span class="mr-3"></span> </a>
          </li>
          <li>
            <a href="#"><span class="mr-3"></span> </a>
          </li>
          <li>
            <a href="subscription.html"><span class="mr-3"></span> </a>
          </li>
          <li>
            <a href="#"><span class="mr-3"></span> </a>
          </li>
          <li>
            <a href="#"><span class="mr-3"></span> </a>
          </li>
		  <li>
            <a href="dashboard.html"><span class="mr-3"></span> </a>
          </li>
		  <li>
            <a href="#"><span class="mr-3"></span> </a>
          </li>
        </ul>

    	</nav> -->
        <!-- Page Content  -->
    
								<div class="subscribe">
									<h1>Subscribe</h1>
							
								</div>
					<div class="container main-container-sub">
							<div class="row">
														<div class="col-sm-6 main-sub">
															<div class="sub-1">
																<div style="text-align:center;">
																	<div class="fa fa-dollar sub-2" >
																			<div class="amount">
																				<h3 class="sub-3 sub-5">5</h3>
																			</div>
																	</div>
																</div>
																
																	<div class="Per-transaction">
																				<h2>Per Transaction</h2>
																			  <div class="per-detail">
																						  <h6>Only pay if you sell</h6>
																						  <h6>No listing fees</h6>
																						  <h6>No annual fee</h6>
																						  <h6>Receive 5 coins per sale</h6>
																			  </div>
																			  <div class="per-transaction-button">
																						<button type="" class="choose-plan">Choose Plan</button> 
																			  </div>
																    </div>
															</div>
																						</div>
															<div class="col-sm-6 main-sub">
																			<div class="sub-1">
																				   <div style="text-align:center;">
																						   <div class="fa fa-dollar sub-2" >
																								<div class="amount">
																									<h3 class="sub-3 sub-8">8</h3>
																								</div>
																						   </div>
																				   </div>
																					<div class="pay-per-month">
																											
																											<h2>Pay Per Month</h2>
																											
																							  <div class="pay-per-month-detail">
																									  <h6 >Unlimited selling</h6>
																									  <h6 >No selling fees ever</h6>
																									  <h6 >No annual fee</h6>
																									  <h6 >Receive 5 coins per month</h6>
																									  <h6 >Receive 5 coins per sale</h6>
																							  </div>
																							  <div class="pay-per-button">
																									<button type="" class="choose-plan" >Choose Plan</button> 
																							  </div>
																					</div>
																			</div>
													
														  </div>
						</div>
						
						  <div class="qa">
								<h1>Q & A?</h1>
						  </div>
				</div>
		</div>
		
    </div>
		

    <script src="{{asset('designerPages/js/jquery.min.js')}}"></script>
    <script src="{{asset('designerPages/js/popper.js')}}"></script>
    <script src="{{asset('designerPages/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('designerPages/js/main.js')}}"></script>
  </body>
</html>