@extends('member.inc.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">

        <div class="col-12 col-sm-2">
            <div class="sidebar">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
            </div>
        </div>


        <div class="col-12 col-sm-10 content">
            <h1 class="text-center mt-5">Sell An Item</h1>

            <div class="container">
                <form action="{{ route('member.costume.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="upload-photos-cont my-5 text-center">
                        <input type="file" name='upload-photos' required>

                        <img src="{{ asset('img/upload.png') }}" alt="">
                        <div>Add Up to 10 photos</div>
                    </div>


                    <div class="form-group mb-4">
                        <label for="title" class="d-flex justify-content-between align-items-center">
                            <span>Title</span>
                            <span>0/40</span>
                        </label>

                        <input type="text" class='form-control' name="title" id="title" placeholder="What arae you selling?" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="description" class="d-flex justify-content-between align-items-center">
                            <span>Description</span>
                            <span>0/1000</span>
                        </label>
                        
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describe your item" required></textarea>
                    </div>
                    

                    <div class="form-group mb-4">
                        <label>#Tags (optional)</label>

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <input type="text" class='form-control' name="hashtag1" id="hashtag1" placeholder="Add a hashtag">
                            </div>
                            
                            <div class="col-12 col-sm-4">
                                <input type="text" class='form-control' name="hashtag2" id="hashtag2" placeholder="Add a hashtag">
                            </div>

                            <div class="col-12 col-sm-4">
                                <input type="text" class='form-control' name="hashtag3" id="hashtag3" placeholder="Add a hashtag">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group mb-4">
                        <label for="category">Category</label>
                
                        <select class="form-control" name="category" id="category" required>
                            <option disabled selected>Please select a category</option>
                            <option>category1</option>
                            <option>category2</option>
                            <option>category3</option>
                        </select>
                    </div>
                    

                    <div class="form-group mb-4">
                        <label for="measurements">Measurements</label>
                        <input type="text" class='form-control' name="measurements" id="measurements" placeholder="Measurements" required>
                    </div>


                    <div class="form-group mb-4">
                        <label for="size">Size</label>
                
                        <select class="form-control" name="size" id="size" required>
                            <option disabled selected>Please select a size</option>
                            <option>XXS</option>
                            <option>XS</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                    </div>


                    <div class="form-group mb-4">
                        <label for="material">Material</label>
                        <input type="text" class='form-control' name="material" id="material" placeholder="Material" required>
                    </div>


                    <div class="form-group mb-4">
                        <label>Condition <span>(Select One)</span></label>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="condition text-center ml-0" data-condition="1">
                                <div>New</div>
                                <div>New with tags(NWT). Unopened packing. Unused.</div>
                            </div>

                            <div class="condition text-center" data-condition="2">
                                <div>Like New</div>
                                <div>New without tags(NWOT). No signs of wear. Unused.</div>
                            </div>
                            
                            <div class="condition text-center" data-condition="3">
                                <div>Good</div>
                                <div>Gently used. One/few minor flaws. Functional</div>
                            </div>

                            <div class="condition text-center" data-condition="4">
                                <div>Fair</div>
                                <div>Used, fuctional, multiple flaws / defects</div>
                            </div>

                            <div class="condition text-center mr-0" data-condition="5">
                                <div>Poor</div>
                                <div>Major flaws, may be damaged, for parts.</div>
                            </div>

                            <input type="hidden" name="condition" required>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="shipping">Estimated Shipping Cost</label>
                        <input type="text" class='form-control' name="shipping" id="shipping" placeholder="Estimated Shipping Cost" required>
                    
                        <div class="note">
                            Please Note: Cosplay Exchange offers Free Shipping on all items.<br>
                            Your estimated shipping cost is added to your listing price automatically. So you are reimbursed for the shipping cost when you receive funds from your sale.
                        </div>
                    </div>

                    <h2>Pricing</h2>

                    <div class="form-group mb-4">
                        <label for="sale-price">Sale Price (Round to the nearest dollarm do not use cents)</label>
                        <input type="text" class='form-control' name="sale-price" id="sale-price" placeholder="e.g. 60" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="shipping-reimbursment">Shipping Reimbursment (Round to the nearest dollarm do not use cents)</label>
                        <input type="text" class='form-control' name="shipping-reimbursment" id="shipping-reimbursment" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="listing-for">Listing For</label>
                        <input type="text" class='form-control' name="listing-for" id="listing-for" required>
                    </div>


                    <div class="form-group mb-4">
                        <h3>I will accept: (Chose one or both)</h3>

                        <div class="pl-5">
                            <div class="d-flex align-items-center payment-method" data-payment='1'>
                                <img class='payment-check check' src="{{ asset('img/check.png') }}" alt="">
                                <span class="mx-2">Electronic USD Payment</span>
                            </div>
                            
                            <div class="d-flex align-items-center payment-method" data-payment='2'>
                                <img class='payment-check check' src="{{ asset('img/check.png') }}" alt="">
                                <span class="mx-2">Cosplay Coins</span>
                                <img src="{{ asset('img/coins.png') }}" alt="">
                            </div>

                            <input type="hidden" name='payment-method1' id='payment-method1'>
                            <input type="hidden" name='payment-method2' id='payment-method2'>
                        </div>
                    </div>


                    <button type='submit' class='btn btn-primary d-block mt-5 mx-auto'>Submit</button>

                    <div class="mt-5 text-center">You will be notified once approved</div>

                </form>

            </div>


        </div>

    </div>
</div>




    {{-- <div class="card mb-3">
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
                    <label>Materials</label>
                    <input type="text" class="form-control" name="material" placeholder="Costume Materials (optional)">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Condition</label><br>
                        <select class="form-control" style="width: 100%" id="condition" name="condition" required>
                            <option value=""></option>
                            <option value="1">Good</option>
                            <option value="2">Average</option>
                            <option value="3">Bad</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Size</label><br>
                        <select class="form-control" style="width: 100%" id="size" name="size" required>
                            <option value=""></option>
                            <option value="xs">XS</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
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
    </div> --}}
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

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
    </script>
@endsection
