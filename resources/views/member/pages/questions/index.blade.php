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
          <th>Asked By</th>
          <th>Question</th>
          <th>Replies</th>
          <th>Status</th>
          <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($costumes as $costume)
            @foreach($costume->questions as $question)
       <tr>


           <td>{{ $sr++ }}</td>
           <td>{{ $costume->title }}</td>
           <td>{{ $question->user->profile->username }}</td>
           <td>{!! Str::limit($question->question,50) !!}</td>
           <td>{{ $question->answers->count() }}</td>
           <td><button class="btn btn-{{ $question->answers->count()==0?'danger':'success' }} btn-sm">{{ $question->answers->count()==0?'New':'Replied' }}</button></td>
           <td><a href="{{ route('cosplay.question.show',$question) }}" class="btn btn-primary btn-sm edit" >View</a></td>


       </tr>
            @endforeach
        @endforeach
        </tbody>
      </table>
    </div>
  </div>


{{--Modal New--}}
{{--<div class="modal fade" id="newModal" tabindex="-1" role="dialog"  aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">New Coins</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <form action="{{ route('member.coin.store') }}" method="POST">--}}
{{--                <div class="modal-body">--}}
{{--                    @csrf--}}
{{--                    @method('POST')--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="number" class="form-control" step="1" min="1" name="amount" placeholder="Enter Amount" required>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                    <button type="submit" class="btn btn-primary">Purchase</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--End Modal New--}}

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
