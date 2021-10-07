@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')


{{--Modal New--}}
<div class="modal fade" id="newModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.order-status.store') }}" method="POST">
            <div class="modal-body">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label>Status Name</label>
                    <input type="text" class="form-control" name="status_name" placeholder="Enter Status Name">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.order-status.update','test') }}" method="post" id="editForm">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="hidden" id="status_id" name="status_id" value="">
                        <input type="text" class="form-control"  name="status_name" id="status_name">
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
                <h5 class="modal-title">Delete Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.order-status.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="status_id" name="status_id" value="">
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


  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-user-cog"></i>
      Status
        <button type="button" class="btn btn-primary btn-sm new" data-toggle="modal" data-target="#newModal">
            <i class="fas fa-plus-circle"></i> New
        </button>
      </a>
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
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($statuses as $status)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{{ $status->name }}</td>
         <td><button type="button" class="btn btn-primary btn-sm edit" data-statusname="{{ $status->name }}" data-statusid="{{ $status->id }}" data-toggle="modal" data-target="#editModal">Edit</button> -
            @if($status->id==1|| $status->id==5)
                @else
                 <button type="button" class="btn btn-danger btn-sm delete" data-statusname="{{ $status->name }}" data-statusid="{{ $status->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
             @endif
         </td>
       </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
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
            var statusname = button.data('statusname');
            var statusid=button.data('statusid');
            var modal = $(this);

            modal.find('.modal-body #status_name').val(statusname);
            modal.find('.modal-body #status_id').val(statusid);
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var statusid = button.data('statusid');
            var modal = $(this);
            modal.find('.modal-body #status_id').val(statusid);
        });

    </script>
    @endsection
