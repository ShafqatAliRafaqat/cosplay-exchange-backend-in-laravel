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
                <form action="{{ route('admin.type.update',$type->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $type->name }}" name="name">
                        </div>
                    <div class="row no-gutters">
                        <div class="col">
                            @if ($type->icon != null)
                                <label>Files</label><br>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="card bg-light shadow">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <a href="{{ asset('uploads/'.$type->icon) }}" download>
                                                            <img class="productImage" src="{{ asset('uploads/'.$type->icon) }}" alt="icon">

                                                        </a>
                                                    </div>
                                                    <div class="float-right">
                                                        <a href="#">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Icon</label>
                            <input type="file" class="form-control-file"  name="image">
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <select class="form-control" style="width: 100%" name="status" id="status">
                                @if($type->is_active==0)
                                    <option value="0" selected>In-Active</option>
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">In-Active</option>
                                    <option value="1" selected>Active</option>
                                @endif
                            </select>
                        </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
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
            $('#status').select2();
        });
    </script>
    @endsection
