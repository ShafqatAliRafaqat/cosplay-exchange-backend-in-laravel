@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-user-cog"></i>
      Roles
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
          <th>No of Users</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($roles as $role)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{{ $role->name }}</td>
        <td>{{ $role->users()->count() }}</td>

         <td><button type="button" class="btn btn-primary btn-sm edit" data-rolename="{{ $role->name }}" data-roleid="{{ $role->id }}" data-toggle="modal" data-target="#editModal">Edit</button>
           @if($role->id>2)
                 - <button type="button" class="btn btn-danger btn-sm delete" data-rolename="{{ $role->name }}" data-roleid="{{ $role->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.role.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Role Name" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.role.update','test') }}" method="post" id="editForm">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Role Name</label>
                        <input type="hidden" id="role_id" name="role_id" value="">
                        <input type="text" class="form-control"  name="name" id="role_name">
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
                <h5 class="modal-title">Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.role.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="role_id" name="role_id" value="">
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
            var rolename = button.data('rolename');
            var roleid=button.data('roleid');
            var modal = $(this);

            modal.find('.modal-body #role_name').val(rolename);
            modal.find('.modal-body #role_id').val(roleid);
        });
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var roleid = button.data('roleid');
            var modal = $(this);
            modal.find('.modal-body #role_id').val(roleid);
        });

    </script>
    @endsection
