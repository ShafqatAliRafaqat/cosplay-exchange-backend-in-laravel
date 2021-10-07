@extends('member.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-theater-masks"></i>
            Requests
        </div>
        <div class="card-body">
            @foreach($exchanges as $exchange)
            <div class="card mt-3 ">
                <h5 class="card-header bg-dark text-white">Request#{{ $sr++ }} <span class="float-right text-warning">Deadline: {{ $exchange->deadline }}</span></h5>
                <div class="card-body">
                    <div class="form-group">
                        <label>Ship To Address</label>
                        <textarea class="form-control" rows="5" readonly>{{ $exchange->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Legal Name</label>
                        <input type="text" class="form-control" value="{{ \App\User::find($exchange->user_id)->profile->name }}" readonly>
                    </div>
                    @if($exchange->costumes()->first()->request_status==0)
                    <form action="{{ route('cosplay.request.update',$exchange->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="costume_id" value="{{ $exchange->costumes_id }}">
                        <button class="btn btn-primary">Accept</button>
                    </form>
                        @elseif($exchange->shipping()->count()>0)
                        <a href="{{ route('member.shipping.edit',$exchange->shipping()->first()) }}" class="btn btn-success btn-sm" >Update Shipping</a>
                        @else
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#newModal">
                            Add Shipping
                        </button>
                        {{--Modal New--}}
                            <div class="modal fade" id="newModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Shipping Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{ route('member.shipping.store') }}">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="exchange_id" value="{{ $exchange->id }}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label> Tracking Number</label>
                                                    <input type="text" class="form-control" name="tracking_number" placeholder="Enter Tracking Number" required>
                                                </div>
                                                <div class="form-group">
                                                    <label> Tracking Link</label>
                                                    <input type="text" class="form-control" name="tracking_link" placeholder="Enter Tracking Link" required>
                                                </div>
                                                <div class="form-group">
                                                    <label> Postal Service</label>
                                                    <input type="text" class="form-control" name="postal_service" placeholder="Enter Postal Service" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Add Shipping</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        {{--End Modal New--}}
                     @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('address', {
            height: '10em',
        });

    </script>

@endsection
