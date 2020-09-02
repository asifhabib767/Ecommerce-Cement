@extends('backend.layouts.master')

@section('title')
   Product Stock & Price
@endsection

@section('admin-content')
    <div class="container-fluid">
            <h2>Product Stock & Price</h2>
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.stock-price.store',$product_id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Product Quantity <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Product Quantity" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="current_stock">Current Stock <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="current_stock" name="current_stock" value="{{ old('current_stock') }}" placeholder="Enter Current Stock" required=""/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="price">Product Price <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter Product Price" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="offer_enable">Enable Offer<span class="required">*</span></label>
                                    <select class="form-control select2" id="offer_enable" name="offer_enable" id="offer_enable" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            
                        
                        <div class="row" id="offer-div">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="offer_price">Offer Price<span class="optional">(Optional)</span></label>
                                    <input type="text" class="form-control" id="offer_price" name="offer_price" value="{{ old('offer_price') }}" placeholder="Enter Alert Quanitity"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="offer_price_start_date">Offer Price Start Date<span class="optional">(Optional)</span></label>
                                    <input type="date" class="form-control" id="offer_price_start_date" name="offer_price_start_date" value="{{ old('offer_price_start_date') }}" placeholder="Enter Alert Quanitity"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="offer_price_end_date">Offer Price End Date<span class="optional">(Optional)</span></label>
                                    <input type="date" class="form-control" id="offer_price_end_date" name="offer_price_end_date" value="{{ old('offer_price_end_date') }}" placeholder="Enter Alert Quanitity"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group custom-control custom-checkbox mt-4">
                                    <input type="checkbox" class="custom-control-input" value="0" name="is_dhaka" id="customControlValidation1">
                                    &nbsp;
                                    <label class="custom-control-label" for="customControlValidation1">Is Active?</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body">
                                {{-- <input type="hidden" name="submit_type" id="submit_type" > --}}
                                <button type="submit" value="submit" name="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Cancel</a>
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

    $("#enable_offer").change(function(){
        let enable_offer = $(this).val();
        if(enable_offer == 0){
            $("#offer-div").hide();
        }else{
            $("#offer-div").show();
        }
    });
    
</script>
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