@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-theater-masks"></i>
            New
        </div>
        <div class="card-body">
            <form action="{{ route('admin.costume.update',$costume) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Costume Title</label>
                    <input type="text" class="form-control" value="{{ $costume->title }}" readonly>
                </div>
                <div class="form-group">
                    <label>Costume Description</label>
                    <textarea rows="4" cols="50" id="description" readonly>{{ $costume->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Measurements</label>
                    <textarea rows="4" cols="50" id="measurement" readonly>{{ $costume->measurements }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Condition</label>
                        <input type="text" class="form-control" value="{{ $costume->condition==1?'Good':($costume->condition==2?'Average':'Bad') }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="0" {{ $costume->is_approved==0?'selected':'' }}>Un Approved</option>
                            <option value="1" {{ $costume->is_approved==1?'selected':'' }}>Approved</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Value</label><br>
                        <input type="number" step="1" min="1" class="form-control" name="value" value="{{ $costume->price }}" required>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Categories</label><br>
                    <select class="form-control" style="width: 100%" id="cat" multiple="multiple" readonly>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @foreach($costume->categories as $costumeCategory)
                                {{ $costumeCategory->id==$category->id?'Selected':'' }}
                                @endforeach
                            >{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row no-gutters">
                    <div class="col">
                        <label>Pictures</label><br>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="card bg-light shadow">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                    @foreach($costume->pictures as $picture)
                                                    @if($picture->type==0)
                                                        <a href="{{ asset('uploads/'.$picture->img) }}" download>
                                                             <img class="productImage" src="{{ asset('uploads/'.$picture->img) }}" alt="costume">
                                                        </a>
                                                    @endif
                                                    @endforeach
                                            </div>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($costume->damage==1)
                <div class="form-check mt-4 mb-4">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 border border-danger rounded-lg"><h3 class="text-center mt-1 mb-1">!! Goods Damaged !!</h3> </div>
                    </div>
                </div>
                    <div class="row no-gutters">
                        <div class="col">
                            <label> Damaged Area Pictures</label><br>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="card bg-light shadow">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    @foreach($costume->pictures as $picture)
                                                        @if($picture->type==1)
                                                            <a href="{{ asset('uploads/'.$picture->img) }}" download>
                                                                 <img class="productImage" src="{{ asset('uploads/'.$picture->img) }}" alt="costume">
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="float-right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        // CKEDITOR.replace( 'editor' );
        CKEDITOR.replace('description', {
            height: '5em',
        });
        CKEDITOR.replace('measurement', {
            height: '5em',
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#cat').select2({
                disabled:'readonly',
                allowClear: true
            });
        });

    </script>
@endsection
