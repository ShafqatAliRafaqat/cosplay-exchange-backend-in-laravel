@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
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
          <th>Classes</th>
          <th>No of Classes</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($sections as $section)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{{ $section->name }}</td>
        <td>
            @foreach($section->grades as $class)
                {{ $class->name }},
                @endforeach
        </td>
        <td>{{ $section->countGrades() }}</td>
         <td><a class="btn btn-primary btn-sm edit" href="{{ route('admin.section.edit',$section) }}">Edit</a>
                 - <button type="button" class="btn btn-danger btn-sm delete" data-sectionname="{{ $section->name }}" data-sectionid="{{ $section->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">New Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.section.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Section Name</label>
                        <input type="text" class="form-control" name="name" placeholder="A,B,Red,White..." required>
                    </div>
                    <div class="form-group">
                        <label>Classes</label><br>
                        <select class="form-control" style="width: 100%" id="classSelection"  name="classes[]" multiple="multiple" required>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
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
                <h5 class="modal-title">Delete Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.section.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="section_id" name="section_id" value="">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
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
            var sectionid = button.data('sectionid');
            var modal = $(this);
            modal.find('.modal-body #section_id').val(sectionid);
        });
        $('#classSelection').select2({
            placeholder: "Select Class/Classes",
            dropdownParent: $('#newModal')
        });

    </script>
    @endsection
