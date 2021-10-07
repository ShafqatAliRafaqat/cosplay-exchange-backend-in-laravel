@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-list-ol"></i>
            Order
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" value="{{ $order->user->profile->name }}"readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone#</label>
                        <input type="text" class="form-control" value="{{ $order->user->profile->phone_no }}" readonly="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" value="{{ config('global.currencySymbol').number_format($order->total,2) }}" readonly="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" value="{{ $order->status->name }}" readonly="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Delivery Address</label>
                <input type="text" class="form-control" value="{{ $order->address }}" readonly="">
            </div>
                <div class="form-group">
                    <label>Order Type</label>
                    <input type="text" class="form-control"
                           value="{{strtoupper($order->order_type).'@'.$order->order_time }}"
                           readonly="">
                </div>

            <div class="form-group table-responsive">
                    <label>Cart</label>
                    <table class="table">
                        <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Item</th>
                        <th scope="col">Variation</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach(unserialize($order->cart) as $item)
                        <tr>
                        <th scope="row">{{ $sr++ }}</th>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->options->name }}</td>
                        <td>{{ $item->qty }}</td>
                    </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
                <div class="form-group">
                    <label>Special Instructions:</label>
                    <input type="text" class="form-control" value="{{ $order->instructions }}" readonly="">
                </div>
                @foreach($order->getReplies as $reply)
                    <div class="card m-3">
                        <div class="card-header">
                            Replies
                            <span class="float-right">{{  $reply->admin->profile->name .'  '. $reply->created_at->format('d-M @ H:i')}}</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{!! $reply->reply !!}</p>
                        </div>
                    </div>
                @endforeach
                <div class="form-group">
                    <form action="{{ route('admin.order-reply.store') }}" class="form-group" method="post">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="orderId" value="{{ $order->id }}">
                        <input type="hidden" name="username" value="{{ $order->user->profile->name }}">
                        <input type="hidden" name="email" value="{{ $order->user->email }}">
                        <label>Reply</label>
                        <textarea name="reply" id="editor" cols="30" rows="10"></textarea>
                        <button type="submit" class="btn btn-success btn-sm mt-3" >Reply</button>
                    </form>
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" href="{{ route('admin.Print.show',$order) }}" target="_blank">Generate Invoice</a>
                </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        $(document).ready(function() {
            $('#cat').select2();
        });
        $(document).ready(function() {
            $('#type').select2();
        });
        $(document).ready(function() {
            $('#variation').select2();
        });
        $(document).ready(function() {
            $('#status').select2();
        });
    </script>
@endsection
