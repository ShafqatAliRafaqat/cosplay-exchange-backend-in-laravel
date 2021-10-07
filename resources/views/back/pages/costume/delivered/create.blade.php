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
            <form action="{{ route('member.costume.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label>Costume Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label>Costume Description</label>
                    <textarea rows="4" cols="50" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Measurements</label>
                    <textarea rows="4" cols="50" id="measurement" name="measurement" required></textarea>
                </div>
                <div class="form-group">
                    <label>Condition</label><br>
                    <select class="form-control" style="width: 100%" id="condition" name="condition" required>
                        <option value=""></option>
                        <option value="1">Good</option>
                        <option value="2">Average</option>
                        <option value="3">Bad</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Categories</label><br>
                    <select class="form-control" style="width: 100%" id="cat" name="categories[]" multiple="multiple" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Expected Value</label>
                    <input type="number" step="0.01" min="0.1" class="form-control" name="price"
                           placeholder="Enter Expected Value" required>
                </div>
                <div class="form-group">
                    <label>Costume Pictures</label>
                    <input class="form-control-file" id="fileupload" name="pictures[]" type="file" multiple="multiple"
                           onclick="showPreview()" required/>
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
                <div class="form-check mt-3 mb-3">
                    <input type="checkbox" class="form-check-input" name="damaged" data-toggle="modal"
                           data-target="#deleteModal">
                    <label class="form-check-label">Damaged</label>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
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

        $(document).ready(function () {
            $('#resetSelection').on('click', function (e) {
                var $el = $('#fileupload');
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
    </script>
@endsection
