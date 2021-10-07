@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-project-diagram"></i>
            Edit
        </div>
        <div class="card-body">
            @if ($errors->any())
                    <div id="ERROR_COPY" style="display: none">

                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach

                    </div>
                @endif
                <form action="{{ route('admin.variation.update',$variation->id) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $variation->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.01" min="0" class="form-control-file" value="{{ $variation->price }}" name="price">
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <select class="form-control" style="width: 100%" name="status" id="status">
                                @if($variation->is_active==0)
                                    <option value="0" selected>In-Active</option>
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">In-Active</option>
                                    <option value="1" selected>Active</option>
                                @endif
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#status').select2();
        });
    </script>
    @endsection
