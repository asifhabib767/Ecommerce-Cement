@extends('frontend.layouts.master')

@section('main-content')
<div class="container">
   <!-- otp form -->
<div class="OtpBox">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="formHeading">
                    <h1>Login with OTP</h1>
                    <p>Please Enter Your Mobile Phone Number</p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="OTpForm">
                            <form class="otpFormdetails" method="POST" action="{{ route('login') }}">
                                <div class="firstname otpname">
                                    <label>Your Name:</label><br>
                                    <input type="text"  name="name" value="" required placeholder="name">
                                   </div>
                                  <div id="otp"></div>
                                 
                                   <button type="submit" class="productBtn otobtn">Submit</button>

                                </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>



@endsection
