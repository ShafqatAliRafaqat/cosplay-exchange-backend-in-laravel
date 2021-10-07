@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-clipboard-list"></i>
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
            <form action="{{ route('admin.coupon.update',$coupon->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" name="code" value="{{$coupon->code}}">
                </div>
                <div class="form-group">
                    <label>Type</label><br>
                    <select class="from-control" style="width: 100%;" id="type" name="type" type="hidden">
                        <option value="1" {{ $coupon->type==1?'selected':'' }}>Fix Price</option>
                        <option value="2" {{ $coupon->type==2?'selected':'' }}>Percentage</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input type="number" step="0.01" min="1" class="form-control" value="{{ $coupon->type==1?$coupon->value:$coupon->value*100 }}" name="value">
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
            $('#type').select2();
        });
    </script>
@endsection
