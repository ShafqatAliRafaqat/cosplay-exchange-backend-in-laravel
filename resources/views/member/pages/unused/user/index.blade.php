@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-users"></i>
        Users
    </div>

    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone #</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($users as $user)
       <tr>
         <td>{{ $sr++ }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>
         <td>{{ $user->phone_no }}</td>
         <td>{{ $user->role->name }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('admin.user.edit',$user) }}">Edit</a> -
               <a class="btn btn-info btn-sm" href="{{ route('admin.user.show',$user) }}">View</a>
               @if($user->role->id>1)
                - <button type="button" class="btn btn-danger btn-sm delete" data-userid="{{ $user->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
                @endif
           </td>
       </tr>
        @endforeach
          </tbody>
      </table>
    </div>
  </div>



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
              <form action="{{ route('admin.user.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="user_id" name="user_id" value="">
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
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var userid = button.data('userid');
            var modal = $(this);
            modal.find('.modal-body #user_id').val(userid);
        });

    </script>
@endsection
