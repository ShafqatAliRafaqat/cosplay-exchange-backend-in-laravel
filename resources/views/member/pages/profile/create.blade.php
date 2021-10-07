@extends('member.inc.master')
@section('styles')

@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-align-justify"></i>
            Create
        </div>
        <div class="card-body">

            <form action="{{ route('member.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
               <div class="row">
                   <div class="col-md-3">
                       <label>Username</label>
                       <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required>
                   </div>
                   <div class="col-md-3">
                       <label>Legal Name</label>
                       <input type="text" class="form-control" name="name" placeholder="Enter Your Legal Name" required>
                   </div>
                   <div class="col-md-3">
                       <label>Phone#</label>
                       <input type="text" class="form-control"  name="phone_no" placeholder="Enter Phone#" required>
                   </div>
                   <div class="col-md-3">
                       <label>Email</label>
                       <input type="email" class="form-control"  name="email" value="{{ Auth::user()->email }}" readonly>
                   </div>
               </div>
                <div class="form-group mt-3">
                    <label>Address</label>
                    <input type="text" class="form-control"  name="address" placeholder="Enter Complete Address" required>
                </div>
                <div class="form-group mt-3">
                    <label>Bio</label>
                    <textarea class="form-control" id="bio" name="bio" ></textarea>
                </div>
                <div class="form-group">
                    <label>Profile Picture</label>
                    <input type="file" class="form-control-file"  name="image" accept="image/jpg, image/jpeg, image/png" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('bio', {
            height: '5em',
        });
    </script>
@endsection


