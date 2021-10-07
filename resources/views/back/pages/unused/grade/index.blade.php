@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

@if ($errors->any())
    <div id="ERROR_COPY" style="display: none">

        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach

    </div>
@endif
  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Classes
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
            <th>Symbol</th>
          <th>Sections</th>
          <th>Students</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($classes as $class)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{{ $class->name }}</td>
           <td>{{ $class->symbol }}</td>
        <td>{{ $class->sections()->count() }}</td>
        <td>5</td>
         <td><button type="button" class="btn btn-primary btn-sm edit" data-classname="{{ $class->name }}" data-classid="{{ $class->id }}" data-classsymbol="{{ $class->symbol }}" data-toggle="modal" data-target="#editModal">Edit</button>
                 - <button type="button" class="btn btn-danger btn-sm delete" data-classname="{{ $class->name }}" data-classid="{{ $class->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">New Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.class.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" class="form-control" name="name" placeholder="One,Two,Three..." required>
                    </div>
                    <div class="form-group">
                        <label>Class Symbol</label>
                        <input type="text" class="form-control" name="symbol" placeholder="1,2,3...." required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.class.update','test') }}" method="post" id="editForm">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="hidden" id="class_id" name="class_id" value="">
                        <input type="text" class="form-control"  name="name" id="class_name">
                    </div>
                    <div class="form-group">
                        <label>Class Symbol</label>
                        <input type="text" class="form-control"  name="symbol" id="class_symbol">
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
                <h5 class="modal-title">Delete Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.class.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="class_id" name="class_id" value="">
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
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);// Button that triggered the modal
            var classname = button.data('classname');
            var classsymbol = button.data('classsymbol');
            var classid=button.data('classid');
            var modal = $(this);

            modal.find('.modal-body #class_name').val(classname);
            modal.find('.modal-body #class_id').val(classid);
            modal.find('.modal-body #class_symbol').val(classsymbol);
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var classid = button.data('classid');
            var modal = $(this);
            modal.find('.modal-body #class_id').val(classid);
        });

    </script>
    @endsection
