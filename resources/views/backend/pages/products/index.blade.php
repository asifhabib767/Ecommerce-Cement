@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.products.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.products.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.pages.products.partials.top-show')
        @include('backend.layouts.partials.messages')
        <div class="table-responsive product-table">
            <table class="table table-striped table-bordered display ajax_view" id="products_table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Vendor Name</th>
                        <th>Catgory Name</th>
                        <th>Product Image</th>
                        <th>Status</th>
                        <th width="100">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    const ajaxURL = "<?php echo Route::is('admin.products.trashed' ? 'products/trashed/view' : 'products') ?>";
    $('table#products_table').DataTable({
        dom: 'Blfrtip',
        language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
        processing: true,
        serverSide: true,
        ajax: {url: ajaxURL},
        aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
        buttons: ['excel', 'pdf', 'print'],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'product', name: 'product'},
            {data: 'vendor', name: 'vendor'},
            {data: 'category', name: 'category'},
            {data: 'image', name: 'image'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });
    </script>
@endsection