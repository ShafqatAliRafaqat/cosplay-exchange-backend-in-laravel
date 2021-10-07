@extends('member.inc.master')
@section('styles')

@endsection
@section('content')
    <div class="card mb-1">
        <div class="card-header">
            <i class="fas fa-align-justify"></i>
            Create
        </div>
        <div class="card-body">
            <form action="{{ route('member.profile.update',$profile) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="row">
                   <div class="col-md-4">
                       <label>Username</label>
                       <input type="text" class="form-control" name="username" readonly value="{{ $profile->username }}">
                   </div>
                   <div class="col-md-4">
                       <label>Name</label>
                       <input type="text" class="form-control" name="name" value="{{ $profile->name }}" required>
                   </div>
                   <div class="col-md-4">
                       <label>Phone#</label>
                       <input type="text" class="form-control"  name="phone_no" value="{{ $profile->phone_no }}" required>
                   </div>
                   <div class="col-md-4">
                       <label>Email</label>
                       <input type="email" class="form-control"  value="{{ Auth::user()->email }}" readonly>
                   </div>
               </div>
                <div class="form-group mt-3">
                    <label>Address</label>
                    <input type="text" class="form-control"  name="address" value="{{ $profile->address }}" required>
                </div>
                <div class="form-group mt-3">
                    <label>Bio</label>
                    <textarea class="form-control" id="bio" name="bio" >{!! $profile->bio !!}</textarea>
                </div>
                <div class="row no-gutters">
                    <div class="col">
                        <label>Current Profile Picture</label><br>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="card bg-light shadow">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <a href="{{ asset('uploads/'.$profile->img) }}" download>
                                                    <img class="productImage" style="width: 50%" src="{{ asset('uploads/'.$profile->img) }}" alt="Profile Picture">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>New Profile Picture</label>
                    <input type="file" class="form-control-file"  name="image" accept="image/jpg, image/jpeg, image/png">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
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


