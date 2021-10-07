@extends('front.inc.master')
@section('content')
         <section class="slider-wrapper py-5">
            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                        <h1 class="text-white">Contact</h1>
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
                           <li class="breadcrumb-item d-inline-block active">Contact</li>
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
                <div class="col-lg-6">
                    <div class="">
                        <h3 class="text-capitalize"><strong>How Can We Help?</strong></h3>
                        {{--                        <p class="my-4">Laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats. Lid est laborum dolo rumes fugats untras.</p>--}}
                        {{--                        <h4 class="text-capitalize"><strong>HeadQuarters</strong></h4>--}}
                        <address class="mt-4 mb-0">
                            {{--                           <div class="media align-items-center mb-2">--}}
                            {{--                              <span class="lnr lnr-phone-handset"></span>--}}
                            {{--                              <div class="media-body ml-2">--}}
                            {{--                                 <p>Phone: (850) 386-7896</p>--}}
                            {{--                              </div>--}}
                            {{--                           </div>--}}
                            <div class="media align-items-center mb-2">
                                <span class="lnr lnr-envelope"></span>
                                <div class="media-body ml-2">
                                    <p><a href="mailto:support@example.com"> Info@cosplay-exchange.com</a></p>
                                </div>
                            </div>
                            {{--                           <div class="media align-items-center mb-0">--}}
                            {{--                              <span class="lnr lnr-map-marker"></span>--}}
                            {{--                              <div class="media-body ml-2">--}}
                            {{--                                 <p>1603 Old York Rd, Houma, LA, 75429 </p>--}}
                            {{--                              </div>--}}
                            {{--                           </div>--}}
                        </address>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form mt-5 mt-lg-0">
                        <div class="contact-title mb-4">
                            <h3>Leave Your Messages</h3>
                        </div>
                        <div class="enquiry-form">
                            <form>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-md-4 mb-4" placeholder="Name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-md-4 mb-4" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-md-4 mb-4" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control mb-md-4 mb-4" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 mb-5">
                                        <textarea rows="5" class="form-control p-3 mb-0" placeholder="Your text here..."></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <div class="contact-btn text-center">
                                            <a href="javascript:;" class="d-inline-block btn px-5 py-3 btn-style text-white radius-5 align-middle">Send Request</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </section>
        @endsection()
