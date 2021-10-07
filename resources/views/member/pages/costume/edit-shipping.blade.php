@extends('member.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-theater-masks"></i>
            Update Shipping
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('member.shipping.update',$shipping) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label> Tracking Number</label>
                        <input type="text" class="form-control" name="tracking_number" value="{{ $shipping->tracking_number }}" required>
                    </div>
                    <div class="form-group">
                        <label> Tracking Link</label>
                        <input type="text" class="form-control" name="tracking_link" value="{{ $shipping->tracking_link }}" required>
                    </div>
                    <div class="form-group">
                        <label> Postal Service</label>
                        <input type="text" class="form-control" name="postal_service" value="{{ $shipping->postal_service }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Add Shipping</button>
                </div>
            </form>
        </div>
    </div>



@endsection
@section('scripts')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('address', {
            height: '10em',
        });

    </script>

@endsection
