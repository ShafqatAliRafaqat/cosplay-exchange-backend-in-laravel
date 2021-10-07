@extends('auth.inc.master')
<style type="text/css">
    .text{
     color: white;
    }
    .hoverClass:hover { color: #e801cf; }
</style>
@section('content')
    <div class="row justify-content-center" >

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: black">
                <div class="card-body p-8">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="p-6">
                                <div class="text-center">
<!--                                    <h1 class="h4 text-white-900 mb-4 text">Welcome Back!</h1>-->
                                    <a href="{{url('/')}}">
                                        <img src="{{ asset('front/img/logo_finall.png') }}" alt="cosplay-exchange" style="width: 70%;margin-right: 10%;">
                                    </a>
                                </div>
                                <form class="user"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">

                                        <input type="email" id="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address...">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="remeber_me"  name="remeber_me"> <label>Remember me?</label>
                                    </div>
                                    <input type="submit" class="btn btn-block" style="color: white ; background-color: #db23db;" value="Login"/>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <h6 ><a class="hoverClass text" href="{{ route('register') }}">Create an Account!</a></h6>
                                </div>
                                <div class="text-center">
                                    <a class="small text hoverClass" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @endsection
