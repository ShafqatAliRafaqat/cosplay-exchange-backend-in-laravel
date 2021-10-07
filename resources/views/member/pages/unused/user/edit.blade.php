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
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                @if ($errors->any())
                    <div id="ERROR_COPY" style="display: none">

                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach

                    </div>
                @endif
            <form action="{{ route('admin.user.update',$user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                     <div class="col-md-4">
                         <label>Name</label>
                         <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                     </div>
                    <div class="col-md-4">
                        <label>Email</label>
                         <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                     </div>
                    <div class="col-md-4">
                        <label>Phone #</label>
                        <input type="text" minlength="5" class="form-control" name="phone" value="{{ $user->phone_no }}" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Address</label><br>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
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
    <script>
        $(document).ready(function() {
            $('#roles').select2();
        });
    </script>
    @endsection
