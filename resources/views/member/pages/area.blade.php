@extends('member.inc.master')
@section('styles')
    <style>
    @media screen and (max-width: 1200px) {
    .mobile_hide {
        display: none;
        }
    }
    
    </style>
@endsection
@section('content')
<div style="text-align: center;top: 40%;position: absolute;left: 37%">
    <h1 style="color: white;font-size:70px">This Page is <br>Under Construction</h1>
</div>
<!-- <div class="div1">
<i class="fas fa-backward"></i>
<img src="{{ asset('left.jpg') }}">
</div>

<div class="div2">
<img src="{{ asset('center.jpg') }}">
</div>
<div class="div3">
<img src="{{ asset('right.jpg') }}">
<i class="fas fa-forward"></i>
</div>
<div class="my-star">
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
<i class="fas fa-star"></i>
</div>
<div class="my-btn">
<button class="btn btn-primary">MY PROFILE</button>
</div>
<div class="my-btn2" id="btn2" style="display: none">
<button class="btn btn-primary">DASHBOARD</button>
</div> -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(function(){
        $("#mobile-view440").hide();
        $(".container-fluid").addClass('bg_img');
        $("#nav").removeClass('mb-4');
        $(window).resize(function(){
            var windowsize = $(window).width();
            if (windowsize <= 360) {
                $("#btn2").show();
                $("#mobile-view440").hide();
            }else{
                $("#btn2").hide();
            }
        });
        var windowsize = $(window).width();
        if (windowsize <= 360) {
            $("#btn2").show();
            $("#mobile-view440").hide();
        }else{
            $("#btn2").hide();
        }
    });
</script>
@endsection

