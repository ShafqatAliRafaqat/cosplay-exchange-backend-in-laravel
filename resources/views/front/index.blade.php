@extends('front.inc.master')
@section('content')

<div id="demo" class="carousel slide" data-ride="carousel" >

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('front/img/s1.png') }}" alt="" >
        </div>
        <div class="carousel-item">
            <img src="{{ asset('front/img/s2.png') }}" alt="" >
        </div>
        <div class="carousel-item">
            <img src="{{ asset('front/img/s3.png') }}" alt="" >
        </div>
        <div class="carousel-item">
            <img src="{{ asset('front/img/s4.png') }}" alt="" >
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
        <span class="no-bg carousel-control-prev-icon lnr lnr-chevron-left before-valign l-0" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
        <span class="no-bg carousel-control-next-icon lnr lnr-chevron-right before-valign r-0" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

{{--    <div class="section-bottom-wrapper py-4 py-md-2 py-lg-4 bg-black-opacity position-absolute b-0 w-100 pb-0 text-center d-none d-md-block z-index2">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="box-blk text-white">--}}
{{--                        <span class="lnr lnr-users font-lg d-inline-block mb-3"></span>--}}
{{--                        <h5 class="font-bold">250+ Seller</h5>--}}
{{--                        <p>Lorem ipsum dolor sit.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="box-blk text-white">--}}
{{--                        <span class="lnr lnr-star font-lg d-inline-block mb-3"></span>--}}
{{--                        <h5 class="font-bold">10+ Awards</h5>--}}
{{--                        <p>Lorem ipsum dolor sit.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="box-blk text-white">--}}
{{--                        <span class="lnr lnr-briefcase font-lg d-inline-block mb-3"></span>--}}
{{--                        <h5 class="font-bold">500+ Services</h5>--}}
{{--                        <p>Lorem ipsum dolor sit.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="box-blk text-white">--}}
{{--                        <span class="lnr lnr-smile font-lg d-inline-block mb-3"></span>--}}
{{--                        <h5 class="font-bold">230+ Customers</h5>--}}
{{--                        <p>Lorem ipsum dolor sit.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

<section class="pdt-cat-wrapper py-6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pdt-cat-blk text-center">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 m-auto">
                            <div class="mb-6">
                                <h3 class="mt-1">Search Cosplays Across America</h3>
                                <div class="view-pdt-btn">
                                    <a href="{{ route('register') }}" class="btn btn-lg btn-theme  text-white py-3 px-4  text-capitalize shadow-theme-lg mt-3 mb-5">Try For Free</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="pdt-cat-grid">
                                <div class="row">
                                    @foreach($categories as $category)
                                    <div class="col-sm-6 col-md-6 col-lg-{{ $categories->count()>2?'4':'6' }}">
                                        <div class="border-theme radius-1 p-4 mb-6">
                                            <img src="{{ asset('uploads/'.$category->img) }}" alt="" >
                                            <div class="content-blk">
                                                <h3 class="pt-4 pb-2">{{ $category->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="view-pdt-btn">
                                        <a href="{{ route('cosplay.costume.index') }}" class="btn btn-lg btn-theme  text-white py-3 px-4  text-capitalize shadow-theme-lg">view all cosplays</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pdt-filter-wrapper border-top py-6">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 col-md-10 m-auto">
                <div class="mb-6">
                    <h5 class="mt-4 font-size-lg">Exchange your cosplay costumes with thousands of cosplayers across America.<br>Save $$$ thousands, only $15/month to trade costumes as often as you like!</h5>
                    <h2 class="text-capitalize mt-3">explore our cosplays</h2>

                </div>
            </div>
        </div>




        <div class="row">
                <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                    <div class="card mx-0 border shadow">
                        <div class="card-image">
                            <img class="card-img-top" src="{{ asset('front/img/h1.png') }}" alt="Card image">
                        </div>
                    </div>
                </div>
            <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                <div class="card mx-0 border shadow">
                    <div class="card-image">
                        <img class="card-img-top" src="{{ asset('front/img/h2.png') }}" alt="Card image">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                <div class="card mx-0 border shadow">
                    <div class="card-image">
                        <img class="card-img-top" src="{{ asset('front/img/h3.png') }}" alt="Card image">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                <div class="card mx-0 border shadow">
                    <div class="card-image">
                        <img class="card-img-top" src="{{ asset('front/img/h4.png') }}" alt="Card image">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                <div class="card mx-0 border shadow">
                    <div class="card-image">
                        <img class="card-img-top" src="{{ asset('front/img/h5.png') }}" alt="Card image">
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 pdt card-deck mx-0">
                <div class="card mx-0 border shadow">
                    <div class="card-image">
                        <img class="card-img-top" src="{{ asset('front/img/h6.png') }}" alt="Card image">
                    </div>
                </div>
            </div>

        </div>




        <div class="row">
            <div class="col-12">
                <div class="view-pdt-btn text-center mt-5">
                    <a href="{{ route('cosplay.costume.index') }}" class="btn btn-lg btn-theme  text-white py-3 px-4  text-capitalize shadow-theme-lg">view all cosplays</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-theme-secondary py-6">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-10 text-center mx-auto">
                <div class="mb-6 text-white text-center">
                    <h2>How It Works</h2>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-12">
                <img src="{{ asset('front/img/how-it-works.png') }}" alt="">
            </div>
        </div>
    </div>
</section>



    @endsection
