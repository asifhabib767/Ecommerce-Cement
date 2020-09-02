@if (Route::is('admin.products.index'))
Products 
@elseif(Route::is('admin.products.create'))
Create New Product
@elseif(Route::is('admin.products.edit'))
Edit Product {{ $products->name }}
@elseif(Route::is('admin.products.show'))
View Product {{ $products->name }}
@endif
| Admin Panel - 
{{ config('app.name') }}