@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.products.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.products.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Product Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Product Name" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="unit_id">Unit<span class="required">*</span></label>
                                    <select class="form-control select2" id="unit_id" name="unit_id" required>
                                        <option value="">Please Select</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->actual_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                    <div class="form-group has-success">
                                        <label class="control-label" for="category_id">Catgory<span class="required">*</span></label>
                                        <select class="form-control select2" id="category_id" name="category_id" required>
                                            <option value="">Please Select</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="brand_id">Brand<span class="required">*</span></label>
                                    <select class="form-control select2" id="brand_id" name="brand_id" required>
                                        <option value="">Please Select</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="sub_category_id">Sub Category<span class="required">*</span></label>
                                    <select class="form-control select2" id="sub_category_id" name="sub_category_id" required>
                                        <option value="">Please Select</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="tax_type">Tax Type<span class="required">*</span></label>
                                    <select class="form-control select2" id="tax_type" name="tax_type" required>
                                        <option value="inclusive">Inclusive</option>
                                        <option value="exclusive">Exclusive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group custom-control custom-checkbox mt-4">
                                    <input type="checkbox" class="custom-control-input" value="0" name="enable_stock" id="customControlValidation1">
                                    &nbsp;
                                    <label class="custom-control-label" for="customControlValidation1">Manage Stock</label>
                                </div>
                            </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="alert_quantity">Alert Quantity<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="alert_quantity" name="alert_quantity" value="{{ old('alert_quantity') }}" placeholder="Enter Alert Quanitity" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="over_quantity">Over Quantity<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="over_quantity" name="over_quantity" value="{{ old('over_quantity') }}" placeholder="Enter Over Quantity" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Product Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image" value="{{ old('image') }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image_name">Featured Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="image_name" name="image_name[]" value="{{ old('image_name') }}" multiple/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="sku">SKU</label>
                                    <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}" placeholder="Keep blank to auto generate"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="barcode_type">Barcode Type <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="barcode_type" name="barcode_type" required>
                                        @foreach($barcode_enum as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="expiry_period">Expiry Period<span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="expiry_period" name="expiry_period" value="{{ old('expiry_period') }}" placeholder="Enter Expiry Period"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="expiry_period_type">Expiry Period Type <span class="optional">(Optional)</span></label>
                                    <select class="form-control custom-select" id="expiry_period_type" name="expiry_period_type" required>
                                        <option value="days" {{ old('expiry_period_type') === 'days' ? 'selected' : null }}>Days</option>
                                        <option value="month" {{ old('expiry_period_type') === 'month' ? 'selected' : null }}>Months</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="weight">Weight<span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight') }}" placeholder="Enter Product Weight"/>
                                </div>
                            </div>

                            
                        </div>
                        <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="product_custom_field1">Product Custom Feild 1<span class="optional">(optional)</span></label>
                                            <input type="text" class="form-control" id="product_custom_field1" name="product_custom_field1" value="{{ old('product_custom_field1') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="product_custom_field2">Product Custom Field 2<span class="optional">(optional)</span></label>
                                            <input type="text" class="form-control" id="product_custom_field2" name="product_custom_field2" value="{{ old('product_custom_field2') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="product_custom_field3">Product Custom Field 3<span class="optional">(optional)</span></label>
                                            <input type="text" class="form-control" id="product_custom_field3" name="product_custom_field3" value="{{ old('product_custom_field3') }}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="product_custom_field4">Product Custom Field 4<span class="optional">(optional)</span></label>
                                            <input type="text" class="form-control" id="product_custom_field4" name="product_custom_field4" value="{{ old('product_custom_field4') }}"/>
                                        </div>
                                    </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="product_description">Product Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="product_description" name="product_description" value="{{ old('product_description') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                        <div class="form-group has-success">
                                            <label class="control-label" for="status">Status <span class="required">*</span></label>
                                            <select class="form-control custom-select" id="status" name="status" required>
                                                <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Active</option>
                                                <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        {{-- <input type="hidden" name="submit_type" id="submit_type" > --}}
                                        <button type="submit" value="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="submit" value="submit_add_stock_price" name="submit_add_stock_price" class="btn btn-info"> <i class="fa fa-check"></i> Save & Add Price and Stock</button>
                                        <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
        function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for (var i = 0; i < colCount; i++) {
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
            }
                    }

function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    if(i === 0){
        alert('Minimum Row!! You can not delete this');
    }else{
        var table =document.getElementById('dataTable').deleteRow(i);
    }
    
}

    </script>
@endsection