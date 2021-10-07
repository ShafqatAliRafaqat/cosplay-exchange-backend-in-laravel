@extends('auth.inc.master')
<style>
  input.invalid1{
  /*background-color: #d099de;*/
  background-color: #bcc0c2;
}
textarea.invalid1 {
  background-color: #bcc0c2;
}
 small{
  font-size: 5px;
  color: white;
 }
.required_span
{
    color: red;
}
    /* Hide all steps by default: */
.tab {
    display: none;
}
    /* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.register{
    color: white;
}
</style>
@section('content')
    <div class="o-hidden border-0  my-5 register">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <form id="regForm" class="user" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf
                    <div class="p-6 tab">
                        <div class="text-center">
                            <h1 class="h4 text-white-900 mb-4">Create an Account!</h1>
                        </div>
                          @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                           @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                           @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                           @error('bio')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                           @error('phone_no')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror
                           @error('photo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                          @enderror

                             <div class="form-group">
                                <label>Create your Username</label><span class="required_span">*</span>
                                <p><input id="username" type="username" name="username" class="required form-control @error('username') is-invalid @enderror" required autocomplete="username" placeholder="User Name"  oninput="this.className = 'form-control'"></p>

                            </div>
                            <div class="form-group">
                                <label>Email</label><span class="required_span">*</span>
                                <br>
                                <small >(to alert you of cosplay requests)</small>
                                <p><input id="email" type="email" name="email" class="required form-control  @error('email') is-invalid @enderror" required autocomplete="email" placeholder="Email Address"  oninput="this.className = 'form-control'"></p>
                            </div>
                            <div class="form-group">
                                    <label>Password</label><span class="required_span">*</span>
                                    <p><input id="password" type="password" class="required form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"  oninput="this.className = 'form-control'"></p>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label><span class="required_span">*</span>
                                    <p><input id="password-confirm" type="password"name="password_confirmation" required autocomplete="new-password" class="required form-control" placeholder="Repeat Password"  oninput="this.className = 'form-control'"></p>
                                </div>
                        <hr>
                        <div class="text-center">
                            <a  style="color: #f08fff;" href="{{ route('login') }}">Already have an account?</a>
                        </div>
                        <br>
                    </div>
                    <div class="p-6 tab">
                        <div class="form-group">
                          <label class="h4 text-white-900">Bio<span class="required_span">*</span></label><br>
                          <p style="text-align: justify;text-justify: inter-word;"><small>Inspire members to follow your posts on our platform tell them what you're about! Dont worry you can always change your bio and photo again later.</small></p>
                            <p><textarea class="required form-control" name="bio" required required="required"
                             oninput="this.className = 'form-control'"></textarea></p>
                        </div>
                            <div class="form-group">
                                <label>Phone No</label>
                                <p><input id="phone_no" type="phone_no" name="phone_no" class="form-control  @error('phone_no') is-invalid @enderror" autocomplete="phone_no" placeholder="Phone No"  oninput="this.className = 'form-control'"></p>
                            </div>
                        <div class="form-group">
                           <label>Profile Photo</label><span class="required_span">*</span>
                          <p><input class="required" type="file" name="photo" required="required" oninput="this.className = ''"></p>

                         </div>
                    </div>
                    <div class="p-6 tab">
                      <div class="text-center">
                              <h1 class="h4 text-white-900 mb-4">Shipping Information</h1>
                            <p style=" text-align: justify;text-justify: inter-word;" class="text-100">Once you request to trade or purchase an item you will need to give the address for the member to ship the item. This information is only shown to the seller after you purchase an item.</p>
                            <h5 class="h5 text-white-900 md-4">YOU CAN ADD THIS NOW OR LATER</h5>
                        </div>
                        <div style="text-align: center;">
                            <button type="button" class="btn" style="height: 50px; background-color: black; color: white;" onclick="nextPrev(1)" >skip for now</button>
                        </div>
                        <br>
                        <div class="form-group">
                          <label>Ship to (Your Name)</label>
                          <p><input class="form-control" id="not_required" name="ship_receiver_name"></p>
                          <label>Shipping to Address</label>
                            <p><input class="form-control" id="not_required" name="street_address" placeholder="Street Address"></p>
                            <p><input class="form-control" id="not_required" name="city" placeholder="City"></p>
                            <p><input class="form-control" id="not_required" name="zip" placeholder="Zip"></p>
                         </div>
                        {{--  <input  type="submit" class="btn btn-primary btn-user btn-block cosplay" value="Register"/>--}}
                    </div>

                    <div style="overflow:auto;">
                      <div style="float:right;">
                        <button type="button" class="btn" style="background-color: #b615cf; color: white;" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn" style="background-color: #b615cf; color: white;" id="nextBtn" onclick="nextPrev(1)">Next</button>
                      </div>
                    </div>

                                        <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid1:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
 // alert(currentTab + " before  " + x.length );
  if (currentTab < x.length-1) {
  x[currentTab].style.display = "none";
  }
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
    // :
  if (currentTab == x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return true;
  }else{
  // Otherwise, display the correct tab:
  showTab(currentTab);
  }
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");

 // y = x[currentTab].getElementsByTagName("input");
  y = x[currentTab].getElementsByClassName("required");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {


      // add an "invalid1" class to the field:
      y[i].className += " invalid1";

      // and set the current valid status to false:

      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
    </script>
@endsection
