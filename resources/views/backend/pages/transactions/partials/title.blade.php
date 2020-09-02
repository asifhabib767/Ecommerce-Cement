@if (Route::is('admin.transactions.index'))
Products 
@elseif(Route::is('admin.transactions.create'))
Create New Product
@elseif(Route::is('admin.transactions.edit'))
Edit Product {{ $transactions->name }}
@elseif(Route::is('admin.transactions.show'))
View Product {{ $transactions->name }}
@endif
| Admin Panel - 
{{ config('app.name') }}