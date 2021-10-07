@extends('front.inc.master')
@section('content')
    <section class="slider-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                        <h1 class="text-white">Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Header Banner Section -->
    <!-- Bread crumb -->
    <div class="breadcrumb-wrapper bg-theme py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-breadcrumb">
                        <ol class="breadcrumb no-bg-color p-0 m-0">
                            <li class="breadcrumb-item d-inline-block"><a href="{{ route('home') }}" class="text-theme-secondary">Home</a></li>
                            <li class="breadcrumb-item d-inline-block active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Bread crumb -->
    <!-- Cart Page -->
    @if(Cart::instance('shopping')->content()->count()>0)
    <section class="user-profile-wrapper py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="card shadow">
                        <div class="card-header bg-white p-4 d-none d-md-block">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title mb-0 text-capitalize">Product Details</h4>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h4 class="card-title mb-0 text-capitalize">Price</h4>
                                </div>
                                <div class="col-md-2 text-center">
                                    <h4 class="card-title mb-0 text-capitalize">Trash</h4>
                                </div>
                            </div>
                        </div>

                        @foreach(Cart::instance('shopping')->content() as $item)
                        <div class="card-body p-4">
                            <div class="cart-item-list clearfix">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-8">
                                        <div class="cart-item-desc xs-text-center">
                                            <img src="{{ asset('uploads/'.$item->model->pictures->first()->img) }}" alt="Edit image" class="img-fluid d-inline-block align-middle d-lg-inline-block w-25">
                                            <div class="cart-item-info d-inline-block align-middle pl-0 pl-md-3 py-3 py-md-0 xs-text-center">
                                                <h5><a href="{{ route('cosplay.costume.show',$item->model) }}" class="text-link"><strong>{{ $item->name }}</strong></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 p-0 text-center">
                                        <div class="cart-item-price-wrapper">
                                            <div class="cart-item-price d-inline-block display-5">
                                                <span class=""><i class="fas fa-coins"></i>&nbsp;{{ $item->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 mt-4 mt-md-0 text-center">
                                        <form id="delete-form" action="{{ route('cosplay.cart.destroy',$item->rowId) }}" method="post" >
                                            @method('DELETE')
                                            @csrf
{{--                                            <a href="{{ route('cosplay.cart.destroy',$item->rowId) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><span class="lnr lnr-trash text-theme display-5"></span></a>--}}
                                            <button type="submit" class="lnr lnr-trash text-theme display-5"><span ></span></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        @endforeach

                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <!-- Order Summary -->
                    <div class="card shadow mb-0 mt-4 mt-lg-0">
                        <div class="card-header bg-white p-4">
                            <h4 class="card-title mb-0 text-capitalize">Order Summary <a href="{{ route('cosplay.cart.clear') }}" class="btn btn-danger btn-sm float-right text-white"> Clear Cart
                                </a>
                            </h4>
                            @if(Auth::user()->coin->available_coins < $total)
                                <small class="text-danger">You have insufficient coins</small>
                            @endif
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="text-grey text-capitalize p-4 border-top-0">
                                            Total Coins
                                        </td>
                                        <td class="text-right p-4 border-top-0">{{ $total }}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <td class="text-grey p-4 text-capitalize">--}}
{{--                                            Estimated Taxes & Fees:--}}
{{--                                        </td>--}}
{{--                                        <td class="text-right p-4">$2</td>--}}
{{--                                    </tr>--}}
                                    <tr class="ord-sum-total">
                                        <td class="display-6 p-4">
                                            <b>Total</b>
                                        </td>
                                        <td class="text-right p-4 display-6"><b>{{ $total  }}</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr class="m-0">
                                <!-- Select Payment Menthod -->
                                <div class="checkout-btn p-2 p-md-4 float-left d-inline-block">
                                    <a href="{{ route('cosplay.costume.index') }}" class="d-inline-block py-3 text-theme-secondary"><i class="lnr lnr-chevron-left mr-2"></i>Back to Costumes</a>
                                </div>
                                <div class="checkout-btn p-2 p-md-4 float-right d-inline-block">
                                   @if(Auth::user()->coin->available_coins < $total)

                                        <a href="{{ route('member.coin.index') }}" class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white">Buy Coins</a>
                                    @else
                                    <a href="{{ route('cosplay.checkout.index') }}" class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white">Checkout</a>
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Order Summary -->
                </div>
            </div>
        </div>
    </section>
    @else
        <div class="container" style="height: 180px">
            <div class="text-center mt-6" >
                <h3>Cart Empty!</h3>
            </div>
        </div>
        @endif
    <!-- /Cart Page -->
   @endsection
