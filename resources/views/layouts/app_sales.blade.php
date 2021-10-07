<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cosplay Exchange</title>
        <link rel="shortcut icon" href="{{ asset('salesPage/fav.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('salesPage/css/app.css') }}">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-sm-2">
                    <div class="sidebar">
                        <img src="{{ asset('salesPage/img/logo.jpg') }}" alt="">
                    </div>
                </div>


                <div class="col-12 col-sm-10 content">
                    <h1 class="text-center mt-5">Sell An Item</h1>

                    <div class="container">
                        <form action="" method="POST">

                            <div class="upload-photos-cont my-5 text-center">
                                <input type="file" name='upload-photos' required>

                                <img src="{{ asset('salesPage/img/upload.png') }}" alt="">
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
                                    <option>Cosplay</option>
                                    <option>Accessory</option>
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
                                        <img class='payment-check check' src="{{ asset('salesPage/img/check.png') }}" alt="">
                                        <span class="mx-2">Electronic USD Payment</span>
                                    </div>

                                    <div class="d-flex align-items-center payment-method" data-payment='2'>
                                        <img class='payment-check check' src="{{ asset('salesPage/img/check.png') }}" alt="">
                                        <span class="mx-2">Cosplay Coins</span>
                                        <img src="{{ asset('salesPage/img/coins.png') }}" alt="">
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


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="{{ asset('salesPage/js/app.js') }}"></script>
    </body>
</html>
