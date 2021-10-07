@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user"></i>
            Edit
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update',$user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

{{--                <div class="input-group control-group increment" >--}}
{{--                    <input type="file" class="form-control" name="photos[]" multiple />--}}
{{--                </div>--}}


                <div class="row">
                     <div class="col-md-4">
                         <label>Name</label>
                         <input type="text" class="form-control" name="name" value="{{ $user->profile->name }}" readonly>
                     </div>
                    <div class="col-md-4">
                        <label>Email</label>
                         <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                     </div>
                    <div class="col-md-4">
                        <label>Phone #</label>
                        <input type="text" minlength="5" class="form-control" name="phone" value="{{ $user->profile->phone_no }}" readonly>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Address</label><br>
                    <input type="text" class="form-control" name="address" value="{{ $user->profile->address }}" readonly>
                </div>
                <div class="form-group">
                    <label>Role</label><br>
                    <select class="from-control" style="width: 100%;" id="roles" name="role_id" required>
                       @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id==$role->id?'selected':'' }}>{{ $role->name }}</option>
                           @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>
    <script>
        $(document).ready(function() {
            $('#roles').select2();
        });
    </script>
    @endsection
