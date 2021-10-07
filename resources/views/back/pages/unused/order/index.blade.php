@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-list-ol"></i>
        Order
      </div>
      @if ($errors->any())
          <div id="ERROR_COPY" style="display: none">

              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach

          </div>
      @endif
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered ">
        <thead>
        <tr>
          <th>#</th>
          <th>Order#</th>
          <th>User Name</th>
            <th>Type</th>
          <th>Payment Type</th>
          <th>Address</th>
          <th>Phone#</th>
          <th>Placed At</th>
          <th>Total</th>
          <th>Status</th>
          <th>Options</th>
        </tr>
        </thead>
          <tbody style="font-size: smaller">
        @foreach($orders as $order)
       <tr style=" {{ $order->status->name=='New'?'color:red;font-weight:bolder;':'' }}">
            <td>{{ $sr++ }}</td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->profile->name }}</td>
           <td>{{strtoupper($order->order_type).'@'.$order->order_time }}</td>
           <td>
               @if($order->payment_id==1)
                   <button class="btn btn-danger btn-sm">COD</button>
               @elseif($order->payment_id==2)
                   <button class="btn btn-success btn-sm">PayPal</button>
               @else
                   <button class="btn btn-warning btn-sm">Card</button>
               @endif
           </td>
           <td>{{ str_limit($order->address,50) }}</td>
            <td>{{ $order->user->profile->phone_no }}</td>
            <td>{{ $order->created_at->format('d-M @ H:i') }}</td>
            <td>{{ config('global.currencySymbol') }}{{ number_format($order->total, 2) }}</td>
            <td>{{ $order->status->name }}</td>
            <td><a class="btn btn-info btn-sm" href="{{ route('admin.order.show',$order->id) }}">View</a> -
                <button type="button" class="btn btn-primary btn-sm edit" data-orderstatusname="{{ $order->status->name }}" data-orderid="{{ $order->id }}" data-toggle="modal" data-target="#editModal">Change Status</button>
                @if(Auth::user()->role_id==1)
                -
                <button type="button" class="btn btn-danger btn-sm delete" data-orderid="{{ $order->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                    @endif
            </td>
      </tr>
        @endforeach
          </tbody>
      </table>
    </div>
  </div>
  {{--Modal Edit--}}
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.order.update','test') }}" method="post" id="editForm">
                  @method('PUT')
                  @csrf
                  <div class="modal-body">
                      <div class="form-group">
                          <label>Order Status</label>
                          <input type="hidden" id="order_id" name="order_id" value="">
                          <select class="from-control" style="width: 100%;" id="status" name="status_id">
                              @foreach($statuses as $status)
                                  <option value="{{ $status->id }}">{{ $status->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <input type="checkbox" name="notify_user"> Notify User
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  {{--End Modal Edit--}}
  {{--Modal Delete--}}
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Delete Order</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.order.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="order_id" name="order_id" value="">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
  {{--End Modal Delete--}}
@endsection
@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

        $('#status').select2({
            dropdownParent: $('#editModal')
        });
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);// Button that triggered the modal
            var orderstatusname = button.data('orderstatusname');
            var orderid=button.data('orderid');
            var modal = $(this);

            modal.find('.modal-body #status_id').val(orderstatusname);
            modal.find('.modal-body #order_id').val(orderid);
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var orderid = button.data('orderid');
            var modal = $(this);
            modal.find('.modal-body #order_id').val(orderid);
        });

    </script>
@endsection
