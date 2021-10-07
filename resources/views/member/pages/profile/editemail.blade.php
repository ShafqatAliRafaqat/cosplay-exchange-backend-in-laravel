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
            <form action="{{ route('member.profile.updateemail',Auth::id()) }}" method="POST">
                @csrf
                @method('PUT')
               <div class="row">
                   <div class="col-md-6">
                       <label>Current Email</label>
                       <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
                   </div>
                   <div class="col-md-6">
                       <label>New Email</label>
                       <input type="email" class="form-control"  name="email" placeholder="Enter New Email" required>
                   </div>
               </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection

