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
                <div class="card-header" style="background-color:#2E3192; color:#fff">My Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-lg-12 col-12">
                            <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Order No</th>
                                        <th scope="col">Paid Product</th>
                                        <th scope="col">Delivery Status</th>
                                        <th scope="col">Payment Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>#45345</td>
                                        <td>PCC</td>
                                        <td><button disabled="disabled" class="btn btn-danger btn-sm">not delivered</button></td>
                                        <td><button disabled="disabled" class="btn btn-danger btn-sm">not paid</button></td>
                                      </tr>
                                      <tr>
                                            <th scope="row">2</th>
                                            <td>#45345</td>
                                            <td>PCC</td>
                                            <td><button disabled="disabled" class="btn btn-success btn-sm">Delivered</button></td>
                                            <td><button disabled="disabled" class="btn btn-success btn-sm">Paid</button></td>
                                    </tr>
                                    <tr>
                                            <th scope="row">3</th>
                                            <td>#45345</td>
                                            <td>PCC</td>
                                            <td><button disabled="disabled" class="btn btn-danger btn-sm">not delivered</button></td>
                                            <td><button disabled="disabled" class="btn btn-danger btn-sm">not paid</button></td>
                                          </tr>
                                    </tbody>
                                  </table>
                        </div>
                       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
