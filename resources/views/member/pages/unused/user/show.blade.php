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
                <div class="row">
                     <div class="col-md-3">
                         <label>Name</label>
                         <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                     </div>
                    <div class="col-md-3">
                        <label>Email</label>
                         <input type="text" class="form-control"value="{{ $user->email }}" readonly>
                     </div>
                    <div class="col-md-3">
                        <label>Phone #</label>
                        <input type="text" minlength="5" class="form-control" value="{{ $user->phone_no }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label>Role</label><br>
                        <input type="text" class="form-control" value="{{ $user->role->name }}" readonly>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>Address</label><br>
                    <input type="text" class="form-control" value="{{ $user->address }}" readonly>
                </div>
                <a href="{{ url('/admin/user') }}" class="btn btn-primary">Back</a>
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
