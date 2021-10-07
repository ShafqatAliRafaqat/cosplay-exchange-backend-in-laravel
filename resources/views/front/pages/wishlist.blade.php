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
                            <li class="breadcrumb-item d-inline-block active">Wishlist</li>
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

                <div class="col-lg-8">

                    <div class="row">

                        {{--Costume Start--}}
                        @if($items->count()>0)
                            @foreach($items as $costume)

                                <div class="col-md-6 pdt card-deck mx-0">
                                    <div class="card mx-0 border shadow">
                                        <div class="card-image">
                                            <img class="card-img-top" src="{{ asset('uploads/'.$costume->thumbnail) }}" alt="Card image" style="width: 410px;height: 410px">
                                            <div class="image-overlay">
                                                <a href="{{ route('cosplay.costume.show',$costume) }}" class="btn btn-outline-white radius-5 py-3 px-4  text-capitalize">More Info</a>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
                                            <h4 class="card-title mb-0"><a href="{{ route('cosplay.costume.show',$costume) }}" class="text-link">{{ Str::limit($costume->title,50) }}  <small class="text-danger">{{ $costume->damage?'(Damaged)':'' }}</small></a> </h4>
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
                                                            <div class="pdt-contact-btn text-right">
                                                                <a href="#" class="bg-theme text-white px-3 py-1 radius-5" data-toggle="modal" data-target="#questionModal">Ask Question</a>
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
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <form action="{{ route('cosplay.cart.store') }}" method="post">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <input type="hidden" value="{{ $costume->id }}" name="costume_id">
                                                                            <button class="btn-outline-theme d-block radius-5 px-3 py-2 w-100" type="submit">
                                                                                <span class="lnr lnr-store"></span>&nbsp;Request</span>
                                                                            </button>
                                                                        </form>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <form action="{{ route('cosplay.wishlist.store') }}" method="post" id="Wishlist-Store">
                                                                            @csrf
                                                                            @method('POST')
                                                                            <input type="hidden" value="{{ $costume->id }}" name="costume_id">
                                                                            <button class="btn-outline-theme d-block radius-5 px-3 py-2 w-100" type="submit">
                                                                                <span class="lnr lnr-heart"></span>&nbsp;Wishlist</span>
                                                                            </button>
                                                                        </form>
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

    {{--Question Modal--}}
    <div class="modal fade" id="questionModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cosplay.question.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label>Question</label>
                            <textarea class="form-control" id="question" name="question" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--Question Modal--}}

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
