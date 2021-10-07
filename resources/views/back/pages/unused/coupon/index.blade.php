@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-clipboard-list"></i>
        Coupons
        <button type="button" class="btn btn-primary btn-sm new" data-toggle="modal" data-target="#newModal">
            <i class="fas fa-plus-circle"></i> New
        </button>
      </div>
      @if ($errors->any())
          <div id="ERROR_COPY" style="display: none">

              @foreach ($errors->all() as $error)
                  {{ $error }}<br>
              @endforeach

          </div>
      @endif
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Code</th>
          <th>Type</th>
          <th>Value</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($coupons as $coupon)
       <tr>
         <td>{{ $sr++ }}</td>
         <td>{{ $coupon->code}}</td>
         <td>{{ $coupon->type==1?'Fix Price':'Percentage' }}</td>
         <td>{{ $coupon->type==1?config('global.currencySymbol').$coupon->value:($coupon->value*100).'%' }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('admin.coupon.edit',$coupon->id) }}">Edit</a> -
               @if($coupon->id!=1)
               <button type="button" class="btn btn-danger btn-sm delete" data-couponid="{{ $coupon->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                   @endif
           </td>
       </tr>
        @endforeach
          </tbody>
      </table>
    </div>
  </div>

  {{--Modal New--}}
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Coupon</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.coupon.store') }}" method="POST">
                  <div class="modal-body">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                          <label>Code</label>
                          <input type="text" class="form-control" placeholder="Enter Code" name="code">
                      </div>
                      <div class="form-group">
                          <label>Type</label><br>
                          <select class="from-control" style="width: 100%;" id="type" name="type" type="hidden">
                              <option value="1">Fix Price</option>
                              <option value="2">Percentage</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Value</label>
                          <input type="number" step="0.01" min="1" class="form-control" placeholder="Enter Value" name="value">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  {{--End Modal New--}}

  {{--Modal Delete--}}
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Delete Coupon</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.coupon.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="coupon_id" name="coupon_id" value="">
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        var has_errors={{$errors->count()>0?'true':'false'}};
        if(has_errors){
            Swal.fire({
                title: 'Error',
                type: 'error',
                html:jQuery("#ERROR_COPY").html(),
                showCloseButton: true,
            })
        }
    </script>
    <script type="text/javascript">
        $('#type').select2({
            dropdownParent: $('#newModal')
        });
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var couponid = button.data('couponid');
            var modal = $(this);
            modal.find('.modal-body #coupon_id').val(couponid);
        });

    </script>
@endsection
