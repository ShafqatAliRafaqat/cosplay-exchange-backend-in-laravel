<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('contactUs/css/bootstrap.min.css')}}">
<link href="{{asset('contactUs/css/all.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('contactUs/css/nice-select.css')}}">
<link rel="stylesheet" href="{{asset('contactUs/css/select2.min.css')}}">
<link href="{{asset('contactUs/css/style.css')}}" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Roboto+Slab:wght@100;300;500;700;900&display=swap" rel="stylesheet">


<title>App</title>
</head>
<body>


<!--App start-->
<div class="app-wrap">
  <div class="container">

<div class="appbox">
<div class="ladyImg"><img src="{{asset('images/ladyImg.jpg')}}"></div>
<div class="formbox">
<h3>Contact Us</h3>

<form>
<div class="input-group">
<input type="text" name="" class="form-control" placeholder="Name">
</div>

<div class="input-group">
<input type="text" name="" class="form-control" placeholder="Email">
</div>


<div class="input-group">
<input type="text" name="" class="form-control" placeholder="Subject">
</div>


<div class="input-group">
<input type="text" name="" class="form-control" placeholder="Phone">
</div>


<div class="input-group">
<textarea placeholder="Message" class="form-control"></textarea>
</div>


<div class="input-group btnWrp">
<button><img src="{{asset('images/send_btn.png')}}"></button>
</div>


</form>




</div>



</div>



  </div>
</div>
<!--App end-->





<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="{{asset('contactUs/js/jquery.min.js')}}"></script> 
<script src="{{asset('contactUs/js/popper.min.js')}}"></script> 
<script src="{{asset('contactUs/js/bootstrap.min.js')}}"></script> 

<script src="{{asset('contactUs/js/jquery.nice-select.js')}}"></script> 
<script src="{{asset('contactUs/js/select2.min.js')}}"></script> 
<script src="{{asset('contactUs/js/script.js')}}"></script>
</body>
</html>