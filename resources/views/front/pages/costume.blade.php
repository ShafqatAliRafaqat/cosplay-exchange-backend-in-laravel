@extends('front.inc.master')
@section('content')
         <section class="slider-wrapper py-5">
            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="inner-banner-heading py-0 py-md-3 py-lg-5">
                        <h1 class="text-white">Costumes</h1>
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
                           <li class="breadcrumb-item d-inline-block active">Costumes</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /Bread crumb -->

         <!-- Product Grid -->
         <div class="pdt-filter-wrapper  py-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-12">
                     <!-- Filter Area -->
                     <aside class="pdt-filter-blk card mb-6 shadow">
                        <div id="accordion" class="accordion">
                           <div class="card mb-0 border-0">
                              <div class="card-header bg-white border-bottom-0 p-3 mb-0">
                                 <a href="#collapseOne" class="card-title text-dark d-inline-block mb-0 w-100" data-toggle="collapse">
                                    <h5 class="d-inline">Categories</h5>
                                 </a>
                              </div>
                              <div id="collapseOne" class="card-body pt-0 pb-3 collapse show" data-parent="#accordion">
                                  <div class="custom-control custom-radio mb-2">
                                      <a href="{{ route('cosplay.costume.index') }}" class="btn btn-primary" style="background: #3E1779;border-color: #3E1779;width: 90%">All Costumes</a>
                                  </div>
                                  @foreach($categories as $category)
                                 <div class="custom-control custom-radio mb-2">
                                     <a href="{{ route('cosplay.category.show',$category) }}" class="btn btn-primary" style="background: #3E1779;border-color: #3E1779;width: 90%">{{ $category->name }}</a>
                                 </div>
                                      @endforeach
                              </div>
                               <div class="card-header bg-white my-0 p-0 border-bottom-0">
                                   <a href="#collapseTwo" class="card-title collapsed text-dark border border-bottom-0 d-inline-block p-3 mb-0 w-100" data-toggle="collapse">
                                       <h5 class="d-inline"> Filter</h5>
                                   </a>
                               </div>
                               <div id="collapseTwo" class="card-body collapse border border-0 pt-0 pb-3" data-parent="#accordion">
                                   <div class="card-header bg-white p-4">
                                       <form action="{{ route('cosplay.costume.search') }}" class="form-group" method="post">
                                           @method('POST')
                                           @csrf
                                           <h3 class="card-title mb-2"><input type="text" class="form-control" placeholder="Search By Name" name="name"  style="font-size: 24px;"></h3>
                                           <h3 class="card-title mb-2"><input type="number" class="form-control" placeholder="Search By Coins" name="coin" style="font-size: 24px;"></h3>
                                           <h3 class="card-title mb-2">
                                               <select name="size">
                                                   <option value="">Select Size</option>
                                                   <option value="xs">XS</option>
                                                   <option value="s">S</option>
                                                   <option value="m">M</option>
                                                   <option value="l">L</option>
                                                   <option value="xl">XL</option>
                                                   <option value="xxl">XXL</option>
                                               </select>
                                           </h3>
                                           <button class="text-grey mt-1">Search</button>
                                       </form>
                                   </div>
                               </div>
                           </div>
                        </div>
                     </aside>
                     <!-- /Filter Area -->
                  </div>
                  <div class="col-lg-8">

                     <div class="row">

                         {{--Costume Start--}}
                        @if($costumes->count()>0)
                        @foreach($costumes as $costume)
                        <div class="col-md-6 pdt card-deck mx-0">
                           <div class="card mx-0 border shadow">
                              <div class="card-image">
                                 <img class="card-img-top" src="{{ asset('uploads/'.$costume->pictures()->where('type',0)->first()->img) }}" alt="Card image" style="width: 410px;height: 410px">
                                 <div class="image-overlay">
                                    <a href="{{ route('cosplay.costume.show',$costume) }}" class="btn btn-outline-white radius-5 py-3 px-4  text-capitalize">More Info</a>
                                 </div>
                              </div>
                              <div class="card-body p-3">
                                 <h4 class="card-title mb-4"><a href="{{ route('cosplay.costume.show',$costume) }}" class="text-link">{{ Str::limit($costume->title,50) }}  <small class="text-danger">{{ $costume->damage?'(Damaged)':'' }}</small></a> </h4>
                                 <div class="card-text">
                                    <div class="card-section-1 py-3" style="{{ !$costume->damage?'margin-top: 7%':'' }}">
                                       <div class="row align-items-center">
                                          <div class="col-4">
                                             <div class="media align-items-center">
                                                <a  class="text-link d-inline-block">
                                                   <img src="{{ asset('uploads/'.$costume->user->profile->img) }}" alt="John Doe" class="mr-3 rounded-circle d-inline-block" style="width: 50px;height: 50px">
                                                   <div class="media-body d-inline-block">
                                                      <p><strong>{{ $costume->user->profile->username}}</strong></p>
                                                   </div>
                                                </a>
                                             </div>
                                          </div>
                                          <div class="col-8">
                                             <div class="pdt-cat-tag text-right">
                                                <span class="bg-theme text-white px-3 py-1 radius-5">
                                                    <small>

                                                            {{ strtoupper($costume->size) }}
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
                                                 <div class="row">
                                                     <div class="col-md-12">
                                                         <a href="{{ route('cosplay.costume.show',$costume) }}" class="btn-outline-theme d-block radius-5 px-3 py-2 w-100"> See Info</a>
                                                     </div>
                                                 </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>




                        @endforeach

                        @else
                            <h3>No Items Found</h3>
                        @endif
                    {{--Costume End--}}

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Product Grid -->


         @endsection

