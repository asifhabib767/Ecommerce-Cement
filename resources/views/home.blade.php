@extends('frontend.layouts.master')

@section('main-content')
@php
    $user=Auth::user()->first();
@endphp
<div class="container dashboard-area">
    <div class="row justify-content-center">
            <div class="col-md-4">
                    @include('frontend.layouts.partials.sidebar')
                </div>
        <div class="col-md-8">
            <div class="card register-style">
                <div class="card-header" style="background-color:#2E3192; color:#fff">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-lg-12 col-12">
                            <div class="orderBox">
                                <h2>User Information</h2>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <p>{{ $user->phone_no }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <p>Dhaka</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                       <p>Dhaka</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Total Quantity</label>
                                        <div class="col-md-6">
                                           <p>200 pcs</p>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
