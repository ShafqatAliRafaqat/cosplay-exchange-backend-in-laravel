@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-map"></i>
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
            <form action="{{ route('admin.region.update',$region->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Country</label><br>
                    <select class="from-control" style="width: 100%;" id="country" name="country">
                        @foreach($countries as $country)
                         <option value="{{ $country->id }}" {{$region->country_id==$country->id?'selected':''}}>{{ $country->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control" value="{{ $region->city }}" name="city">
                </div>
                <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" class="form-control" value="{{ $region->postcode }}" name="postcode">
                </div>
                <div class="form-group">
                    <label>Delivery Fee</label>
                    <input type="number" step="0.01" min="0" class="form-control" value="{{ $region->delivery_fee }}" name="fee">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').select2();
        });
    </script>
@endsection