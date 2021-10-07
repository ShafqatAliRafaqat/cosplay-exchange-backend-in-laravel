@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-bezier-curve"></i>
        Variation
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
          <th>Name</th>
          <th>Price</th>
          <th>Products</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($variations as $variation)
       <tr>
         <td>{{ $sr++ }}</td>
         <td>{{$variation->name}}</td>
         <td>{{ config('global.currencySymbol') }}{{ number_format($variation->price,2) }}</td>
         <td>
             @foreach($variation->products as $product)
                 {{ $product->name }},
                 @endforeach
         </td>
         <td>{{ $variation->is_active==1?'Active':'In-Active' }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('admin.variation.edit',$variation->id) }}">Edit</a> -
               <button type="button" class="btn btn-danger btn-sm delete" data-variationid="{{ $variation->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">New Variation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.variation.store') }}" method="POST">
                  <div class="modal-body">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Enter Variation Name" name="name">
                      </div>
                      <div class="form-group">
                          <label>Price</label>
                          <input type="number" step="0.01" min="0" class="form-control-file" placeholder="Enter Price"  name="price">
                      </div>
                      <div class="form-group">
                          <label>Status</label><br>
                          <select class="form-control" style="width: 100%" name="status">
                              <option value="0" selected>In-Active</option>
                              <option value="1">Active</option>
                          </select>
                      </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
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
                  <h5 class="modal-title">Delete Variation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.variation.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="variation_id" name="variation_id" value="">
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var variationid = button.data('variationid');
            var modal = $(this);
            modal.find('.modal-body #variation_id').val(variationid);
        });

    </script>
@endsection
