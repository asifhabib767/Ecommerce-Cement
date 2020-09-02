<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-name">
                @if (Route::is('admin.products.index'))
                    Product List
                @elseif(Route::is('admin.products.create'))
                    Create New Product    
                @elseif(Route::is('admin.products.edit'))
                    Edit Product <span class="badge badge-info">{{ $products->name }}</span>
                @elseif(Route::is('admin.products.show'))
                    View Product <span class="badge badge-info">{{ $products->name }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.products.edit', $products->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.products.index'))
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
                        @elseif(Route::is('admin.products.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Product</li>
                        @elseif(Route::is('admin.products.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        @elseif(Route::is('admin.products.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Product List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Product</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>