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
                            <li class="breadcrumb-item d-inline-block"><a href="{{ route('home') }}" class="text-theme-secondary">Home / Cart</a></li>
                            <li class="breadcrumb-item d-inline-block active">Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="checkout  py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Billing Information -->
                <div class="card shadow mb-0">
                    <div class="card-header bg-white p-4">
                        <h4 class="card-title mb-0 text-capitalize coll-arrow cursor-pointer collapsed" data-toggle="collapse" data-target="#billing-inf" aria-expanded="false">Billing Information</h4>
                    </div>
                    <div id="billing-inf" class="card-body p-4 collapse show">
                        <form action="{{ route('cosplay.request.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-row mb-4">
                                <div class="col-lg-6">
                                    <label for="first-name">Name</label>
                                    <input type="text" class="form-control bg-input mb-lg-0 mb-md-4 mb-4" name="username" value="{{ Auth::user()->profile->username }}" readonly >
                                </div>
                                <div class="col-lg-6">
                                    <label for="last-name">Email</label>
                                    <input type="text" class="form-control bg-input" name="email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <label for="first-name">Phone#</label>
                                <input type="text" class="form-control bg-input mb-lg-0 mb-md-4 mb-4" name="phone" value="{{ Auth::user()->profile->phone_no }}" required >
                            </div>
                            <div class="form-row mb-4">
                                <div class="col">
                                    <label>Address <small class="text-danger">Please give your complete address</small></label>
                                    <textarea class="form-control bg-input" rows="5" name="address" required>{{ Auth::user()->profile->address }}</textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /Billing Information -->
            </div>
            <div class="col-lg-5">
                <!-- Order Summary -->
                <div class="card shadow mb-0 mt-4 mt-lg-0">
                    <div class="card-header bg-white p-4">
                        <h4 class="card-title mb-0 text-capitalize">Order Summary</h4>
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
                                <tr class="ord-sum-total">
                                    <td class="display-6 p-4">
                                        <b>Total</b>
                                    </td>
                                    <td class="text-right p-4 display-6"><b>{{ $total }}</b></td>
                                </tr>
                                </tbody>
                            </table>
                            <hr class="m-0">
                            <div class="checkout-btn p-2 p-md-4 float-left d-inline-block">
                                <a href="{{ route('cosplay.cart.index') }}" class="d-inline-block py-3 text-theme-secondary"><i class="lnr lnr-chevron-left mr-2"></i>Back to Cart</a>
                            </div>
                            <div class="checkout-btn p-2 p-md-4 float-right d-inline-block">
                                @if(Auth::user()->coin->available_coins < $total)

                                    <a href="{{ route('member.coin.index') }}" class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white">Buy Coins</a>
                                @else
                                    <button class="d-inline-block btn btn-md btn-style py-3 px-4 radius-5 text-white">Confirm Order</button>
                                @endif
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Order Summary -->
            </div>
        </div>
    </div>
</section>

@endsection
