@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<main class="main">

  <!-- PRoduct image box strat -->
  
  <div class="ProductBox">
        <div class="container">
            <div class="row">

            @foreach ($products as $product)
                <!-- PRoduct Single Box One-->
                <div class="ProductSinglebox">
                    <div class="ProductSingleboxDetails one">
                      <a href="{{ route('products.show', $product->slug) }}">
                        <img src= "{{asset('public/assets/images/products').'/'.$product->image}}" alt="product_image">
                      </a>
                    </div>
                      <h2>{{ $product->sku }}</h2>
                      <h3>{{  $product->name }}</h3>
                      <a href="{{ route('order-details') }}"><button class="productBtn">Buy Now<i class="fas fa-shopping-bag"></i></button></a>
                </div>
              @endforeach
            </div>
        </div>
  </div>
      <!-- image box end -->

@endsection()