@extends('front.inc.master')
@section('content')
         <section class="slider-wrapper py-5">
            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                        <h1 class="text-white">Questions & Answers</h1>
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
                           <li class="breadcrumb-item d-inline-block active">QUestions & Answers</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /Bread crumb -->

         <!-- Contact -->

         <section class="contact-wrapper py-5">
            <div class="container">
                    <div class="shadow border px-4 py-0">
                        @foreach($questions as $question)
                        <div id="section1" class="blank-content-blk py-4">
                            <h5 class="text-capitalize drop-cap"><strong>Q </strong>{!! $question->question !!}</h5>
                            <p class="pt-4 drop-cap"><strong>A </strong>{!! $question->answer !!}</p>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                </div>
         </section>







        @endsection()
