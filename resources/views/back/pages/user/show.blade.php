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
                <div class="row">
                     <div class="col-md-3">
                         <label>Name</label>
                         <input type="text" class="form-control" value="{{ $user->profile->name }}" readonly>
                     </div>
                    <div class="col-md-3">
                        <label>Email</label>
                         <input type="text" class="form-control"value="{{ $user->email }}" readonly>
                     </div>
                    <div class="col-md-3">
                        <label>Phone #</label>
                        <input type="text" minlength="5" class="form-control" value="{{ $user->profile->phone_no }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label>Role</label><br>
                        <input type="text" class="form-control" value="{{ $user->role->name }}" readonly>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>Address</label><br>
                    <input type="text" class="form-control" value="{{ $user->profile->address }}" readonly>
                </div>
                <a href="{{ url('/admin/user') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    @endsection
