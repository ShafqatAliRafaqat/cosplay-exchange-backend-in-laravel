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
          <th>Costume Title</th>
          <th>Status</th>
          <th>Shipping Status</th>
        </tr>
        </thead>
          <tbody>
        @foreach($exchanges as $exchange)
       <tr>
           <td>{{ $sr++ }}</td>
           <td>{{ $exchange->costumes()->first()->title }}</td>
           <td>
               @if($exchange->status==1)
                   Pending
               @elseif($exchange->status==2)
                   Accepted
               @else
                    Rejected
               @endif
           </td>
           <td>{{ $exchange->status==3?'Un-Available':$exchange->costumes()->first()->status()->first()->name }}</td>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@endsection
