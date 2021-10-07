@extends('back.inc.master')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-globe"></i>
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
            <form action="{{ route('admin.country.update',$country->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Country Name</label>
                    <input type="text" class="form-control" value="{{ $country->name }}" name="country">
                </div>
                <div class="form-group">
                    <label>Country Code</label>
                    <input type="text" class="form-control" value="{{ $country->code }}" name="code">
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
    @endsection
