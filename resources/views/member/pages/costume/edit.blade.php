@extends('member.inc.master')
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
            <form action="{{ route('member.costume.update',$costume) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Costume Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $costume->title }}" required>
                </div>
                <div class="form-group">
                    <label>Costume Description</label>
                    <textarea rows="4" cols="50" id="description" name="description" required>{{ $costume->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Measurements</label>
                    <textarea rows="4" cols="50" id="measurement" name="measurement" required>{{ $costume->measurements }}</textarea>
                </div>
                <div class="form-group">
                    <label>Materials</label>
                    <input type="text" class="form-control" name="material" value="{{ $costume->material }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Condition</label><br>
                        <select class="form-control" style="width: 100%" id="condition" name="condition" required>
                            <option value="1"{{ $costume->condition==1?'selected':'' }}>Good</option>
                            <option value="2" {{ $costume->condition==2?'selected':'' }}>Average</option>
                            <option value="3" {{ $costume->condition==3?'selected':'' }}>Bad</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Size</label><br>
                        <select class="form-control" style="width: 100%" id="size" name="size" required>
                            <option value="xs"  {{ $costume->size=='xs'?'selected':'' }}>XS</option>
                            <option value="s"   {{ $costume->size=='s'?'selected':'' }}>S</option>
                            <option value="m"   {{ $costume->size=='m'?'selected':'' }}>M</option>
                            <option value="l"   {{ $costume->size=='l'?'selected':'' }}>L</option>
                            <option value="xl"  {{ $costume->size=='xl'?'selected':'' }}>XL</option>
                            <option value="xxl" {{ $costume->size=='xxl'?'selected':'' }}>XXL</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Categories</label><br>
                    <select class="form-control" style="width: 100%" id="cat" name="categories[]" multiple="multiple" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                            @foreach($costume->categories as $costumeCategory)
                                {{ $costumeCategory->id==$category->id?'Selected':'' }}
                                @endforeach
                            >{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Expected Value</label>
                    <input type="number" step="1" min="1" class="form-control" name="price" value="{{ $costume->price }}" {{ $costume->is_approved==0?'required':'readonly' }}>
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
                <div class="form-group mt-3">
                    <label>New Pictures <small>(old will be removed)</small></label>
                    <input class="form-control-file" id="fileupload" name="pictures[]" type="file" multiple="multiple"
                           onclick="showPreview()" />
                </div>

                <div class="row no-gutters" style="display: none" id="img_preview">
                    <div class="col">
                        <label>Files</label><br>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="card bg-light shadow">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <a href="#" download>
                                                    <div id="dvPreview"></div>
                                                </a>
                                            </div>
                                            <div class="float-right">
                                                <button id="resetSelection" class="fas fa-times" type="button"></button>
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
                    <div class="form-group mt-3 mb-5">
                        <label>New Damaged Area Pictures <small>(old will be removed)</small></label><br>
                        <input class="form-control-file" id="fileupload2" name="damagedPictures[]" type="file" multiple="multiple" onclick="showPreview2()" />
                    </div>
                    <div class="row no-gutters" style="display: none" id="img_preview2">
                        <div class="col">
                            <label>Files</label><br>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="card bg-light shadow">
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <a href="#" download>
                                                        <div id="dvPreview2"></div>
                                                    </a>
                                                </div>
                                                <div class="float-right">
                                                    <button id="resetSelection2" class="fas fa-times" type="button"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @else
                    <div class="form-check mt-3 mb-3">
                        <input type="checkbox" class="form-check-input" name="damaged" data-toggle="modal"
                               data-target="#deleteModal">
                        <label class="form-check-label">Damaged</label>
                    </div>
                @endif
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>


                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Damaged Area Pictures</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Damaged Area Pictures</label>
                                        <input class="form-control-file" name="damagedPictures[]" type="file" id="damageFileUpload" multiple="multiple"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="resetDamageSelection" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="close()">OKay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script>
        function showPreview() {
            var x = document.getElementById("img_preview");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function showPreview2() {
            var x = document.getElementById("img_preview2");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        $(document).ready(function () {
            $('#resetSelection').on('click', function (e) {
                var $el = $('#fileupload');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.innerHTML = '';
                $el.unwrap();
            });
        });
        $(document).ready(function () {
            $('#resetSelection2').on('click', function (e) {
                var $el = $('#fileupload2');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.innerHTML = '';
                $el.unwrap();
            });

        });

        $(document).ready(function () {
            $('#resetDamageSelection').on('click', function (e) {
                var $el = $('#damageFileUpload');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.innerHTML = '';
                $el.unwrap();
            });
        });

    </script>
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
                placeholder: 'Select Categories',
                allowClear: true
            });
        });
        $(document).ready(function () {
            $('#condition').select2({
                placeholder: 'Select Condition',
                allowClear: true
            });
        });
        $(document).ready(function () {
            $('#size').select2({
                placeholder: 'Select Size',
                allowClear: true
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        $(function () {
            $("#fileupload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#dvPreview");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });

        $(function () {
            $("#fileupload2").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#dvPreview2");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
    </script>
@endsection
