@extends('member.inc.master')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    @endsection
@section('content')

  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fas fa-question-circle"></i>
      Questions
      </a>
    </div>
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Costume</th>
          <th>Question</th>
            <th>Replies</th>
          <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
       <tr>
           <td>{{ $sr++ }}</td>
           <td>{{ $question->costumes->title }}</td>
           <td>{!! Str::limit($question->question,50) !!}</td>
           <td>{{ $question->answers->count() }}</td>
           <td><a href="{{ route('cosplay.question.show',$question) }}" class="btn btn-primary btn-sm edit" >View</a></td>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );


    </script>
    @endsection
