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
    <div class="card-header py-3">
        <i class="fas fa-globe"></i>
        Countries
        <button type="button" class="btn btn-primary btn-sm new" data-toggle="modal" data-target="#newModal">
            <i class="fas fa-plus-circle"></i> New
        </button>
      </div>

    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Country</th>
          <th>Code</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($countries as $country)
       <tr>
         <td>{{ $sr++ }}</td>
         <td>{{ $country->name }}</td>
         <td>{{ $country->code }}</td>
           <td><a class="btn btn-primary btn-sm" href="{{ route('admin.country.edit',$country->id) }}">Edit</a> -
               <button type="button" class="btn btn-danger btn-sm delete" data-countryid="{{ $country->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">New Country</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.country.store') }}" method="POST">
                  <div class="modal-body">
                      @csrf
                      @method('POST')
                      <div class="form-group">
                          <label>Country Name</label>
                          <input type="text" class="form-control" placeholder="Enter Country Name" name="country">
                      </div>
                      <div class="form-group">
                          <label>Country Code</label>
                          <input type="text" class="form-control" placeholder="Enter Country Code" name="code">
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
                  <h5 class="modal-title">Delete Country</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('admin.country.destroy','test') }}" method="post" id="editForm">
                  @method('DELETE')
                  @csrf
                  <div class="modal-body">
                      <div class="modal-body">
                          <p class="text-center">
                              Are you sure you want to delete this?
                          </p>
                          <input type="hidden" id="country_id" name="country_id" value="">
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
  End Modal Delete
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
            var countryid = button.data('countryid');
            var modal = $(this);
            modal.find('.modal-body #country_id').val(countryid);
        });

    </script>
@endsection
