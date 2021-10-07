@extends('front.inc.master')
@section('content')
         <!-- /Header -->
         <!-- Header Banner Section -->
         <section class="slider-wrapper py-5">
            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                        <h1 class="text-white">{{ $costume->title }} <small class="text-danger">{{ $costume->damage?'(Damaged)':'' }}</small></h1>
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
                              <li class="breadcrumb-item d-inline-block"><a href="{{ route('home') }}" class="text-theme-secondary">Home</a> / <a href="{{ route('cosplay.costume.index') }}" class="text-theme-secondary">Costumes</a></li>
                              <li class="breadcrumb-item d-inline-block active">{{ $costume->title }}</li>
                           </ol>
                        </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /Bread crumb -->

         <!-- SINGLE PRODUCT PAGE -->
         <div class="single-pdt-page  py-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-xl-4">
                     <aside class="sidebar sidebar-user">
                        <div class="user-card shadow border bg-white p-4 text-center">
                           <div class="user-info">
                              <div class="user-avatar mb-4">
                                 <img src="{{ asset('uploads/'.$costume->user->profile->img) }}" alt="User Avatar" class="img-fluid rounded-circle border-theme" style="width: 100px;height: 100px">
                              </div>
                              <div class="user-details">
                                 <h4>{{ $costume->user->profile->username }}</h4>
                              </div>
                              <hr>

                           </div>
                        </div>
                        <div class="sidebar-pdt-desc mt-4">
                           <div class="shadow border p-4 text-center">
                              <div class="sidebar-price-tag">
                                 <h2 class="text-theme"><strong>{{ $costume->price }} Coins</strong></h2>
                              </div>
                               @if($costume->user_id != Auth::id())
                              <hr class="my-4">
                              <div class="pricing-cta">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <form action="{{ route('cosplay.cart.store') }}" method="post">
                                              @csrf
                                              @method('POST')
                                              <input type="hidden" name="costume_id" value="{{ $costume->id }}">
                                              <button  class="d-inline-block btn btn-outline-theme radius-5 btn-sm px-4 py-2 "><span class="d-inline-block"> Add To Cart</span></button>
                                          </form>
                                      </div>
                                      <div class="col-md-6">
                                              <button  class="d-inline-block btn btn-outline-theme radius-5 btn-sm px-4 py-2 " data-toggle="modal" data-target="#questionModal"><span class="d-inline-block"> Query?</span></button>
                                      </div>
                                  </div>
                              </div>
                               @endif
                           </div>
                        </div>
                     </aside>
                  </div>
                  <div class="col-lg-8 col-xl-8 mt-5 mt-md-5 mt-lg-0">
                     <div class="custom-border-left rounded shadow border p-4 bg-white mb-4 stg-title">
                        <div class="row align-items-center">
                           <div class="col-12">
                              <h3 class="text-capitalize">Details</h3>
                           </div>
                        </div>
                     </div>
                     <div class="pdt-item-showcase shadow border">
                        <div class="single-pdt-slider">
                            @foreach($costume->pictures as $pictures)
                           <div class="slide">
                              <img src="{{ asset('uploads/'.$pictures->img) }}" alt="Pdt Image Grid">
                           </div>
                            @endforeach
                        </div>
                        <div class="row align-items-center">
                           <div class="col-sm-12">
                              <div class="single-pdt-thumb text-center my-3 my-sm-5 px-4">
                                 <div class="wrapper-thumb">
                                    <div class="slider-thumb">
                                        @foreach($costume->pictures as $pictures)
                                       <div class="slide-thumb" >
                                          <img class="border-theme p-1" src="{{ asset('uploads/'.$pictures->img) }}" alt="Pdt Image Thumbnail" style="width: 140px;height: 140px">
                                       </div>
                                        @endforeach
                                    </div>
                                    <!-- /thumb-slider -->
                                 </div>
                              </div>
                              <!-- /item__preview-thumb-->
                           </div>
                           <div class="col-sm-12 text-center">
                              <div class="prev-nav thumb-nav mb-5">
                                 <span class="lnr nav-left lnr-arrow-left btn-outline-theme radius-5 p-3 p-sm-3"></span>
                                 <span class="lnr nav-right lnr-arrow-right btn-outline-theme radius-5 p-3 p-sm-3"></span>
                              </div>
                              <!-- /prev-nav -->
                           </div>
                        </div>
                        <!-- /item__action -->
                     </div>
                     <!-- /item-preview-->
                     <div class="pdt-item-info mt-4 shadow border">
                        <div class="pdt-item-nav">
                           <ul class="nav nav-tabs p-4">
                              <li>
                                 <a href="#costume-details" class="active px-4 py-2" data-toggle="tab">Costume Details</a>
                              </li>
                              <li>
                                 <a href="#costume-measurements" class="px-4 py-2" data-toggle="tab">Measurements </a>
                              </li>
                               <li>
                                   <a href="#costume-material" class="px-4 py-2" data-toggle="tab">Material </a>
                               </li>
                           </ul>
                        </div>
                        <!-- /pdt-item-nav -->
                        <div class="tab-content">
                           <div class="fade show tab-pane product-tab active" id="costume-details">
                              <div class="tab-content-wrapper p-4">
                                 <h3 class="mb-3">{{ ucfirst($costume->title)  }} <small class="text-danger">{{ $costume->damage?'(Damaged)':'' }}</small></h3>
                                 <p>{!! $costume->description !!}</p>
                              </div>
                           </div>
                           <div class="fade show tab-pane comments-tab" id="costume-measurements">
                              <div class="tab-content-wrapper p-4">
                                  <h3 class="mb-3">Measurements</h3>
                                  <p>{!! $costume->measurements !!}</p>
                                  <hr>
                                  <h3 class="mb-3">Size: <small>{{ $costume->size }}</small></h3>
                              </div>
                           </div>

                           <div class="fade show tab-pane reviews-tab" id="costume-material">
                              <div class="tab-content-wrapper p-4">
                                  <h3 class="mb-3">Material</h3>
                                  <p>{{ $costume->material }}</p>
                              </div>
                           </div>

                            {{--
                           <div class="fade show tab-pane faq-tab" id="product-faq">
                              <div class="tab-content-wrapper p-4">
                                 <div id="accordion" class="accordion">
                                    <div class="card mb-0 border-0">
                                       <div class="card-header border-theme bg-white mb-0">
                                          <a href="#collapseOne" class="card-title d-block collapsed d-block mb-0" data-toggle="collapse">
                                             <h5 class="d-inline-block">What is Lorem Ipsum? </h5>
                                          </a>
                                       </div>
                                       <div id="collapseOne" class="card-body collapse border-theme border-top-0" data-parent="#accordion">
                                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                       </div>
                                       <div class="card-header border-theme bg-white mt-3 mb-0">
                                          <a href="#collapseTwo" class="card-title collapsed d-block mb-0" data-toggle="collapse">
                                             <h5 class="d-inline-block">Why do we use it? </h5>
                                          </a>
                                       </div>
                                       <div id="collapseTwo" class="card-body collapse border-theme border-top-0" data-parent="#accordion">
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'.</p>
                                       </div>
                                       <div class="card-header card-header border-theme bg-white mt-3 mb-0">
                                          <a href="#collapseThree" class="card-title collapsed d-block mb-0" data-toggle="collapse">
                                             <h5 class="d-inline-block">Where does come? </h5>
                                          </a>
                                       </div>
                                       <div id="collapseThree" class="card-body collapse border-theme border-top-0" data-parent="#accordion">
                                          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           --}}
                        </div>
                        <!-- /tab-content -->
                     </div>
                  </div>
                  <!-- /col-md-8 -->
               </div>
            </div>
         </div>


         {{--Question Modal--}}
         <div class="modal fade" id="questionModal" tabindex="-1" role="dialog"
              aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Question</h5>
                         <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form action="{{ route('cosplay.question.store') }}" method="POST">
                         <div class="modal-body">
                             @csrf
                             @method('POST')
                             <input type="hidden" name="costume_id" value="{{ $costume->id }}">
                             <div class="form-group">
                                 <label>Question</label>
                                 <textarea class="form-control" id="question"
                                           name="question"></textarea>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary"
                                     data-dismiss="modal">Cancel
                             </button>
                             <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         {{--Question Modal--}}
         <!-- / SINGLE PRODUCT PAGE -->
         <section class="relevant-owner-pdt border-top py-5">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="mb-4">
                        <div class="row text-center">
                           <div class="col-12">
                              <h3 class="text-capitalize">More Items by {{ $costume->user->profile->name }}</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                   @foreach($allCostumes as $costume)
                       <div class="col-md-4 pdt card-deck mx-0">
                           <div class="card mx-0 border shadow">
                               <div class="wishlist-blk">
                                   <a href="wishlist-grid-view.html"><i class="fa fa-heart-o text-white"></i></a>
                               </div>
                               <div class="card-image">
                                   <img class="card-img-top" src="{{ asset('uploads/'.$costume->pictures()->where('type',0)->first()->img) }}" alt="Card image" style="width: 410px;height: 410px">
                                   <div class="image-overlay">
                                       <a href="{{ route('cosplay.costume.show',$costume) }}" class="btn btn-outline-white radius-5 py-3 px-4  text-capitalize">More Info</a>
                                   </div>
                               </div>
                               <div class="card-body p-3">
                                   <h4 class="card-title mb-0"><a href="{{ route('cosplay.costume.show',$costume) }}" class="text-link">{{ $costume->title }} <small class="text-danger">{{ $costume->damage?'(Damaged)':'' }}</small></a> </h4>
                                   <div class="card-text">
                                       <div class="card-section-1 py-3" style="{{ !$costume->damage?'margin-top: 7%':'' }}">
                                           <div class="row align-items-center">
                                               <div class="col-4">
                                                   <div class="media align-items-center">
                                                       <a  class="text-link d-inline-block">
                                                           <img src="{{ asset('uploads/'.$costume->user->profile->img) }}" alt="John Doe" class="mr-3 rounded-circle d-inline-block" style="width: 50px;height: 50px">
                                                           <div class="media-body d-inline-block">
                                                               <p><strong>{{ strstr($costume->user->profile->name ,' ')}}</strong></p>
                                                           </div>
                                                       </a>
                                                   </div>
                                               </div>
                                               <div class="col-8">
                                                   <div class="pdt-cat-tag text-right">
                                                <span class="bg-theme text-white px-3 py-1 radius-5">
                                                    <small>
                                                    @foreach($costume->categories as $costumeCategory)
                                                            {{ $costumeCategory->name }},
                                                        @endforeach
                                                    </small>
                                                </span>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-section-2">
                                           <div class="row align-items-center">
                                               <div class="col-6">
                                                   <div class="rating-blk d-inline-block">
                                                       <span class="bg-theme text-white px-3 py-1 radius-5">{{ $costume->price }} Coins</span>
                                                   </div>

                                               </div>
                                               <div class="col-6">
                                                   <div class="pdt-contact-btn text-right">
                                                <span class="p-2 display-5">
                                                <a href="tel:1234567890">
                                                <span class="lnr lnr-phone-handset"></span>
                                                </a>
                                                </span>
                                                       <span class="p-2 display-5">
                                                <a href="mailto:nookx@example.com">
                                                <span class="lnr lnr-inbox"></span>
                                                </a>
                                                </span>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-section-3 py-3" style="{{ strlen($costume->description)<200?'margin-bottom: 34%;':'' }}">
                                           <div class="row">
                                               <div class="col-12">
                                                   <div class="pdt-description">
                                                       <p>{!! Str::limit($costume->description,200) !!}</p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <hr class="mt-0">
                                       <div class="card-section-4">
                                           <div class="row">
                                               <div class="col-12">
                                                   <div class="pdt-add-to-cart text-center">
                                                       <a class="btn-outline-theme d-block radius-5 px-3 py-2" href="cart-page.html">
                                                           <span class="lnr lnr-store"></span>&nbsp;Request</span>
                                                       </a>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   @endforeach
               </div>
            </div>
         </section>
         <!-- Footer -->
        @endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('question', {
            height: '10em',
        });
    </script>
@endsection
