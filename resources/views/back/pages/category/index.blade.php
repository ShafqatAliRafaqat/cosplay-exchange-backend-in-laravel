@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-align-center"></i>
      Categories
        <button type="button" class="btn btn-primary btn-sm new" data-toggle="modal" data-target="#newModal">
            <i class="fas fa-plus-circle"></i> New
        </button>
      </a>
    </div>
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>No of Costumes</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->costumes()->count() }}</td>

         <td><a class="btn btn-primary btn-sm edit text-white" href="{{ route('admin.category.edit',$category) }}" >Edit</a>

                 - <button type="button" class="btn btn-danger btn-sm delete" data-categoryname="{{ $category->name }}" data-categoryid="{{ $category->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>

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
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Category Name" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <input type="file" name="image" required>
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
{{--Modal Edit--}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.category.update','test') }}" method="post" id="editForm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="hidden" id="category_id" name="category_id" value="">
                        <input type="text" class="form-control"  name="name" id="category_name">
                    </div>
                    <div class="form-group">
                        <label>Category Icon</label>
                        <input type="file" class="form-control"  name="img" id="category_img" required>
                    </div>
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
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.category.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="category_id" name="category_id" value="">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);// Button that triggered the modal
            var categoryname = button.data('categoryname');
            var categoryid=button.data('categoryid');
            var categoryimg=button.data('categoryimg');
            var modal = $(this);

            modal.find('.modal-body #category_name').val(categoryname);
            modal.find('.modal-body #category_id').val(categoryid);
            modal.find('.modal-body #category_img').val(categoryimg);
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var categoryid = button.data('categoryid');
            var modal = $(this);
            modal.find('.modal-body #category_id').val(categoryid);
        });

    </script>
    @endsection
