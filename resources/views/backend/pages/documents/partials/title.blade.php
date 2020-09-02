@if (Route::is('admin.documents.index'))
Documents
@elseif(Route::is('admin.documents.create'))
Create New Document
@elseif(Route::is('admin.documents.edit'))
{{-- Edit Document {{ $document->title }} --}}
@elseif(Route::is('admin.documents.show'))
{{-- View Document {{ $Document->title }} --}}
@endif
| Admin Panel - 
{{ config('app.name') }}