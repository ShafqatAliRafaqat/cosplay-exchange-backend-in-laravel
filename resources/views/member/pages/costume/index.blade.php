@extends('member.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <style>

    </style>
@endsection
@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <i class="fas fa-theater-masks"></i>
        Costumes
        <a class="btn btn-primary btn-sm new" href="{{ route('member.costume.create') }}" >
            <i class="fas fa-plus-circle"></i> New
        </a>
      </div>
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Photos</th>
          <th>Status</th>
          <th>Questions</th>
          <th>Approved</th>
          <th>Requests</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($costumes as $costume)
       <tr>
           <td>{{ $sr++ }}</td>
           <td>{{ $costume->title }}</td>
           <td>
               @foreach($costume->categories as $category)
                   {{ $category->name }},
               @endforeach
           </td>
           <td>{{ $costume->pictures()->count() }}</td>
           <td>{{ $costume->status()->first()->name }}</td>
           <td>{{ $costume->questions->count() }}</td>
         <td>{{ $costume->is_approved==0?'Pending':'Approved' }}</td>
         <td>{{ $costume->exchanges()->count() }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('member.costume.edit',$costume) }}">Edit</a>
{{--               {{ dd($costume->exchange()->first()->shipping()->first()!=null) }}--}}
               @if($costume->questions->count()>0)
                   - <a class="btn btn-warning btn-sm" href="{{ route('cosplay.questions.all',$costume->user->id) }}">Queries</a>
               @endif
               @if($costume->exchanges()->count()>0)
                   <a class="btn btn-success btn-sm" href="{{ route('cosplay.request.show',$costume->id) }}">Requests</a>

               @endif
               @if($costume->status_id>1)
                   <button type="button" class="btn btn-info btn-sm delete" data-statusid="{{ $costume->id }}" data-statusname="{{ $costume->status()->first()->name}}" data-toggle="modal" data-target="#editModal">Change Status</button>

               @endif

               @if($costume->is_approved==0)
               -
               <button type="button" class="btn btn-danger btn-sm delete" data-costumeid="{{ $costume->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('member.costume.status.update','test') }}" method="post" id="editForm">
                  @method('PUT')
                  @csrf
                  <div class="modal-body">
                      <div class="form-group">
                          <label>Status</label>
                          <input type="hidden" id="status_id" name="status_id" value="">
                          <div class="form-group">
                              <select class="form-control" name="status">
                                  @foreach($statuses as $status)
                                  <option value="{{ $status->id }}">{{ $status->name }}</option>
                                  @endforeach
                              </select>
                          </div>
{{--                          <input type="text" class="form-control"  name="status_name" id="status_name">--}}
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
                  <h5 class="modal-title">Delete Costume</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('member.costume.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="costume_id" name="costume_id" value="">
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
            var costumeid = button.data('costumeid');
            var modal = $(this);
            modal.find('.modal-body #costume_id').val(costumeid);
        });
    </script>
@endsection
