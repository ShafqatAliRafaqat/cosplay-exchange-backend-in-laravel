@extends('back.inc.master')
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
      </div>
    <div class="card-body table-responsive">
      <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Status</th>
          <th>Tracking</th>
          <th>Link</th>
          <th>Postal</th>
          <th>Actions</th>
        </tr>
        </thead>
          <tbody>
        @foreach($costumes as $costume)
       <tr>
           <td>{{ $sr++ }}</td>
           <td>{{ $costume->title }}</td>
           <td>{{ $costume->status()->first()->name }} </td>
           <td>{{ $costume->exchanges()->where('status',2)->first()->shipping()->first()->tracking_number }}</td>
           <td>{{ $costume->exchanges()->where('status',2)->first()->shipping()->first()->tracking_link }}</td>
           <td>{{ $costume->exchanges()->where('status',2)->first()->shipping()->first()->postal_service }}</td>
           <td>
               <form action="{{ route('admin.delivered.update',$costume->id) }}" method="post">
                   @csrf
                   @method('PUT')
                   <button class="btn btn-primary btn-sm">Approve</button> -
               </form>
               <form action="{{ route('admin.delivered.refund.both',$costume->id) }}" method="post">
                   @csrf
                   @method('PUT')
                   <button class="btn btn-warning btn-sm">Refund Both</button> -
               </form>

               <form action="{{ route('admin.delivered.destroy',$costume->id) }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger btn-sm">Dis-Approve</button>
               </form>
           </td>
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
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var costumeid = button.data('costumeid');
            var modal = $(this);
            modal.find('.modal-body #costume_id').val(costumeid);
        });
    </script>
@endsection
