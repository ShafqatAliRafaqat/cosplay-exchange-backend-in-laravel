@extends('back.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-question-circle"></i>
      Qestions/Answers Edit
    </div>
    <div class="card-body">
        <form action="{{ route('admin.questions.update',$question->id) }}" method="POST">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Question</label>
                    <textarea rows="4" cols="50" id="question" name="question">{{ $question->question }}</textarea>
                </div>
                <div class="form-group">
                    <label>Answer</label>
                    <textarea rows="4" cols="50" id="answer" name="answer">{{ $question->answer }}</textarea>
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
  </div>
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
