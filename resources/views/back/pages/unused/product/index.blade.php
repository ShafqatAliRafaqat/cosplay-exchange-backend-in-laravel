@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <style>

    </style>
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-project-diagram"></i>
        Products
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
          <th>Thumbnail</th>
          <th>Name</th>
          <th>Category</th>
          <th>Type</th>
          <th>Variations</th>
          <th>Unit Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($products as $product)
       <tr>
         <td>{{ $sr++ }}</td>
           <td><a target="_blank" href="{{ asset('uploads/'.$product->thumbnail) }}">
               <img class="productImage" src="{{ asset('uploads/'.$product->thumbnail) }}" alt="Forest">
               </a>
           </td>
         <td>{{ $product->name }}</td>
           <td><small>
           @foreach($product->categories as $category)
                       {{ $category->name }},
           @endforeach
           </small></td>
           <td><small>
                   @foreach($product->types as $type)
                       {{ $type->name }},
                   @endforeach
               </small></td>
         <td>{{ $product->getCount() }}</td>
         <td>{{ config('global.currencySymbol') }}{{ number_format($product->unit_price, 2) }}</td>
         <td>{{ $product->is_active==1?'Active':'In-Active' }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('admin.product.edit',$product->id) }}">Edit</a> -
               <button type="button" class="btn btn-danger btn-sm delete" data-productid="{{ $product->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" placeholder="Enter Product Name" name="name">
                      </div>
                      <div class="form-group">
                          <label>Product Description</label>
                          <textarea rows="4" cols="50" id="editor"  name="description" placeholder="Enter description" ></textarea>
                      </div>
                      <div class="form-group">
                          <label>Categories</label><br>
                          <select class="form-control" style="width: 100%" id="cat"  name="categories[]" multiple="multiple">
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Type</label><br>
                          <select class="form-control" style="width: 100%" id="type"  name="types[]" multiple="multiple">
                              @foreach($types as $type)
                                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Variations</label><br>
                          <select class="form-control" style="width: 100%" id="variation"  name="variations[]" multiple="multiple">
                              @foreach($variations as $variation)
                                  <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Variation Mandatory</label><br>
                              <input class="m-1" type="radio" name="mandatory" value="0" checked>No
                              <input class="m-1" type="radio" name="mandatory" value="1">Yes
                      </div>
                      <div class="form-group">
                          <label>Unit Price</label>
                          <input type="number" step="0.01" min="0.1" class="form-control" placeholder="Enter Product Unit Price" name="price">
                      </div>
                      <div class="form-group">
                          <label>Picture</label>
                          <input type="file" class="form-control-file"  name="image">
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
                  <h5 class="modal-title">Delete Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.product.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="product_id" name="product_id" value="">
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
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

        $('#cat').select2({
            placeholder: "Select Category/Categories",
            dropdownParent: $('#newModal')
        });
        $('#type').select2({
            placeholder: "Select Type/Types",
            dropdownParent: $('#newModal')
        });
        $('#variation').select2({
            placeholder: "Select Variation(if any)",
            dropdownParent: $('#newModal')
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var productid = button.data('productid');
            var modal = $(this);
            modal.find('.modal-body #product_id').val(productid);
        });

    </script>
@endsection
