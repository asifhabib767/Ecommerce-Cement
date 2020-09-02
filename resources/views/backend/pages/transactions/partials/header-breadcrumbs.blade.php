<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-name">
                @if (Route::is('admin.transactions.index'))
                    Transaction List
                @elseif(Route::is('admin.transactions.create'))
                    Create New Transaction    
                @elseif(Route::is('admin.transactions.edit'))
                    Edit Transaction <span class="badge badge-info">{{ $transactions->name }}</span>
                @elseif(Route::is('admin.transactions.show'))
                    View Transaction <span class="badge badge-info">{{ $transactions->name }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.transactions.edit', $transactions->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.transactions.index'))
                            <li class="breadcrumb-item active" aria-current="page">Transaction List</li>
                        @elseif(Route::is('admin.transactions.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.transactions.index') }}">Transaction List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Transaction</li>
                        @elseif(Route::is('admin.transactions.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.transactions.index') }}">Transaction List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
                        @elseif(Route::is('admin.transactions.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.transactions.index') }}">Transaction List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Transaction</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>