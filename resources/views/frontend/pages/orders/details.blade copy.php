@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<main class="main">

 <!-- PRoduct image box strat -->
  
 <div class="OrderDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="Ordertable">
                        <h2>Cart Table</h2>
                        <table class="table table-bordered tablecolor">
                            <thead>
                              <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Subtotal</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>PCC<br>
                                    <div class="dropdown">
                                        <p>Select Location:</p>
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Select Option
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                          <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                          <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                         
                                        </div>
                                      </div>
                                </td>
    
                                <td>100</td>
                                <td>400</td>
                                <td>40000</td>
                              </tr>
                              <tr>
                        
                                <td>OPC
                                    <br>
                                    <div class="dropdown">
                                        <p>Select Location:</p>
                                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Select Option
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                            <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                            <a class="dropdown-item" href="#">Savar,Dhaka</a>
                                        </div>
                                      </div>
                                </td>
                                <td>200</td>
                                <td>450</td>
                                <td>90000</td>
                              </tr>
                              <tr>
                              
                                <td>Total</td>
                                <td>300</td>
                                <td>-</td>
                                <td>130000</td>
                              </tr>
                            </tbody>
                          </table>
                       
        
                        </div>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="orderBox">
                            <h2>Payment Method</h2>
                            {{-- <div id="order"></div> --}}
                            <div class="dropdown">
                                <p>Select a Payment Method:</p>
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Select Option
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Direct Bank Transfer</a>
                                  <a class="dropdown-item" href="#">Bkash Payment</a>
                                  <a class="dropdown-item" href="#">Card/Internet Banking</a>
                                </div>
                              </div>
                            </div>
                    </div>
    
                </div>
                <!--  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="PaymentInfo">
                            <h2>Direct Bank Transfer</h2>
                            <div class="PaymentInfoDetails">
    
                             
                                 <p>Bank Account Name:</p>
                                 <p>Bank Name:</p>
                                 <p>Bank Branch:</p>
                                 
                             
                            </div>
                            <h3>Bank Register No:</h3>
                            <button class="productBtn payment">Confirm</button>
                           
                            </div>
                            </div>
                            </div>
                            <!-- form end -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="PaymentInfo two">
                                        <h2>Bkash Info</h2>
                                        <div class="PaymentInfoDetails">
                
                                      
                    
                                             <p>Bkash Number:</p>
                                             <p>Bkash Number:</p>
                                             
                                             
                                        
                                        </div>
                        
                                        <button class="productBtn payment">Pay Now</button>
                                       
                                        </div>
                                        </div>
                                        </div>
                                        <!-- end -->
                           
            </div>
        </div>
      <!-- image box end -->
    
      @endsection