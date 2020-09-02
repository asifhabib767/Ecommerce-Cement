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
                <div class="col-lg-12 col-12">
                    <div class="ProductDetailsInfo">
                      
                    </div>
                </div>
            </div>
            
            <div class="row product-details-body">
                <div class="col-lg-5 offset-lg-1 col-12">
                    <div class="ProductSingleboxDetails productImg">
                            <img src="{{ asset('public/assets/frontend/img/p2.png') }}">
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt-2">
                      <!-- <div class="card card-body p-4"> -->
                  
                      <div class="ProductDetailsText">
                            <h2>{{ $product->sku }}</h2>
                            <h3>{{  $product->name }}</h3>
                            <p>{{ $product->product_description }}</p>
                
                          <div class="productDetailsForm">
                            <h4> Delivery Thana:</h4>
                            <form class="productDetailsinput">
                              <div class="form-group productdetailsinfo ">
                                  <input type="text" class="form-control productDetailsinput"  placeholder="Write your thana"> 
                              </div> 
                            </form> 
                          </div>
                      
                            <h4>Quantity:</h4><span>{{ $product_inventories->quantity }}</span><br>
                            <h4> Price per Bag:</h4><span>{{ $product_inventories->price }}</span><br>
                            <h4 class="productprice">Total Price:</h4><span>{{ $product_inventories->quantity * $product_inventories->price }}</span><br>
                            <a href="{{ route('order-details') }}"><button class="productBtn process">Process order</button></a>
                            <a href="{{ route('order-details') }}"><button class="productBtn product">Add Another Product</button></a>
                      </div>
                </div>
              </div>

                  <div class="container product-details">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Feedbacks</a>
                                </li>
                              </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p>
                                {{ $product->product_description }}
                                </p>

                            </div>
                            
                             <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            
                              @foreach ($product_reviews as $product_review)
                              <div class="card" >
                                <div class="card-body">
                                  <h5 class="card-title">
                                  <!-- {{ $product_review->review }} -->
                                  @php for ($i=$product_review->review; $i>0; $i--){ @endphp
                                  <i class="fas fa-star text-warning"></i>
                                  @php } @endphp
                                  </h5>
                                  <p class="card-text">{{ $product_review->message }}</p>
                                </div>
                              </div>
                              @endforeach
                            
                          </div>
                          </div>
                  </div>
              
        </div>
    </div>
    <!-- image box end -->
 @endsection