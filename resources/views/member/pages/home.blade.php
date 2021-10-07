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
<!-- <div  id="carouselExampleSlidesOnly" class="carousel slide mobile_hide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('homepage/images/Slide1.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('homepage/images/Slide2.jpg') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('homepage/images/Slide3.jpg') }}" alt="Third slide">
    </div>
  </div>
</div>
<br> -->
  <div class="row">
      @foreach($costumes_images as $image)
      <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
          <div class="card mx-0 border shadow">
              <div class="card-header">
                  <img class="img-profile rounded-circle" style="height: 25px; width: auto;" src="{{--{{ asset('uploads/'.$image->costumes->user->profile->img) }}--}}">
                  <small><b> {{substr($image->costumes->title, 0, 6) . ''}}</b></small>
                  <span style="float: right;"><small >Posted {{$image->created_at->diffForHumans()}}</small></span>
              </div>
              <div class="card-image">
                  <img class="card-img-top" src="{{ asset('uploads/'. $image->img) }}" alt="Card image" height="250">
              </div>
              <div class="card-footer">
                  <b>${{$image->costumes->price}}</b>
              </div>
          </div>
      </div>
      @endforeach
  </div>

@endsection

