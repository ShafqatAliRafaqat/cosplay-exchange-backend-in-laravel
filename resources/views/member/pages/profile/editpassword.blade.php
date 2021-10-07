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
            <form action="{{ route('member.profile.updatepass',Auth::id()) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label>New Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="New Password">
                    </div>
                    <div class="col-md-6">
                        <label>Confirm New Password</label>
                        <input id="password-confirm" type="password"name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection

