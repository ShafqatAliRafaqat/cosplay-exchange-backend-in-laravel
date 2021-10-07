<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('designerPages/css/style.css')}}">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <style>
    .main-body{
		padding: 50px!important;
		background-image:url('designerPages/images/Smoke-Background.jpg');
		background-position: center; 
		background-repeat: no-repeat; 
		background-size: cover;
    }
    .link-tree{
	    border: 0px;
	    border-radius: 0px;
        width: 65%;
		height: 69px;
		background-color: #d441c2;
		background-image: linear-gradient(315deg, #d441bb 0%, #8406c5 74%);
		font-family: CormorantSC-Light;
		font-size: 37px;
		padding: 0px;
		background-color: #d441c2;background-image:linear-gradient(315deg, #d441bb 0%, #8406c5 74%);
		font-family: 'Cormorant SC', serif!important;
		color:#fff;
	}
										
    .main-row{
		padding: 25px 25px;
		background-color: #000;
	}
   .body{
		font-family: 'Cormorant Garamond', serif!important;
	}
   .btn.btn-primary:hover, .btn.btn-primary:focus{
		background-color: #d441c2!important;
		background-image: linear-gradient(315deg, #d441bb 0%, #8406c5 74%)!important; 
	}
	.small-img-5{
		text-align:center; 
		padding:5px 0;
	}
	.link-tree-main{
		padding-top:30px;
		
	}
	.form-group input {
		padding: 5px 10px!important;
		width: 100%;
	}
	.upload-img{
		position: relative;
		top: -16px;
		left: 196px;
	}
	.form-text{
		color:#fff;
		font-size:30px;
	}
	.text-area{
		width:100%;
		height:160px;
		font-family: 'Cormorant Garamond', serif!important;    
		padding: 10px;
		font-size: 20px;
		color: #6c757d;
	}
	.profile-img{
		display:none!important;
	}
	.starik{   
		position: relative;
		left: 138px;
		top: 40px;
		font-size: 20px;
		
	}
 
	@media only screen and (max-width: 600px){
	
  .img-123{
		padding-top:40px!important;
    
    }
  .link-tree{
		font-size:1rem;
	}
  .upload-img{
		position: relative;
		top: -10px!important;
		left: 125px!important;
	}
	.main-body {
		padding: 0px!important;
	}
	.form-text{
		font-size: 15px;
		text-align: center;
	}
	.link-tree {
		width: 100%;
		height: 50px;
		font-size: 30px;
	}
	.rounded-circle-small{
		width: 40px;
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
	.starik{   
		position: relative;
		left: 253px;
		top: 40px;
		font-size: 20px;
		width: 20px;
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
											<a href="index.html">		
												<img src="{{asset('designerPages/images/444.png')}}" class="rounded-circle profile-img" alt="Cinque Terre " width="15%" height="100%" style="display:inline-block;"> </a>
													
											</div>
											
										</div>
										<div class="col-sm-6"> 
										
										</div>
								 
									
										
								
						</div>
						
				</div>
	
	
			
        
	  	

        <!-- Page Content  -->
   
       
				<div class="container" >
						<div class="row main-row">
							

								<div class="col-sm-6">
										
														
															 <div style="text-align: center;">
																		<h2 style="color:#fff;font-family: 'Cormorant SC', serif!important;">Member Profile</h2>
															 </div>
																	  <form >
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Username*" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Real Name (for shipping)" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Shipping Address" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Email" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Phone number to send SMS notification of your cosplay offers" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Next Convention*" name="email">
																				</div>
																				<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Cosplans*" name="email">
																				</div>
																					<div class="form-group">
																				
																				  <input type="email"  id="email" placeholder="Location (State): *" name="email">
																				</div>
																				<div class="form-group">
																				  <textarea class="text-area" type="email"  id="email" placeholder="Bio*" name="email" 
																				  ></textarea>
																				</div>
																				<h1 class="form-text">Fields with * are fields visible to members.</h1>
																				
																					<div style="text-align:center;" class="link-tree-main"><button type="" class="link-tree" 
																					style="">Linktree</button> </div>
																	  </form>
								</div>
								
    
								<div class="col-sm-6">
 
												<div class="right-side-img">  
														<div class="img-123" style="text-align:center;">
														<div class="starik">*</div>
																	<img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle"  alt="Cinque Terre" width="80%" height="100%">
																	
														</div>
														  
												
														<a href="#" class="upload-img"><img src="{{asset('designerPages/images/5.png')}}" class="rounded-circle upload-img" alt="Cinque Terre" width="15%" height="100%"></a> 
													<h6 style="color:#fff;text-align:center;">Add Photos</h6>
									
												</div>
			
													
												<div class="small-img-5">		
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
															
															
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
															
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
												</div>
												<div class="small-img-5">		
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
															
															
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
															
														
															<a href="#"><img src="{{asset('designerPages/images/7.png')}}" class="rounded-circle rounded-circle-small" alt="Cinque Terre" width="10%" height="100%" style="display:inline-block;"></a> 
														
												</div>
					
				
				
				
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