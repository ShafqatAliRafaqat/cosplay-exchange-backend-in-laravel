@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-question-circle"></i>
      Qestions/Answers
        <button type="button" class="btn btn-primary btn-sm new" data-toggle="modal" data-target="#newModal">
            <i class="fas fa-plus-circle"></i> New
        </button>
    </div>
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Question</th>
          <th>Answer</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
          @foreach($questions as $questionAnswer)
       <tr>
        <td>{{ $sr++ }}</td>
        <td>{!! $questionAnswer->question !!}</td>
        <td>{!! $questionAnswer->answer !!}</td>

         <td><a class="btn btn-primary btn-sm edit" href="{{ route('admin.questions.edit',$questionAnswer->id) }}">Edit</a>
             - <button type="button" class="btn btn-danger btn-sm delete" data-questionid="{{ $questionAnswer->id }}" data-toggle="modal" data-target="#deleteModal">Delete</button>
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
                <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.questions.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Question</label>
                        <textarea rows="4" cols="50" id="question" name="question"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Answer</label>
                        <textarea rows="4" cols="50" id="answer" name="answer"></textarea>
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
                <h5 class="modal-title">Delete Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.questions.destroy','test') }}" method="post" id="editForm">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    <div class="modal-body">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                        <input type="hidden" id="question_id" name="question_id" value="">
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
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('question', {
            height: '6em',
        });
        CKEDITOR.replace('answer', {
            height: '6em',
        });
    </script>
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
            var questionid = button.data('questionid');
            var modal = $(this);
            modal.find('.modal-body #question_id').val(questionid);
        });

    </script>
    @endsection
