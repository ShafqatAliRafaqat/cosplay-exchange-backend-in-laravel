@extends('back.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-project-diagram"></i>
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
                <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea rows="4" cols="50" id="editor"  name="description" >{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Categories</label><br>
                            <select class="form-control" style="width: 100%" id="cat"  name="categories[]" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    @foreach($product->categories as $productCategory)
                                        {{ $productCategory->id==$category->id?'Selected':'' }}
                                            @endforeach
                                    >{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <label>Types</label><br>
                        <select class="form-control" style="width: 100%" id="type"  name="types[]" multiple="multiple">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                @foreach($product->types as $productType)
                                    {{ $productType->id==$type->id?'Selected':'' }}
                                        @endforeach
                                >{{ $type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Variations</label><br>
                        <select class="form-control" style="width: 100%" id="variation"  name="variations[]" multiple="multiple">
                            @foreach($variations as $variation)
                                <option value="{{ $variation->id }}"
                                @foreach($product->variations as $productVariation)
                                    {{ $productVariation->id==$variation->id?'Selected':'' }}
                                        @endforeach
                                >{{ $variation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Variation Mandatory</label><br>
                        <input class="m-1" type="radio" name="mandatory" value="0" {{ $product->variation_mandatory==0?'checked':'' }}>No
                        <input class="m-1" type="radio" name="mandatory" value="1" {{ $product->variation_mandatory==1?'checked':'' }}>Yes
                    </div>
                        <div class="form-group">
                            <label>Unit Price</label>
                            <input type="number" step="0.01" min="0.1" class="form-control" value="{{ $product->unit_price }}" name="price">
                        </div>
                    <div class="row no-gutters">
                        <div class="col">
                            @if ($product->thumbnail != null)
                                <label>Files</label><br>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="card bg-light shadow">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <a href="{{ asset('uploads/'.$product->thumbnail) }}" download>
                                                            <img class="productImage" src="{{ asset('uploads/'.$product->thumbnail) }}" alt="Forest">

                                                        </a>
                                                    </div>
                                                    <div class="float-right">
                                                        <a href="#">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" class="form-control-file"  name="image">
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <select class="form-control" style="width: 100%" name="status" id="status">
                                @if($product->is_active==0)
                                    <option value="0" selected>In-Active</option>
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">In-Active</option>
                                    <option value="1" selected>Active</option>
                                @endif
                            </select>
                        </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
        $(document).ready(function() {
            $('#cat').select2();
        });
        $(document).ready(function() {
            $('#type').select2();
        });
        $(document).ready(function() {
            $('#variation').select2();
        });
        $(document).ready(function() {
            $('#status').select2();
        });
    </script>
    @endsection
