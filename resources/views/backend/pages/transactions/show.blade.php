@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.transactions.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.transactions.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Invoice No</label>
                                    <br>
                                    {{ $transactions->invoice_no }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Transaction Type</label>
                                    <br>
                                    {{ $transactions->type }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Delivery Status</label>
                                    <br>
                                    {{ $transactions->delivery_status }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Transaction Featured Image</label>
                                    <br>
                                    @if ($transactions->image != null)
                                    <img src="{{ asset('public/assets/images/blogs/'.$transactions->image) }}" alt="Image" class="img width-100" />
                                    @else 
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $transactions->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="description">Paid Total</label>
                                        <div>
                                            {!! $transactions->paid_total !!}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="description">Due Total</label>
                                        <div>
                                            {!! $transactions->due_total !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="description">Final Total</label>
                                        <div>
                                            {!! $transactions->final_total !!}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="description">Order Quantity</label>
                                    <div>
                                        {!! $transactions->order_quantity !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Shipping Charges</label>
                                    <br>
                                    {{ $transactions->shipping_charges }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="meta_description">Shipping Details</label>
                                    <div>
                                        {!! $transactions->shipping_details !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.blogs.edit', $transactions->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection